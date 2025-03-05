<?php

namespace LaravelUi\Supports;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\ComponentAttributeBag;
use LaravelUi\Supports\Commands\InstallCommand;
use LaravelUi\Supports\Livewire\Toasts;
use LaravelUi\Supports\Mixins\ComponentAttributeBugMixin;
use LaravelUi\Supports\Mixins\ComponentMixin;
use Livewire\Component;
use Livewire\Livewire;
use ReflectionException;
use TailwindMerge\Contracts\TailwindMergeContract;
use TailwindMerge\TailwindMerge;

class SupportsServiceProvider extends ServiceProvider
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
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'ui');

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
        Blade::anonymousComponentPath(__DIR__ . '/../resources/views/components', 'ui');

        Livewire::component('ui::toasts', Toasts::class);

        Component::mixin(new ComponentMixin());
        ComponentAttributeBag::mixin(new ComponentAttributeBugMixin);

        return $this;
    }
}
