<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\Evenement;
use DateTime;

class EvenementsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

         // this method to write to the database is better because after you deliver the website, these spaces have to be updated manually;
         for($i = 1; $i <= 10; $i++) {
            $evenement = new Evenement();
            $evenement->setTitle("Titre de l'événement n°:")
                      ->setContent("<p>Contenu de l'événement n°:</p>")
                      ->setImage("https://picsum.photos/id/" . mt_rand(1, 200) . "/500/300")
                      ->setCreatedAt(new DateTime());
                      
        $manager->persist($evenement);              
        }

        $manager->flush();
    }
}
