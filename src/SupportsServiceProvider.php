<?php

namespace LaravelUi\Supports;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use LaravelUi\Supports\Commands\InstallCommand;

class SupportsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this
            ->registerConfig();
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

        return $this;
    }
}
