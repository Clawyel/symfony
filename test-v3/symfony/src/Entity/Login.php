<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * @ORM\Entity(repositoryClass="App\Repository\LoginRepository")
 * @UniqueEntity("email")
 */
class Login
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=45,unique=true)
     * @Assert\Unique(message="The {{ value }} email is repeated.")
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $token;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\UserProfile", mappedBy="login", cascade={"persist", "remove"})
     */
    private $user_profile;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

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

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(string $token): self
    {
        $this->token = $token;

        return $this;
    }

    public function getUserProfile(): ?UserProfile
    {
        return $this->user_profile;
    }

    public function setUserProfile(?UserProfile $user_profile): self
    {
        $this->user_profile = $user_profile;

        // set (or unset) the owning side of the relation if necessary
        $newLogin = null === $user_profile ? null : $this;
        if ($user_profile->getLogin() !== $newLogin) {
            $user_profile->setLogin($newLogin);
        }

        return $this;
    }
    
}
