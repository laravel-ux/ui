<?php

namespace LaravelUi\Supports;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use LaravelUi\Supports\Commands\InstallCommand;
use LaravelUi\Supports\Livewire\Notification;
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

        Livewire::component('ui::notification', Notification::class);

        Component::macro('notify', function (string $description, ?string $title = null) {
            $this->dispatch('notify', description: $description, title: $title);
        });
        Component::macro('notifyError', function (string $description, ?string $title = null) {
            $this->dispatch('notify', description: $description, title: $title, destructive: true);
        });

        return $this;
    }
}
