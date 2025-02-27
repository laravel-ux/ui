<?php

namespace LaravelUi\Supports\Livewire;

use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class Toasts extends Component
{
    public array $messages = [];

    #[On('toast')]
    public function toast(string $description, ?string $title = null, string $variant = 'default'): void
    {
        $this->messages[] = [
            'title' => $title,
            'description' => $description,
            'variant' => $variant,
        ];
    }

    public function render(): View
    {
        return view('ui::livewire.toasts');
    }
}
