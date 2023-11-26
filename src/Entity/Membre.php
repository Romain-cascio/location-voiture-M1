<?php

namespace App\Entity;

use App\Repository\MembreRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: MembreRepository::class)]
#[UniqueEntity("email")]
class Membre
{   
    public const GENRES = ['M', 'F'];

    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "AUTO")]
    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $id_membre = null;

    #[ORM\Column(length: 20)]
    #[Assert\NotBlank(
        message: "Le champ {{ value }} est vide."
    )]
    #[Assert\Length(
        charset:"UTF-8",
        charsetMessage: "{{ value }} : Le caractère {{ charset }} n'est pas valide.",
        min: 5, 
        minMessage: "Le champ {{ value }} doit faire {{ limit }} caractères minimum.",
        max: 20,
        maxMessage: "Le champ {{ value }} doit faire {{ limit }} caractères maximum.",
    )]
    private ?string $pseudo = null;

    #[ORM\Column(length: 60)]
    #[Assert\NotBlank(
        message: "Le champ {{ value }} est vide."
    )]
    #[Assert\Length(
        charset:"UTF-8",
        charsetMessage: "{{ value }} : Le caractère {{ charset }} n'est pas valide.",
        min: 8, 
        minMessage: "Le champ {{ value }} doit faire {{ limit }} caractères minimum.",
        max: 60,
        maxMessage: "Le champ {{ value }} doit faire {{ limit }} caractères maximum.",
    )]
    private ?string $mdp = null;

    #[ORM\Column(length: 20)]
    #[Assert\NotBlank(
        message: "Le champ {{ value }} est vide."
    )]
    #[Assert\Length(
        charset:"UTF-8",
        charsetMessage: "{{ value }} : Le caractère {{ charset }} n'est pas valide.",
        min: 3, 
        minMessage: "Le champ {{ value }} doit faire {{ limit }} caractères minimum.",
        max: 20,
        maxMessage: "Le champ {{ value }} doit faire {{ limit }} caractères maximum.",
    )]
    private ?string $nom = null;

    #[ORM\Column(length: 20)]
    #[Assert\NotBlank(
        message: "Le champ {{ value }} est vide."
    )]
    #[Assert\Length(
        charset:"UTF-8",
        charsetMessage: "{{ value }} : Le caractère {{ charset }} n'est pas valide.",
        min: 2, 
        minMessage: "Le champ {{ value }} doit faire {{ limit }} caractères minimum.",
        max: 20,
        maxMessage: "Le champ {{ value }} doit faire {{ limit }} caractères maximum.",
    )]
    private ?string $prenom = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(
        message: "Le champ {{ value }} est vide."
    )]
    #[Assert\Email(
        message: "L'adresse mail saisie est invalide.",
        mode: "loose",
    )]
    #[Assert\Length(
        charset:"UTF-8",
        charsetMessage: "{{ value }} : Le caractère {{ charset }} n'est pas valide.",
        min: 6, 
        minMessage: "Le champ {{ value }} doit faire {{ limit }} caractères minimum.",
        max: 20,
        maxMessage: "Le champ {{ value }} doit faire {{ limit }} caractères maximum.",
    )]
    private ?string $email = null;

    #[ORM\Column(length:1)]
    #[Assert\NotBlank(
        message: "Le champ {{ value }} est vide."
    )]
    #[Assert\Choice(
        choices: Membre::GENRES ,
        message : "Veuillez choisir un sexe qui existe dans la vraie vie (M ou F).",
    )]
    private ?string $civilite = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $statut = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Assert\Type("datetime")]
    private ?\DateTimeInterface $date_enregistrement = null;

    public function getIdMembre(): ?int
    {
        return $this->id_membre;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): static
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(string $mdp): static
    {
        $this->mdp = $mdp;

        return $this;
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function isCivilite(): ?bool
    {
        return $this->civilite;
    }

    public function setCivilite(bool $civilite): static
    {
        $this->civilite = $civilite;

        return $this;
    }

    public function getStatut(): ?int
    {
        return $this->statut;
    }

    public function setStatut(int $statut): static
    {
        $this->statut = $statut;

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