<?php

namespace LaravelUi\Supports;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use LaravelUi\Supports\Commands\InstallCommand;

class SupportsServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this
            ->bootCommands([
                InstallCommand::class,
            ])
            ->bootComponents();
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
        Blade::anonymousComponentPath(__DIR__ . '/../stubs/resources/views/components', 'ui');

        return $this;
    }
}
