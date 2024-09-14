<?php

declare(strict_types=1);

namespace App\Handler;


use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class SumHandler implements RequestHandlerInterface
{
    /** @var SumCalculator */
    private $sumCalculator;

    public function __construct(SumCalculator $sumCalculator) {
        $this->sumCalculator = $sumCalculator;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            $result = $this->sumCalculator->calculate([1, 2, 3]);
        } catch (\Exception $e) {

            return new JsonResponse([$e->getMessage(), 400]);
        }

        return  new  JsonResponse(['result' => $result], 200);
    }
}
