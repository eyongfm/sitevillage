<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\Actualite;
use DateTime;

class ActualitesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

         // this method to write to the database is better because after you deliver the website/go on to production, these spaces have to be updated manually;
        for($i = 1; $i <= 10; $i++) {
            $actualite = new Actualite();
            $actualite->setTitle("Titre de l'actualité")
                      ->setContent("<p>Contenu de l'actualité numéro</p>")
                      ->setImage("https://picsum.photos/id/" . mt_rand(1, 200) . "/500/300")
                      ->setCreatedAt(new DateTime());
                      
        $manager->persist($actualite);              
        }

        $manager->flush();
    }
}
