<?php

namespace App\Entity;

use App\Repository\TUserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use APP\Entity\base\TraitEntity;

#[ORM\Entity(repositoryClass: TUserRepository::class)]
class TUser
{
    use TraitEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $username = null;

    #[ORM\Column(length: 255)]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    private ?string $lastname = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $naissance = null;

    #[ORM\ManyToOne(inversedBy: 'tUsers')]
    private ?TPays $fk_pays = null;

    #[ORM\OneToMany(mappedBy: 'fk_user', targetEntity: TComment::class)]
    private Collection $tComments;

    public function __construct()
    {
        $this->tComments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): static
    {
        $this->username = $username;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getNaissance(): ?\DateTimeInterface
    {
        return $this->naissance;
    }

    public function setNaissance(?\DateTimeInterface $naissance): static
    {
        $this->naissance = $naissance;

        return $this;
    }

    public function getFkPays(): ?TPays
    {
        return $this->fk_pays;
    }

    public function setFkPays(?TPays $fk_pays): static
    {
        $this->fk_pays = $fk_pays;

        return $this;
    }

    /**
     * @return Collection<int, TComment>
     */
    public function getTComments(): Collection
    {
        return $this->tComments;
    }

    public function addTComment(TComment $tComment): static
    {
        if (!$this->tComments->contains($tComment)) {
            $this->tComments->add($tComment);
            $tComment->setFkUser($this);
        }

        return $this;
    }

    public function removeTComment(TComment $tComment): static
    {
        if ($this->tComments->removeElement($tComment)) {
            // set the owning side to null (unless already changed)
            if ($tComment->getFkUser() === $this) {
                $tComment->setFkUser(null);
            }
        }

        return $this;
    }
}
