<?php

declare(strict_types=1);

namespace LaravelUx\Ui\Commands;

use Illuminate\Console\Command;
use Illuminate\Contracts\Console\PromptsForMissingInput;
use Illuminate\Filesystem\Filesystem;
use JsonException;

class InstallCommand extends Command implements PromptsForMissingInput
{
    protected $signature = 'ux:install';

    protected $description = 'Install the Laravel UX components and resources';

    public function __construct(protected Filesystem $files)
    {
        parent::__construct();
    }

    public function handle(): int
    {
        if (! $this->files->exists(base_path('package.json'))) {
            $this->components->error('A package.json file is required to install Laravel UX UI.');

            return static::FAILURE;
        }

        try {
            $this->updateNodePackages(fn (array $packages): array => [
                '@tailwindcss/vite' => '^4.0',
                'tailwindcss' => '^4.0',
                'tailwindcss-animate' => '^1.0.7',
            ] + $packages);
        } catch (JsonException) {
            $this->components->error('The package.json file does not contain valid JSON.');

            return static::FAILURE;
        }

        $this->installCssEntrypoint();
        $this->installJavaScriptEntrypoint();

        $this->components->info('Laravel UX UI was installed successfully.');
        $this->components->warn('Run npm install, then rebuild your frontend assets.');

        return static::SUCCESS;
    }

    /**
     * @throws JsonException
     */
    protected function updateNodePackages(callable $callback, bool $dev = true): void
    {
        $configurationKey = $dev ? 'devDependencies' : 'dependencies';

        $packages = json_decode(
            $this->files->get(base_path('package.json')),
            true,
            flags: JSON_THROW_ON_ERROR,
        );

        $packages[$configurationKey] = $callback(
            $packages[$configurationKey] ?? [],
        );

        ksort($packages[$configurationKey]);

        $this->files->put(
            base_path('package.json'),
            json_encode(
                $packages,
                JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_THROW_ON_ERROR,
            ).PHP_EOL,
        );
    }

    protected function installCssEntrypoint(): void
    {
        $path = resource_path('css/app.css');
        $this->files->ensureDirectoryExists(dirname($path));

        $contents = $this->files->exists($path) ? $this->files->get($path) : '';

        if (! preg_match('/@import\s+[\'\"]tailwindcss[\'\"]\s*;/', $contents)) {
            $contents = "@import 'tailwindcss';\n".ltrim($contents);
        }

        if (! str_contains($contents, 'vendor/laravel-ux/ui/resources/css/ui.css')) {
            $contents = $this->insertAfter(
                $contents,
                '/@import\s+[\'\"]tailwindcss[\'\"]\s*;/',
                "\n@import '../../vendor/laravel-ux/ui/resources/css/ui.css';",
            );
        }

        if (! str_contains($contents, 'vendor/laravel-ux/**/*.blade.php')) {
            $contents = $this->insertAfter(
                $contents,
                '/@import\s+[\'\"]\.\.\/\.\.\/vendor\/laravel-ux\/ui\/resources\/css\/ui\.css[\'\"]\s*;/',
                "\n\n@source '../../vendor/laravel-ux/**/*.blade.php';",
            );
        }

        $this->files->put($path, rtrim($contents).PHP_EOL);
    }

    protected function installJavaScriptEntrypoint(): void
    {
        $path = resource_path('js/app.js');
        $this->files->ensureDirectoryExists(dirname($path));

        $contents = $this->files->exists($path) ? $this->files->get($path) : '';

        if (! str_contains($contents, 'vendor/laravel-ux/ui/resources/js/ui.js')) {
            $contents = "import '../../vendor/laravel-ux/ui/resources/js/ui.js';\n\n".ltrim($contents);
        }

        $this->files->put($path, rtrim($contents).PHP_EOL);
    }

    protected function insertAfter(string $contents, string $pattern, string $addition): string
    {
        preg_match($pattern, $contents, $matches, PREG_OFFSET_CAPTURE);

        $match = $matches[0];
        $offset = $match[1] + strlen($match[0]);

        return substr($contents, 0, $offset).$addition.substr($contents, $offset);
    }
}
