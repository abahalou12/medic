<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PatientRepository")
 */
class Patient
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $NumSS;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateNaissance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sexe;


    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Ordonnance", mappedBy="patient")
     */
    private $ordonnances;

    /**
     * @ORM\OneToMany(targetEntity=Consultation::class, mappedBy="patient")
     */
    private $consultations;

    public function __construct()
    {
        $this->ordonnances = new ArrayCollection();
        $this->consultations = new ArrayCollection();
    }




    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumSS(): ?float
    {
        return $this->NumSS;
    }

    public function setNumSS(?float $NumSS): self
    {
        $this->NumSS = $NumSS;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(?\DateTimeInterface $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(?string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }


    /**
     * @return Collection|Ordonnance[]
     */
    public function getOrdonnances(): Collection
    {
        return $this->ordonnances;
    }

    public function addOrdonnance(Ordonnance $ordonnance): self
    {
        if (!$this->ordonnances->contains($ordonnance)) {
            $this->ordonnances[] = $ordonnance;
            $ordonnance->setPatient($this);
        }

        return $this;
    }

    public function removeOrdonnance(Ordonnance $ordonnance): self
    {
        if ($this->ordonnances->contains($ordonnance)) {
            $this->ordonnances->removeElement($ordonnance);
            // set the owning side to null (unless already changed)
            if ($ordonnance->getPatient() === $this) {
                $ordonnance->setPatient(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->nom;
    }

    /**
     * @return Collection|Consultation[]
     */
    public function getConsultations(): Collection
    {
        return $this->consultations;
    }

    public function addConsultation(Consultation $consultation): self
    {
        if (!$this->consultations->contains($consultation)) {
            $this->consultations[] = $consultation;
            $consultation->setPatient($this);
        }

        return $this;
    }

    public function removeConsultation(Consultation $consultation): self
    {
        if ($this->consultations->contains($consultation)) {
            $this->consultations->removeElement($consultation);
            // set the owning side to null (unless already changed)
            if ($consultation->getPatient() === $this) {
                $consultation->setPatient(null);
            }
        }

        return $this;
    }

}
