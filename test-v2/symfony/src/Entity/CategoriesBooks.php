<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoriesBooksRepository")
 */
class CategoriesBooks
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Category", mappedBy="categoriesBooks")
     */
    private $kbook_id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Books", mappedBy="categoriesBooks")
     */
    private $category_id;

    public function __construct()
    {
        $this->kbook_id = new ArrayCollection();
        $this->category_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Category[]
     */
    public function getKbookId(): Collection
    {
        return $this->kbook_id;
    }

    public function addKbookId(Category $kbookId): self
    {
        if (!$this->kbook_id->contains($kbookId)) {
            $this->kbook_id[] = $kbookId;
            $kbookId->setCategoriesBooks($this);
        }

        return $this;
    }

    public function removeKbookId(Category $kbookId): self
    {
        if ($this->kbook_id->contains($kbookId)) {
            $this->kbook_id->removeElement($kbookId);
            // set the owning side to null (unless already changed)
            if ($kbookId->getCategoriesBooks() === $this) {
                $kbookId->setCategoriesBooks(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Books[]
     */
    public function getCategoryId(): Collection
    {
        return $this->category_id;
    }

    public function addCategoryId(Books $categoryId): self
    {
        if (!$this->category_id->contains($categoryId)) {
            $this->category_id[] = $categoryId;
            $categoryId->setCategoriesBooks($this);
        }

        return $this;
    }

    public function removeCategoryId(Books $categoryId): self
    {
        if ($this->category_id->contains($categoryId)) {
            $this->category_id->removeElement($categoryId);
            // set the owning side to null (unless already changed)
            if ($categoryId->getCategoriesBooks() === $this) {
                $categoryId->setCategoriesBooks(null);
            }
        }

        return $this;
    }
}
