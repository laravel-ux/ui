<?php

namespace LaravelUx\Ui;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\ComponentAttributeBag;
use LaravelUx\Ui\Commands\InstallCommand;
use LaravelUx\Ui\Mixins\ComponentAttributeBugMixin;
use LaravelUx\Ui\View\Components\AsChild;
use ReflectionException;
use TailwindMerge\Contracts\TailwindMergeContract;
use TailwindMerge\TailwindMerge;

class UiServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(
            TailwindMergeContract::class,
            static fn (): TailwindMerge => TailwindMerge::factory()->make(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'ux');

        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class
            ]);
            $this->bootPublishes();
        }

        Blade::component('ux::as-child', AsChild::class);
        Blade::anonymousComponentPath(__DIR__ . '/../resources/views/components', 'ux');

        ComponentAttributeBag::mixin(new ComponentAttributeBugMixin);
    }

    protected function bootPublishes(): void
    {
        $components = array_map(
            'basename',
            glob(__DIR__ . '/../resources/views/components/*', GLOB_ONLYDIR),
        );

        foreach ($components as $component) {
            $source = __DIR__ . "/../resources/views/components/{$component}";
            $target = resource_path("views/vendor/ux/components/{$component}");

            $this->publishes([$source => $target], "ux-{$component}");
        }
    }
}
