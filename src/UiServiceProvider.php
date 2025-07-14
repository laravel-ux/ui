<?php

namespace LaravelUx\Ui;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\ComponentAttributeBag;
use LaravelUx\Ui\Commands\InstallCommand;
use LaravelUx\Ui\Mixins\ComponentAttributeBugMixin;
use ReflectionException;
use TailwindMerge\Contracts\TailwindMergeContract;
use TailwindMerge\TailwindMerge;

class UiServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this
            ->registerConfig()
            ->registerSingletons();
    }

    /**
     * @throws ReflectionException
     */
    public function boot(): void
    {
        $this
            ->bootViews()
            ->bootCommands([
                InstallCommand::class,
            ])
            ->bootComponents();

        Blade::directive('asChild', function ($expression): string {
            return "<?php ob_start(); \$__asChildAttrs = $expression; ?>";
        });
        Blade::directive('endAsChild', function (): string {
            return <<<'PHP'
<?php
    $__asChildHtml = trim(ob_get_clean());
    $doc = new DOMDocument();
    libxml_use_internal_errors(true);
    $doc->loadHTML($__asChildHtml, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    libxml_clear_errors();

    foreach ($doc->childNodes as $node) {
        if ($node->nodeType === XML_ELEMENT_NODE) {
            foreach ($__asChildAttrs as $name => $value) {
                $node->setAttribute($name, $value);
            }
        }
    }

    echo $doc->saveHTML();
    unset($doc, $__asChildHtml, $__asChildAttrs);
?>
PHP;
        });
    }

    protected function registerConfig(): static
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/livewire.php', 'livewire');

        return $this;
    }

    protected function registerSingletons(): static
    {
        $this->app->singleton(
            TailwindMergeContract::class,
            static fn (): TailwindMerge => TailwindMerge::factory()->make(),
        );

        return $this;
    }

    protected function bootViews(): static
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'ux');

        return $this;
    }

    protected function bootCommands(array $commands): static
    {
        if ($this->app->runningInConsole()) {
            $this->commands($commands);
        }

        return $this;
    }

    /**
     * @throws ReflectionException
     */
    protected function bootComponents(): static
    {
        Blade::anonymousComponentPath(__DIR__ . '/../resources/views/components', 'ux');

        ComponentAttributeBag::mixin(new ComponentAttributeBugMixin);

        return $this;
    }
}
