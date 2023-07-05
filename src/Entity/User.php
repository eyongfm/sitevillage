<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;


/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface  // add a use above
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *      min = 8,
     *      max = 15,
     *      minMessage = "Votre mot de passe doit faire minimum {{ limit }} caractères",
     *      maxMessage = "Votre mot de passe doit faire maximum {{ limit }} caractères"
     * )
     */
    private $password;

    /**
     * @Assert\EqualTo(propertyPath="password", message="Vous navez pas tapez le même mot de passe")
     */
    public $confirm_password;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    //implement all the functions of the interface UserInterface
    public function eraseCredentials(){}

    public function getSalt() {}

    public function getRoles() {  // cette fonction doit retourner la reponse à la question, quel est le rôle de l'utilisateur
        return ['ROLE_USER'];
    }
}
