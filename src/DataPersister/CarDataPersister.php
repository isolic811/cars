<?php

namespace App\DataPersister;

use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;
use App\Entity\Car;
use App\Services\CurrencyConverter;

/**
 * Class CarDataPersister
 * @package App\DataPersister
 */
final class CarDataPersister implements ContextAwareDataPersisterInterface
{
    private ContextAwareDataPersisterInterface $decorated;

    public function __construct(ContextAwareDataPersisterInterface $decorated)
    {
        $this->decorated = $decorated;
    }

    /**
     * @param array<mixed> $data
     * @param array<mixed> $context
     * @return bool
     */
    public function supports($data, array $context = []): bool
    {
        return $this->decorated->supports($data, $context);
    }

    /**
     * @param array<mixed>|Car $data
     * @param array<mixed> $context
     * @return Car|object|void
     */
    public function persist($data, array $context = [])
    {
        if (
            $data instanceof Car && (
                ($context['collection_operation_name'] ?? null) === 'post'
                ||
                ($context['item_operation_name'] ?? null) === 'patch'
            )
        ) {
            $data->setPrice(CurrencyConverter::makeConversion($data->getCurrency(), $data->getPrice()));
            $data->setCurrency("HRK");
        }

        $this->decorated->persist($data, $context);
        /** @var Car $data */
        return $data;
    }

    /**
     * @param array<mixed>|Car $data
     * @param array<mixed> $context
     * @return Car
     */
    public function remove($data, array $context = []): Car
    {
        return $this->decorated->remove($data, $context);
    }
}
