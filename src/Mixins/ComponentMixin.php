<?php

namespace LaravelUi\Supports\Mixins;

use Closure;

class ComponentMixin
{
    public function toast(): Closure
    {
        return function (string $description, ?string $title = null, string $variant = 'default'): void {
            $this->dispatch('toast', description: $description, title: $title, variant: $variant);
        };
    }
}
