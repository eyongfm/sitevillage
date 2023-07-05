<?php

namespace App\Controller;

use App\Repository\ActualiteRepository;
use App\Repository\EvenementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Contact;
use App\Entity\User;
use App\Form\ContactType;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use DateTime;


class VillageController extends AbstractController
{
    //make the function below as my homepage, the homepage is always just a slash: /

    /**
     * @Route("/", name="accueil")
     */
    public function index(): Response
    {
        return $this->render('village/index.html.twig', [
            'controller_name' => 'VillageController'    
        ]);
    }


    
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
     * @Route("/login", name="login")
     */
    public function login(Request $request, EntityManagerInterface $manager): Response
    {

        $login = new User();

        //this creates the form and its fields, based on the maquette inside the ContactType class and I will see it on the browser
        $form = $this->createForm(UserType::class, $login);

        $form->handleRequest($request);  // demander au formulaire d'analyser(Question:has it been submitted or not) la requête HTTP que je te passe ici en parametre
        //dump($contact);
        //dump($request);

        if($form->isSubmitted() && $form->isValid()) {
            //$login->setCreatedAt(new DateTime());

            $manager->persist($login);

            $manager->flush();

            //after flusing, redirect the page to the *accueil* page with that particlar id
            //return $this->redirectToRoute('accueil');

        }//end if


        return $this->render('village/login.html.twig', [
            'formUser' => $form->createView() // we send this variable 'formUser' to twig, the contact.html.twig file
        ]);

    }//end function login


    /**
     * @Route("/administration", name="admin_panel")
     */
    public function admin(Request $request, EntityManagerInterface $manager): Response
    {

        $login = new User();

        //this creates the form and its fields, based on the maquette inside the ContactType class and I will see it on the browser
        $form = $this->createForm(UserType::class, $login);

        $form->handleRequest($request);  // demander au formulaire d'analyser(Question:has it been submitted or not) la requête HTTP que je te passe ici en parametre
        //dump($contact);
        //dump($request);

        if($form->isSubmitted() && $form->isValid()) {
            //$login->setCreatedAt(new DateTime());

            $manager->persist($login);

            $manager->flush();

            //after flusing, redirect the page to the *accueil* page with that particlar id
            //return $this->redirectToRoute('accueil');

        }//end if


        return $this->render('village/login.html.twig', [
            'formUser' => $form->createView() // we send this variable 'formUser' to twig, the contact.html.twig file
        ]);

    }//end function login

    
}//end class VillageController


