<?php

namespace App\Entity;

use App\Repository\REventRepository;
use Doctrine\ORM\Mapping as ORM;

// https://fullcalendar.io/docs/recurring-events
#[ORM\Entity(repositoryClass: REventRepository::class)]
class REvent extends Event
{

}
