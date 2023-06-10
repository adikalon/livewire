<?php

declare(strict_types=1);

namespace Spiral\Livewire\Tests\App\Middleware\Component\HydrateModelPropertiesTest;

final class User
{
    public function __construct(
        public int $id,
        public string $name,
        public Address $address
    ) {
    }
}
