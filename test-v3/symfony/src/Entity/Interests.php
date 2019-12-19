<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InterestsRepository")
 */
class Interests
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
     * @ORM\ManyToMany(targetEntity="App\Entity\UserProfile", inversedBy="iterstsUser")
     */
    private $userProfile;

    public function __construct()
    {
        $this->userProfile = new ArrayCollection();
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


    /**
     * @return Collection|UserProfile[]
     */
    public function getUserProfile(): Collection
    {
        return $this->userProfile;
    }

    public function addUserProfile(UserProfile $userProfile): self
    {
        if (!$this->userProfile->contains($userProfile)) {
            $this->userProfile[] = $userProfile;
        }

        return $this;
    }

    public function removeUserProfile(UserProfile $userProfile): self
    {
        if ($this->userProfile->contains($userProfile)) {
            $this->userProfile->removeElement($userProfile);
        }

        return $this;
    }
}
