<?php

// src/DataTransformer/CarOutputDataTransformer.php

namespace App\DataTransformer;

use ApiPlatform\Core\DataTransformer\DataTransformerInterface;
use App\Dto\CarOutput;
use App\Entity\Car;

final class CarOutputDataTransformer implements DataTransformerInterface
{
    /**
     * @param object $data
     * @param string $to
     * @param array<mixed> $context
     * @return CarOutput|object
     */
    public function transform($data, string $to, array $context = [])
    {
        /** @var Car $data */
        $output = new CarOutput();
        $output->name = strtoupper($data->getName());
        /** @var float $price */
        $price = $data->getPrice();
        $output->price = $price;
        $output->currency = $data->getCurrency();

        return $output;
    }

    /**
     * @param array<mixed>|object $data
     * @param string $to
     * @param array<mixed> $context
     * @return bool
     */
    public function supportsTransformation($data, string $to, array $context = []): bool
    {
        return CarOutput::class === $to && $data instanceof Car;
    }
}
