<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserProfileRepository")
 */
class UserProfile
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $surname;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Interests", mappedBy="userProfileID")
     */
    private $interests;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Interests", mappedBy="userProfile")
     */
    private $iterstsUser;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Login", inversedBy="user_profile", cascade={"persist", "remove"},)
     * @ORM\JoinColumn(name="user_profile_id", referencedColumnName="id", nullable=false, onDelete="cascade")
     */
    private $login;


    public function __construct()
    {
        $this->interests = new ArrayCollection();
        $this->iterstsUser = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * @return Collection|Interests[]
     */
    public function getInterests(): Collection
    {
        return $this->interests;
    }

    public function addInterest(Interests $interest): self
    {
        if (!$this->interests->contains($interest)) {
            $this->interests[] = $interest;
            $interest->setUserProfileID($this);
        }

        return $this;
    }

    public function removeInterest(Interests $interest): self
    {
        if ($this->interests->contains($interest)) {
            $this->interests->removeElement($interest);
            // set the owning side to null (unless already changed)
            if ($interest->getUserProfileID() === $this) {
                $interest->setUserProfileID(null);
            }
        }

        return $this;
    }

    public function getLogin(): ?Login
    {
        return $this->login;
    }

    public function setLogin(?Login $login): self
    {
        $this->login = $login;

        return $this;
    }
    

}
