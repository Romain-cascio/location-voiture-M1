<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "AUTO")]
    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $id_commande = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $id_membre = null;

    #[ORM\ManyToOne(targetEntity: Membre::class)]
    #[ORM\JoinColumn(name: "id_membre", referencedColumnName: "id_membre")]
    private ?Membre $membre = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $id_vehicule = null;

    #[ORM\ManyToOne(targetEntity: Vehicule::class)]
    #[ORM\JoinColumn(name: "id_vehicule", referencedColumnName: "id_vehicule")]
    private ?Vehicule $vehicule = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Assert\Type("datetime")]
    private ?\DateTimeInterface $date_heure_depart = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Assert\Type("datetime")]
    private ?\DateTimeInterface $date_heure_fin = null;

    #[ORM\Column(type: Types::SMALLINT)]
    #[Assert\NotBlank(
        message: "Le champ {{ value }} est vide."
    )]
    private ?int $prix_total = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Assert\Type("datetime")]
    private ?\DateTimeInterface $date_enregistrement = null;

    

    public function getIdCommande(): ?int
    {
        return $this->id_commande;
    }


    public function getIdMembre(): ?int
    {
        return $this->id_membre;
    }

    public function setIdMembre(int $id_membre): static
    {
        $this->id_membre = $id_membre;

        return $this;
    }

    public function getIdVehicule(): ?int
    {
        return $this->id_vehicule;
    }

    public function setIdVehicule(int $id_vehicule): static
    {
        $this->id_vehicule = $id_vehicule;

        return $this;
    }

    public function getDateHeureDepart(): ?\DateTimeInterface
    {
        return $this->date_heure_depart;
    }

    public function setDateHeureDepart(\DateTimeInterface $date_heure_depart): static
    {
        $this->date_heure_depart = $date_heure_depart;

        return $this;
    }

    public function getDateHeureFin(): ?\DateTimeInterface
    {
        return $this->date_heure_fin;
    }

    public function setDateHeureFin(\DateTimeInterface $date_heure_fin): static
    {
        $this->date_heure_fin = $date_heure_fin;

        return $this;
    }

    public function getPrixTotal(): ?int
    {
        return $this->prix_total;
    }

    public function setPrixTotal(int $prix_total): static
    {
        $this->prix_total = $prix_total;

        return $this;
    }

    public function getDateEnregistrement(): ?\DateTimeInterface
    {
        return $this->date_enregistrement;
    }

    public function setDateEnregistrement(\DateTimeInterface $date_enregistrement): static
    {
        $this->date_enregistrement = $date_enregistrement;

        return $this;
    }

    public function getMembre(): ?Membre
    {
        return $this->membre;
    }

    public function setMembre(?Membre $membre): static
    {
        $this->membre = $membre;

        return $this;
    }

    public function getVehicule(): ?Vehicule
    {
        return $this->vehicule;
    }

    public function setVehicule(?Vehicule $vehicule): static
    {
        $this->vehicule = $vehicule;

        return $this;
    }
}