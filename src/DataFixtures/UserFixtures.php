<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 50; $i++) {
            $user = new User();
            $user->setEmail('pierre'.$i .'@test.com');
            $user->setPassword('pierre');
            $manager->persist($user);
        }
        $manager->flush();
    }
}
