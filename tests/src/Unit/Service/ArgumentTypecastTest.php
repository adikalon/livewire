<?php

declare(strict_types=1);

namespace Spiral\Livewire\Tests\Unit\Service;

use PHPUnit\Framework\TestCase;
use Spiral\Livewire\Service\ArgumentTypecast;

final class ArgumentTypecastTest extends TestCase
{
    /**
     * @dataProvider argumentsDataProvider
     */
    public function testCast(array $expected, array $arguments): void
    {
        $typecast = new ArgumentTypecast();

        $this->assertSame($expected, $typecast->cast($arguments, new \ReflectionMethod($this, 'methodForReflection')));
    }

    public function argumentsDataProvider(): \Traversable
    {
        yield [['string' => 'bar'], ['string' => 'bar']];
        yield [['bool' => true], ['bool' => 'true']];
        yield [['bool' => false], ['bool' => 'false']];
        yield [['bool' => true], ['bool' => '1']];
        yield [['bool' => false], ['bool' => '0']];
        yield [['int' => 3], ['int' => '3']];
        yield [['float' => 5.4], ['float' => '5.4']];
        yield [['array' => ['foo' => 'bar', 'baz' => 7]], ['array' => '{"foo":"bar","baz":7}']];
    }

    private function methodForReflection(string $string, bool $bool, int $int, float $float, array $array): void
    {
    }
}
