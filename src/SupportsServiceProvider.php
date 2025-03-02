<?php

namespace LaravelUi\Supports;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\ComponentAttributeBag;
use LaravelUi\Supports\Commands\InstallCommand;
use LaravelUi\Supports\Livewire\Toasts;
use Livewire\Component;
use Livewire\Livewire;

class SupportsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->registerConfig();
    }

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
        $this->mergeConfigFrom(__DIR__.'/../config/livewire.php', 'livewire');

        return $this;
    }

    protected function bootViews(): static
    {
        $this->loadViewsFrom(__DIR__.'/../stubs/resources/views', 'ui');

        return $this;
    }

    protected function bootCommands(array $commands): static
    {
        if ($this->app->runningInConsole()) {
            $this->commands($commands);
        }

        return $this;
    }

    protected function bootComponents(): static
    {
        Blade::anonymousComponentPath(__DIR__.'/../stubs/resources/views/components', 'ui');

        Livewire::component('ui::toasts', Toasts::class);

        Component::macro(
            'toast',
            function (string $description, ?string $title = null, string $variant = 'default') {
                $this->dispatch('toast', description: $description, title: $title, variant: $variant);
            },
        );

        ComponentAttributeBag::macro(
            'hasWireModel',
            function () {
                return $this->hasAny(['wire:model', 'wire:model.blur', 'wire:model.live']);
            },
        );
        ComponentAttributeBag::macro(
            'getWireModel',
            function () {
                return $this->only(['wire:model', 'wire:model.blur', 'wire:model.live'])->first();
            },
        );

        return $this;
    }
}
