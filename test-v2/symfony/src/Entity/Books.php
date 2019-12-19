<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BooksRepository")
 */
class Books
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $cuont_of_pages;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CategoriesBooks", inversedBy="category_id")
     */
    private $categoriesBooks;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCuontOfPages(): ?int
    {
        return $this->cuont_of_pages;
    }

    public function setCuontOfPages(?int $cuont_of_pages): self
    {
        $this->cuont_of_pages = $cuont_of_pages;

        return $this;
    }

    public function getCategoriesBooks(): ?CategoriesBooks
    {
        return $this->categoriesBooks;
    }

    public function setCategoriesBooks(?CategoriesBooks $categoriesBooks): self
    {
        $this->categoriesBooks = $categoriesBooks;

        return $this;
    }
}
