<?php

namespace App\DataFixtures;

use App\Entity\Pet;
use App\Entity\PetCategory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 50; $i++) {
            $petCategory = new PetCategory();
            $petCategory->setName('Dog'. $i);
            $manager->persist($petCategory);
        }
        $manager->flush();

        $petCategoryRepository = $manager->getRepository(PetCategory::class);
        $petCategories =$petCategoryRepository->findAll();

        for ($i = 1; $i <= 50; $i++) {
            $randomNumber = rand(0, count($petCategories)- 1);

            $pet = new Pet();
            $pet->setName('Pet'. $i);
            $pet->setAge(rand(1,10));
            $pet->setPetCategory($petCategories[$randomNumber]);
            $manager->persist($pet);
        }
        $manager->flush();
    }
}
