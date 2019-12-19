<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TagsRepository")
 */
class Tags
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
     * @ORM\ManyToMany(targetEntity="App\Entity\Articles",mappedBy="tags")
     * @ORM\JoinColumn(name="articles_id",referencedColumnName="id",nullable=false,onDelete="cascade")
     */
    private $articles;

    public function __construct()
    {
        $this->articles = new ArrayCollection();
    }
    public function getArticles(): Collection
    {
        return $this->articles;
    }
    public function addArticle(Articles $articles) :self
    {
        if(!$this->articles->contains($articles)){
            $this->articles[] = $articles;
            $articles->addTag($this);
        }
        return $this;
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
}
