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
        }

        Blade::component('ux::as-child', AsChild::class);
        Blade::anonymousComponentPath(__DIR__ . '/../resources/views/components', 'ux');

        ComponentAttributeBag::mixin(new ComponentAttributeBugMixin);
    }
}
