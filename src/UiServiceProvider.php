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
        Blade::component('ux::as-child', AsChild::class);
        Blade::anonymousComponentPath(__DIR__ . '/../resources/views/components', 'ux');

        ComponentAttributeBag::mixin(new ComponentAttributeBugMixin);

        return $this;
    }
}
