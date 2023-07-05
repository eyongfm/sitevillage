<?php

namespace App\Controller;

use DateTime;
use App\Entity\User;
use App\Form\UserType;
use App\Entity\Contact;
use App\Entity\Actualite;
use App\Form\ActualiteType;
use App\Form\ContactType;

use App\Repository\ActualiteRepository;
use App\Repository\EvenementRepository;
use App\Service\CallApiService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Spatie\OpeningHours\OpeningHours;


class VillageController extends AbstractController
{
    //make the function below as my homepage, the homepage is always just a slash: /

    /**
     * @Route("/", name="accueil")
     */
    public function index(CallApiService $callApiService, ActualiteRepository $repo, EvenementRepository $repoevent): Response
    {
        $actualites = $repo->findAll();
        $evenements = $repoevent->findAll();
        $meteo = $callApiService->nancyData();

        //dump($callApiService->nancyData());

        return $this->render('village/index.html.twig', [
            'controller_name' => 'VillageController',
            'weatherInfo' => $meteo,
            //'weatherInfo' => $callApiService->nancyData(),
            'actu' => $actualites,
            'events' => $evenements,
        ]);

       
    }//end function index
    

    //make other functions/pages:

    //the address of accueil to home

    /**
     * @Route("/histoire", name="histoire")
     */
    public function histoire(): Response
    {
        return $this->render('village/histoire.html.twig');
    }


    /**
     * @Route("/actualite", name="actualite")
     */
    public function actualite(ActualiteRepository $repo): Response
    {
        $actualites = $repo->findAll();
        return $this->render('village/actualite.html.twig', [
            'actu' => $actualites
        ]);
        
    }


    /**
     * @Route("/village/actualite/{id}", name="show_actualite")
     */
    public function showactualite(ActualiteRepository $repo, $id) {

        $actualiteID = $repo->find($id);

        return $this->render('village/showactualite.html.twig', [
            'act' => $actualiteID
        ]);
    }

    
    /**
     * @Route("/evenement", name="evenement")
     */
    public function evenement(EvenementRepository $repo): Response
    {
        $evenements = $repo->findAll();
        return $this->render('village/evenement.html.twig', [
            'events' => $evenements
        ]);
    }


    /**
     * @Route("/village/evenement/{id}", name="show_evenement")
     */
    public function showEvenement(EvenementRepository $repo, $id): Response{

        $evenementID = $repo->find($id);

        return $this->render('village/showEvenement.html.twig', [
            'event' => $evenementID
        ]);
    }


    /**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request, EntityManagerInterface $manager): Response
    {
        $contact = new Contact();

        //this creates the form and its fields, based on the maquette inside the ContactType class and I will see it on the browser
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);  // demander au formulaire d'analyser(Question:has it been submitted or not) la requête HTTP que je te passe ici en parametre
        //dump($contact);
        //dump($request);

        if($form->isSubmitted() && $form->isValid()) {
            $contact->setCreatedAt(new DateTime());

            $manager->persist($contact);

            $manager->flush();

            //after flusing, redirect the page to the *accueil* page with that particlar id
            return $this->redirectToRoute('accueil');

        }

        return $this->render('village/contact.html.twig', [
            'formContact' => $form->createView() // we send this variable 'formContact' to twig, the contact.html.twig file
        ]);
    }//end function contact


    /**
     * @Route("/administrator", name="administrator_setting")
     */
    public function admin(ActualiteRepository $repo): Response
    {
        $actualites = $repo->findAll();
        return $this->render('village/admin.html.twig', [
            'actu' => $actualites
        ]);
       
    }//end admin
    

    //pour ajouter un actualité
    /**
     * @Route("/village/new", name="actu_create")
     */
    public function createActualite(?Actualite $actualite, Request $request, EntityManagerInterface $manager) {
            
        if(!$actualite) {
            $actualite = new Actualite();
        }

        $form = $this->createForm(ActualiteType::class, $actualite);

        $form->handleRequest($request); 

        if($form->isSubmitted() && $form->isValid()) {
            $actualite->setCreatedAt(new DateTime());

            $manager->persist($actualite);

            $manager->flush();

            return $this->redirectToRoute('show_actualite', ['id' => $actualite->getId()]);
        }

        return $this->render('village/createactu.html.twig', [
            'formActualite' => $form->createView()
        ]);

    }//end createActualite


    //pour modifier un actualité, j'ai ajouter le id=32 (pour le tout premier actualité) dans la page admin.html.twig'pour avoir accès à la page modiication
    /**
     * @Route("/village/{id}/edit", name="actu_modify")
     */
    public function modifyActualite(Request $request, ActualiteRepository $repo, $id, EntityManagerInterface $manager): Response {

        $actualiteID = $repo->find($id);
        $form = $this->createForm(ActualiteType::class, $actualiteID);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()) {
            $manager->flush();

            return $this->redirectToRoute('administrator_setting');
            //return $this->redirectToRoute('show_actualite', ['id' => $actualiteID->getId()]); //original line of code
        }


        return $this->render('village/modifyactu.html.twig', [
            'formActualite' => $form->createView()
        ]);

    }//end modifyActualite


    //pour supprimer un actualité, in the browser the id here is 0, and j'ai ajouter le id=42 dans la page admin.html.twig'pour avoir accès à la page delete
    /**
     * @Route("/delete-actualite/{id}", name="delete_actualite")
     */
    public function deleteActualite(EntityManagerInterface $manager, $id, ActualiteRepository $repo, Request $request): Response {

        $actualiteToDelete = $repo->find($id);
        $form = $this->createForm(ActualiteType::class, $actualiteToDelete);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $manager->remove($actualiteToDelete);

            $manager->flush();

            return $this->redirectToRoute('administrator_setting');
            //return $this->redirectToRoute("actualite"); //original line of code

        }

        return $this->render('village/deleteactu.html.twig', [
            'formActualite' => $form->createView()
        ]);

    }//end deleteActualite


}//end class VillageController


