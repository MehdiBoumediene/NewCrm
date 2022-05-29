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
     * @ORM\OneToMany(targetEntity=Bloc::class, mappedBy="classe", orphanRemoval=true)
     */
    private $bloc;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="classes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=Apprenant::class, mappedBy="classe", orphanRemoval=true)
     */
    private $apprenant;

    /**
     * @ORM\OneToMany(targetEntity=Intervenant::class, mappedBy="classe", orphanRemoval=true)
     */
    private $inetervenant;

    /**
     * @ORM\OneToMany(targetEntity=Module::class, mappedBy="classe", orphanRemoval=true)
     */
    private $module;

    /**
     * @ORM\OneToMany(targetEntity=Message::class, mappedBy="classe", orphanRemoval=true)
     */
    private $message;

    /**
     * @ORM\OneToMany(targetEntity=Absence::class, mappedBy="classe", orphanRemoval=true)
     */
    private $absences;

    public function __construct()
    {
        $this->bloc = new ArrayCollection();
        $this->apprenant = new ArrayCollection();
        $this->inetervenant = new ArrayCollection();
        $this->module = new ArrayCollection();
        $this->message = new ArrayCollection();
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
        return $this->bloc;
    }

    public function addBloc(Bloc $bloc): self
    {
        if (!$this->bloc->contains($bloc)) {
            $this->bloc[] = $bloc;
            $bloc->setClasse($this);
        }

        return $this;
    }

    public function removeBloc(Bloc $bloc): self
    {
        if ($this->bloc->removeElement($bloc)) {
            // set the owning side to null (unless already changed)
            if ($bloc->getClasse() === $this) {
                $bloc->setClasse(null);
            }
        }

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
    public function getInetervenant(): Collection
    {
        return $this->inetervenant;
    }

    public function addInetervenant(Intervenant $inetervenant): self
    {
        if (!$this->inetervenant->contains($inetervenant)) {
            $this->inetervenant[] = $inetervenant;
            $inetervenant->setClasse($this);
        }

        return $this;
    }

    public function removeInetervenant(Intervenant $inetervenant): self
    {
        if ($this->inetervenant->removeElement($inetervenant)) {
            // set the owning side to null (unless already changed)
            if ($inetervenant->getClasse() === $this) {
                $inetervenant->setClasse(null);
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
