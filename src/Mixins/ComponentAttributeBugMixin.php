<?php

namespace LaravelUx\Ux\Mixins;

use Closure;
use Illuminate\View\ComponentAttributeBag;
use LaravelUx\Supports\Facades\TailwindMerge;

class ComponentAttributeBugMixin
{
    public function hasWireModel(): Closure
    {
        return function (): bool {
            return $this->hasAny(['wire:model', 'wire:model.blur', 'wire:model.live']);
        };
    }

    public function getWireModel(): Closure
    {
        return function (): ?string {
            return $this->only(['wire:model', 'wire:model.blur', 'wire:model.live'])->first();
        };
    }

    public function tailwindMerge(): Closure
    {
        return function (...$args): ComponentAttributeBag {
            $this->offsetSet('class', TailwindMerge::merge($args, $this->get('class')));

            return $this;
        };
    }
}
