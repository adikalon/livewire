<?php

declare(strict_types=1);

namespace Spiral\Livewire\Event\Component;

use Spiral\Livewire\Component\LivewireComponent;

final class ComponentCallingMethod
{
    public function __construct(
        public readonly LivewireComponent $component,
        public readonly string $method,
        public readonly array $params,
        public bool $shouldSkipCalling = false
    ) {
    }
}
