<?php

namespace App\Entity;

use App\Repository\ClasseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClasseRepository::class)
 */
class Classe
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
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $createdBy;

    /**
     * @ORM\OneToMany(targetEntity=Bloc::class, mappedBy="classe")
     */
    private $Bloc;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="classes")
     */
    private $User;

    /**
     * @ORM\OneToMany(targetEntity=Apprenant::class, mappedBy="classe")
     */
    private $apprenant;

    /**
     * @ORM\OneToMany(targetEntity=Intervenant::class, mappedBy="classe")
     */
    private $intervenant;

    /**
     * @ORM\OneToMany(targetEntity=Module::class, mappedBy="classe")
     */
    private $module;

    /**
     * @ORM\OneToMany(targetEntity=Message::class, mappedBy="classe")
     */
    private $message;

    /**
     * @ORM\ManyToOne(targetEntity=Bloc::class, inversedBy="classes")
     */
    private $bloc;

    /**
     * @ORM\ManyToMany(targetEntity=Module::class, mappedBy="Classe")
     */
    private $modules;

    /**
     * @ORM\OneToMany(targetEntity=Apprenant::class, mappedBy="classes")
     */
    private $apprenants;

    /**
     * @ORM\OneToMany(targetEntity=Intervenant::class, mappedBy="classes")
     */
    private $intervenants;

    /**
     * @ORM\OneToMany(targetEntity=Absence::class, mappedBy="classe")
     */
    private $absences;

    public function __construct()
    {
        $this->Bloc = new ArrayCollection();
        $this->apprenant = new ArrayCollection();
        $this->intervenant = new ArrayCollection();
        $this->module = new ArrayCollection();
        $this->message = new ArrayCollection();
        $this->modules = new ArrayCollection();
        $this->apprenants = new ArrayCollection();
        $this->intervenants = new ArrayCollection();
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

    /**
     * @return Collection<int, Bloc>
     */
    public function getBloc(): Collection
    {
        return $this->Bloc;
    }

    public function addBloc(Bloc $bloc): self
    {
        if (!$this->Bloc->contains($bloc)) {
            $this->Bloc[] = $bloc;
            $bloc->setClasse($this);
        }

        return $this;
    }

    public function removeBloc(Bloc $bloc): self
    {
        if ($this->Bloc->removeElement($bloc)) {
            // set the owning side to null (unless already changed)
            if ($bloc->getClasse() === $this) {
                $bloc->setClasse(null);
            }
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): self
    {
        $this->User = $User;

        return $this;
    }

    /**
     * @return Collection<int, Apprenant>
     */
    public function getApprenant(): Collection
    {
        return $this->apprenant;
    }

    public function addApprenant(Apprenant $apprenant): self
    {
        if (!$this->apprenant->contains($apprenant)) {
            $this->apprenant[] = $apprenant;
            $apprenant->setClasse($this);
        }

        return $this;
    }

    public function removeApprenant(Apprenant $apprenant): self
    {
        if ($this->apprenant->removeElement($apprenant)) {
            // set the owning side to null (unless already changed)
            if ($apprenant->getClasse() === $this) {
                $apprenant->setClasse(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Intervenant>
     */
    public function getIntervenant(): Collection
    {
        return $this->intervenant;
    }

    public function addIntervenant(Intervenant $intervenant): self
    {
        if (!$this->intervenant->contains($intervenant)) {
            $this->intervenant[] = $intervenant;
            $intervenant->setClasse($this);
        }

        return $this;
    }

    public function removeIntervenant(Intervenant $intervenant): self
    {
        if ($this->intervenant->removeElement($intervenant)) {
            // set the owning side to null (unless already changed)
            if ($intervenant->getClasse() === $this) {
                $intervenant->setClasse(null);
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

    public function addModule(Module $module): self
    {
        if (!$this->module->contains($module)) {
            $this->module[] = $module;
            $module->setClasse($this);
        }

        return $this;
    }

    public function removeModule(Module $module): self
    {
        if ($this->module->removeElement($module)) {
            // set the owning side to null (unless already changed)
            if ($module->getClasse() === $this) {
                $module->setClasse(null);
            }
        }

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
            $message->setClasse($this);
        }

        return $this;
    }

    public function removeMessage(Message $message): self
    {
        if ($this->message->removeElement($message)) {
            // set the owning side to null (unless already changed)
            if ($message->getClasse() === $this) {
                $message->setClasse(null);
            }
        }

        return $this;
    }

    public function setBloc(?Bloc $bloc): self
    {
        $this->bloc = $bloc;

        return $this;
    }

    /**
     * @return Collection<int, Module>
     */
    public function getModules(): Collection
    {
        return $this->modules;
    }

    /**
     * @return Collection<int, Apprenant>
     */
    public function getApprenants(): Collection
    {
        return $this->apprenants;
    }

    /**
     * @return Collection<int, Intervenant>
     */
    public function getIntervenants(): Collection
    {
        return $this->intervenants;
    }

    /**
     * @return Collection<int, Absence>
     */
    public function getAbsences(): Collection
    {
        return $this->absences;
    }

    public function addAbsence(Absence $absence): self
    {
        if (!$this->absences->contains($absence)) {
            $this->absences[] = $absence;
            $absence->setClasse($this);
        }

        return $this;
    }

    public function removeAbsence(Absence $absence): self
    {
        if ($this->absences->removeElement($absence)) {
            // set the owning side to null (unless already changed)
            if ($absence->getClasse() === $this) {
                $absence->setClasse(null);
            }
        }

        return $this;
    }
}
