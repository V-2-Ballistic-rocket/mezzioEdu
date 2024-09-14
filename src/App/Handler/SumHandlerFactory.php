<?php

declare(strict_types=1);

namespace App\Handler;

use Psr\Container\ContainerInterface;
use Psr\Http\Server\RequestHandlerInterface;

use function assert;

class SumHandlerFactory
{
    public function __invoke(ContainerInterface $container): RequestHandlerInterface
    {
        $sumCalculator = $container->get(SumCalculator::class);
        assert($sumCalculator instanceof SumCalculator);

        return new SumHandler($sumCalculator);
    }
}
