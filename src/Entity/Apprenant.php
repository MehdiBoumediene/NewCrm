<?php

namespace App\Entity;

use App\Repository\ApprenantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ApprenantRepository::class)
 */
class Apprenant
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $createdBy;

    /**
     * @ORM\ManyToOne(targetEntity=Classe::class, inversedBy="apprenant")
     */
    private $classe;

    /**
     * @ORM\OneToMany(targetEntity=Module::class, mappedBy="apprenant")
     */
    private $modules;

    /**
     * @ORM\ManyToMany(targetEntity=Module::class, inversedBy="apprenants")
     */
    private $module;

    /**
     * @ORM\ManyToOne(targetEntity=Classe::class, inversedBy="apprenants")
     */
    private $classes;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="apprenants")
     */
    private $user;

    /**
     * @ORM\ManyToMany(targetEntity=Bloc::class, inversedBy="apprenants")
     */
    private $bloc;

    /**
     * @ORM\OneToMany(targetEntity=Tuteur::class, mappedBy="apprenant")
     */
    private $tuteur;

    /**
     * @ORM\ManyToMany(targetEntity=Document::class, inversedBy="apprenants")
     */
    private $document;

    /**
     * @ORM\OneToMany(targetEntity=Message::class, mappedBy="apprenant")
     */
    private $message;

    /**
     * @ORM\OneToMany(targetEntity=Absence::class, mappedBy="apprenant")
     */
    private $absence;

    /**
     * @ORM\ManyToMany(targetEntity=Intervenant::class, mappedBy="apprenant")
     */
    private $intervenants;

    /**
     * @ORM\ManyToMany(targetEntity=Tuteur::class, mappedBy="apprenants")
     */
    private $tuteurs;

    public function __construct()
    {
        $this->modules = new ArrayCollection();
        $this->module = new ArrayCollection();
        $this->bloc = new ArrayCollection();
        $this->tuteur = new ArrayCollection();
        $this->document = new ArrayCollection();
        $this->message = new ArrayCollection();
        $this->absence = new ArrayCollection();
        $this->intervenants = new ArrayCollection();
        $this->tuteurs = new ArrayCollection();
        $this->absences = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getCreatedBy(): ?string
    {
        return $this->createdBy;
    }

    public function setCreatedBy(string $createdBy): self
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    public function getClasse(): ?Classe
    {
        return $this->classe;
    }

    public function setClasse(?Classe $classe): self
    {
        $this->classe = $classe;

        return $this;
    }

    /**
     * @return Collection<int, Module>
     */
    public function getModules(): Collection
    {
        return $this->modules;
    }

    public function addModule(Module $module): self
    {
        if (!$this->modules->contains($module)) {
            $this->modules[] = $module;
            $module->setApprenant($this);
        }

        return $this;
    }

    public function removeModule(Module $module): self
    {
        if ($this->modules->removeElement($module)) {
            // set the owning side to null (unless already changed)
            if ($module->getApprenant() === $this) {
                $module->setApprenant(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Module>
     */
    public function getModule(): Collection
    {
        return $this->module;
    }

    public function getClasses(): ?Classe
    {
        return $this->classes;
    }

    public function setClasses(?Classe $classes): self
    {
        $this->classes = $classes;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection<int, Bloc>
     */
    public function getBloc(): Collection
    {
        return $this->bloc;
    }

    public function addBloc(Bloc $bloc): self
    {
        if (!$this->bloc->contains($bloc)) {
            $this->bloc[] = $bloc;
        }

        return $this;
    }

    public function removeBloc(Bloc $bloc): self
    {
        $this->bloc->removeElement($bloc);

        return $this;
    }

    /**
     * @return Collection<int, Tuteur>
     */
    public function getTuteur(): Collection
    {
        return $this->tuteur;
    }

    public function addTuteur(Tuteur $tuteur): self
    {
        if (!$this->tuteur->contains($tuteur)) {
            $this->tuteur[] = $tuteur;
            $tuteur->setApprenant($this);
        }

        return $this;
    }

    public function removeTuteur(Tuteur $tuteur): self
    {
        if ($this->tuteur->removeElement($tuteur)) {
            // set the owning side to null (unless already changed)
            if ($tuteur->getApprenant() === $this) {
                $tuteur->setApprenant(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Document>
     */
    public function getDocument(): Collection
    {
        return $this->document;
    }

    public function addDocument(Document $document): self
    {
        if (!$this->document->contains($document)) {
            $this->document[] = $document;
        }

        return $this;
    }

    public function removeDocument(Document $document): self
    {
        $this->document->removeElement($document);

        return $this;
    }

    /**
     * @return Collection<int, Message>
     */
    public function getMessage(): Collection
    {
        return $this->message;
    }

    public function addMessage(Message $message): self
    {
        if (!$this->message->contains($message)) {
            $this->message[] = $message;
            $message->setApprenant($this);
        }

        return $this;
    }

    public function removeMessage(Message $message): self
    {
        if ($this->message->removeElement($message)) {
            // set the owning side to null (unless already changed)
            if ($message->getApprenant() === $this) {
                $message->setApprenant(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Absence>
     */
    public function getAbsence(): Collection
    {
        return $this->absence;
    }

    public function addAbsence(Absence $absence): self
    {
        if (!$this->absence->contains($absence)) {
            $this->absence[] = $absence;
            $absence->setApprenant($this);
        }

        return $this;
    }

    public function removeAbsence(Absence $absence): self
    {
        if ($this->absence->removeElement($absence)) {
            // set the owning side to null (unless already changed)
            if ($absence->getApprenant() === $this) {
                $absence->setApprenant(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Intervenant>
     */
    public function getIntervenants(): Collection
    {
        return $this->intervenants;
    }

    public function addIntervenant(Intervenant $intervenant): self
    {
        if (!$this->intervenants->contains($intervenant)) {
            $this->intervenants[] = $intervenant;
            $intervenant->addApprenant($this);
        }

        return $this;
    }

    public function removeIntervenant(Intervenant $intervenant): self
    {
        if ($this->intervenants->removeElement($intervenant)) {
            $intervenant->removeApprenant($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Tuteur>
     */
    public function getTuteurs(): Collection
    {
        return $this->tuteurs;
    }

    /**
     * @return Collection<int, Absence>
     */
    public function getAbsences(): Collection
    {
        return $this->absences;
    }
}
