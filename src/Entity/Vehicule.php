<?php

namespace App\Entity;

use App\Repository\VehiculeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: VehiculeRepository::class)]
class Vehicule
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "AUTO")]
    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $id_vehicule = null;

    #[ORM\Column(length: 200)]
    #[Assert\NotBlank(
        message: "Le champ {{ value }} est vide."
    )]
    #[Assert\Length(
        charset:"UTF-8",
        charsetMessage: "{{ value }} : Le caractère {{ charset }} n'est pas valide.",
        min: 5, 
        minMessage: "Le champ {{ value }} doit faire {{ limit }} caractères minimum.",
        max: 200,
        maxMessage: "Le champ {{ value }} doit faire {{ limit }} caractères maximum.",
    )]
    private ?string $titre = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(
        message: "Le champ {{ value }} est vide."
    )]
    #[Assert\Length(
        charset:"UTF-8",
        charsetMessage: "{{ value }} : Le caractère {{ charset }} n'est pas valide.",
        min: 3, 
        minMessage: "Le champ {{ value }} doit faire {{ limit }} caractères minimum.",
        max: 50,
        maxMessage: "Le champ {{ value }} doit faire {{ limit }} caractères maximum.",
    )]
    private ?string $marque = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(
        message: "Le champ {{ value }} est vide."
    )]
    #[Assert\Length(
        charset:"UTF-8",
        charsetMessage: "{{ value }} : Le caractère {{ charset }} n'est pas valide.",
        min: 3, 
        minMessage: "Le champ {{ value }} doit faire {{ limit }} caractères minimum.",
        max: 50,
        maxMessage: "Le champ {{ value }} doit faire {{ limit }} caractères maximum.",
    )]
    private ?string $modele = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(
        message: "Le champ {{ value }} est vide."
    )]
    #[Assert\Length(
        charset:"UTF-8",
        charsetMessage: "{{ value }} : Le caractère {{ charset }} n'est pas valide.",
        min: 3, 
        minMessage: "Le champ {{ value }} doit faire {{ limit }} caractères minimum.",
        max: 3000,
        maxMessage: "Le champ {{ value }} doit faire {{ limit }} caractères maximum.",
    )]
    private ?string $description = null;

    #[ORM\Column(length: 200)]
    #[Assert\NotBlank(
        message: "Le champ {{ value }} est vide."
    )]
    #[Assert\Length(
        charset:"UTF-8",
        charsetMessage: "{{ value }} : Le caractère {{ charset }} n'est pas valide.",
        min: 3, 
        minMessage: "Le champ {{ value }} doit faire {{ limit }} caractères minimum.",
        max: 50,
        maxMessage: "Le champ {{ value }} doit faire {{ limit }} caractères maximum.",
    )]
    private ?string $photo = null;

    #[ORM\Column]
    #[Assert\NotBlank(
        message: "Le champ {{ value }} est vide."
    )]
    private ?int $prix_journalier = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Assert\Type("datetime")]
    private ?\DateTimeInterface $date_enregistrement = null;

    public function getIdVehicule(): ?int
    {
        return $this->id_vehicule;
    }


    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): static
    {
        $this->marque = $marque;

        return $this;
    }

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele(string $modele): static
    {
        $this->modele = $modele;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): static
    {
        $this->photo = $photo;

        return $this;
    }

    public function getPrixJournalier(): ?int
    {
        return $this->prix_journalier;
    }

    public function setPrixJournalier(int $prix_journalier): static
    {
        $this->prix_journalier = $prix_journalier;

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
}