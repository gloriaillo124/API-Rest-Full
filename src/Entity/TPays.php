<?php

namespace App\Entity;

use App\Repository\TPaysRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use APP\Entity\base\TraitEntity;

#[ORM\Entity(repositoryClass: TPaysRepository::class)]
class TPays
{
    use TraitEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 1000, nullable: true)]
    private ?string $description = null;

    #[ORM\OneToMany(mappedBy: 'fk_pays', targetEntity: TUser::class)]
    private Collection $tUsers;

    public function __construct()
    {
        $this->tUsers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, TUser>
     */
    public function getTUsers(): Collection
    {
        return $this->tUsers;
    }

    public function addTUser(TUser $tUser): static
    {
        if (!$this->tUsers->contains($tUser)) {
            $this->tUsers->add($tUser);
            $tUser->setFkPays($this);
        }

        return $this;
    }

    public function removeTUser(TUser $tUser): static
    {
        if ($this->tUsers->removeElement($tUser)) {
            // set the owning side to null (unless already changed)
            if ($tUser->getFkPays() === $this) {
                $tUser->setFkPays(null);
            }
        }

        return $this;
    }
}
