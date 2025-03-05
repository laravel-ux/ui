<?php

namespace LaravelUi\Supports\Facades;

use Illuminate\Support\Facades\Facade;
use TailwindMerge\Contracts\TailwindMergeContract;

class TailwindMerge extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return TailwindMergeContract::class;
    }
}
