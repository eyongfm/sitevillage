<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class SecurityController extends AbstractController
{

    /**
     * @Route("/inscription", name="security_registration")
     */
    public function registration(Request $request, EntityManagerInterface $manager, UserPasswordEncoderInterface $encoder) {

        // the registratio form is boud to the class User, we make an instance of class User
        $user = new User();  // add use above

        // we make a form by: making an instance of the class RegistrationType
        $form = $this->createForm(RegistrationType::class, $user);  // add use above

         //je veux mon cher formulaire que tu analyse la request que je te passe ici
         $form->handleRequest($request);

         if($form->isSubmitted() && $form->isValid()) {

            // avant de sauvegarder l'utilisateur, encrypt the password after you get it,
            $hash = $encoder->encodePassword($user, $user->getPassword());

             // modify the password of $user by setting it to $hash the encryted password
             $user->setPassword($hash);

            // save the $user in memory 
            $manager->persist($user);

            // save the new $user to the database using flush
            $manager->flush();

            
            //after sending the user details to the database, redirect to the login page
            return $this->redirectToRoute('security_login');

         }//end if

       // je veux affichier un le fichier registration.html.twig qui se trouve dans le dossier security dans dossier templates, [je lui pass des parametres ou variables pour qu'il puisse les utiliser]
       return $this->render('security/registration.html.twig', [  
        'formRegistration' => $form->createView() // créer la vue dans  le dossier security en créeant le fichier /registration.html.twig
     ]);
        
    }//end registration


        //here we create route to login page
    /**
     * @Route("/connexion", name="security_login")
     */
    public function login() {
        return $this->render('security/login.html.twig');
    }

    
     /**
     * @Route("/deconnexion", name="security_logout")
     */
    public function logout() {}




    /**
     * @Route("/security", name="security")
     */
    /* public function index(): Response
    {
        return $this->render('security/index.html.twig', [
            'controller_name' => 'SecurityController',
        ]);
    } */


}//end class SecurityController
