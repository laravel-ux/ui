<?php

declare(strict_types=1);

namespace LaravelUx\Ui\Facades;

use Illuminate\Support\Facades\Facade;
use TailwindMerge\Contracts\TailwindMergeContract;

class TailwindMerge extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return TailwindMergeContract::class;
    }
}
