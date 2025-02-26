<?php

namespace LaravelUi\Supports\Livewire;

use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class Notification extends Component
{
    public array $messages = [];

    #[On('notify')]
    public function notify(string $description, ?string $title = null, bool $destructive = false): void
    {
        $this->messages[] = [
            'title' => $title,
            'description' => $description,
            'variant' => $destructive ? 'destructive' : 'default',
        ];
    }

    public function remove(int $key): void
    {
        unset($this->messages[$key]);
    }

    public function render(): View
    {
        return view('ui::livewire.notification');
    }
}
