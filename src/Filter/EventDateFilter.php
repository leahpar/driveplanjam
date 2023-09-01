<?php

namespace App\Filter;

use ApiPlatform\Doctrine\Orm\Filter\AbstractFilter;
use ApiPlatform\Doctrine\Orm\Util\QueryNameGeneratorInterface;
use ApiPlatform\Metadata\Operation;
use App\Entity\Event;
use Doctrine\ORM\QueryBuilder;

final class EventDateFilter extends AbstractFilter
{
    protected function filterProperty(
        string $property,
        $value,
        QueryBuilder $queryBuilder,
        QueryNameGeneratorInterface $queryNameGenerator,
        string $resourceClass,
        Operation $operation = null,
        array $context = [],
    ): void
    {
        if ($resourceClass !== Event::class) {
            return;
        }

        // Generate a unique parameter name to avoid collisions with other filters
        $parameterName = $queryNameGenerator->generateParameterName($property);

        if ($property === 'start') {
            $queryBuilder
                ->andWhere(sprintf('o.end >= :%s', $parameterName))
                ->setParameter($parameterName, $value);
        }
        if ($property === 'end') {
            $queryBuilder
                ->andWhere(sprintf('o.start <= :%s', $parameterName))
                ->setParameter($parameterName, $value);
        }
    }

    public function getDescription(string $resourceClass): array
    {
        $description['start'] = [
            'property' => 'start',
            'type' => \DateTimeInterface::class,
            'required' => false,
            'swagger' => [
                'description' => 'Filter events starting after a given date',
                'name' => 'start',
                'type' => 'datetime',
            ],
        ];
        $description['end'] = [
            'property' => 'end',
            'type' => \DateTimeInterface::class,
            'required' => false,
            'swagger' => [
                'description' => 'Filter events ending before a given date',
                'name' => 'end',
                'type' => 'datetime',
            ],
        ];

        return $description;
    }
}
