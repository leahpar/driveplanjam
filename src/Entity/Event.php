<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiResource;
use App\Filter\EventDateFilter;
use App\Repository\EventRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

// https://fullcalendar.io/docs/event-object
#[ORM\Entity(repositoryClass: EventRepository::class)]
#[ApiResource]
#[ApiFilter(EventDateFilter::class, properties: ['start', 'end'])]
class Event
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    public ?int $id = null;

    public function __construct(

        #[ORM\Column(length: 255)]
        public ?string $title = null,

        #[ORM\Column(type: Types::DATETIME_MUTABLE)]
        public ?\DateTimeInterface $start = null,

        #[ORM\Column(type: Types::DATETIME_MUTABLE)]
        public ?\DateTimeInterface $end = null,

    ) {}

}
