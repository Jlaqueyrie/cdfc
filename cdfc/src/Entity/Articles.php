<?php

namespace App\Entity;

use App\Repository\ArticlesRepository;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=ArticlesRepository::class)
 * @ORM\HasLifecycleCallbacks
 * @Vich\Uploadable
 */
class Articles
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
    private $titre;

    /**
     * @ORM\Column(type="text")
     */
    private $contenu;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imageCouverture;
    
    /**
     * @Vich\UploadableField(mapping="imagesArticles", fileNameProperty="imageCouverture")
     */
    private $imageCouvertureFichier;

    /**
     * @ORM\ManyToOne(targetEntity=Users::class, inversedBy="articles")
     */
    private $auteur;

    /**
     * @ORM\ManyToOne(targetEntity=Categories::class, inversedBy="articles")
     */
    private $categorie;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }
    /**
     * @ORM\PrePersist()
     */
    public function setAutoCreatedAt()
    {
        $this->createdAt = new \DateTime();
        return $this;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getImageCouverture(): ?string
    {
        return $this->imageCouverture;
    }

    public function setImageCouverture(?string $imageCouverture): self
    {
        $this->imageCouverture = $imageCouverture;

        return $this;
    }

    public function getAuteur(): ?Users
    {
        return $this->auteur;
    }

    public function setAuteur(?Users $auteur): self
    {
        $this->auteur = $auteur;

        return $this;
    }

    public function getCategorie(): ?Categories
    {
        return $this->categorie;
    }

    public function setCategorie(?Categories $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }
    
    public function getImageCouvertureFichier()
    {
        return $this->imageCouvertureFichier;
    }

    public function setImageCouvertureFichier($imageCouvertureFichier = null): self
    {
        $this->imageCouvertureFichier = $imageCouvertureFichier;

        if($imageCouvertureFichier){
            $this->updatedAt = new \DateTime('now');
        }
        return $this;
    }
}
