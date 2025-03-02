<?php

namespace LaravelUi\Supports\Commands;

use Illuminate\Console\Command;
use Illuminate\Contracts\Console\PromptsForMissingInput;

class InstallCommand extends Command implements PromptsForMissingInput
{
    protected $signature = 'ui:install';

    protected $description = 'Install the UI components and resources';

    public function handle(): int
    {
        $this->updateNodePackages(function ($packages) {
            return [
                'tailwindcss-animate' => '^1.0',
                'autoprefixer' => '^10.4',
                'postcss' => '^8.4',
                'tailwindcss' => '^3.4',
            ] + $packages;
        });

        copy(__DIR__ . '/../../stubs/postcss.config.js', base_path('postcss.config.js'));
        copy(__DIR__ . '/../../stubs/tailwind.config.js', base_path('tailwind.config.js'));
        copy(__DIR__ . '/../../stubs/vite.config.js', base_path('vite.config.js'));

        return static::SUCCESS;
    }

    protected function updateNodePackages(callable $callback, bool $dev = true): void
    {
        if (! file_exists(base_path('package.json'))) {
            return;
        }

        $configurationKey = $dev ? 'devDependencies' : 'dependencies';

        $packages = json_decode(file_get_contents(base_path('package.json')), true);

        $packages[$configurationKey] = $callback(
            array_key_exists($configurationKey, $packages) ? $packages[$configurationKey] : [],
            $configurationKey
        );

        ksort($packages[$configurationKey]);

        file_put_contents(
            base_path('package.json'),
            json_encode($packages, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . PHP_EOL
        );
    }
}
