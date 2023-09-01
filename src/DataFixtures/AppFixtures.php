<?php

namespace App\DataFixtures;

use App\Entity\Event;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        for ($i=0; $i<20; $i++) {
            $day = random_int(0, 10);
            $hour = random_int(8, 17);
            $dur = random_int(1, 3);
            $event = new Event(
                title: 'Event ' . $i,
                start: (new \DateTime("last monday + $day days"))->setTime($hour, 0),
                end: (new \DateTime("last monday + $day days"))->setTime($hour+$dur, 0),
            );
            $manager->persist($event);
        }

        $manager->flush();
    }
}
