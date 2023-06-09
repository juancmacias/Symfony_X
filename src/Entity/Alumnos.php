<?php

namespace App\Entity;

use App\Repository\AlumnosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AlumnosRepository::class)]
class Alumnos
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column(length: 255)]
    private ?string $primer_apellido = null;

    #[ORM\Column(length: 255)]
    private ?string $segundo_apellido = null;

    #[ORM\ManyToMany(targetEntity: Relacion::class, mappedBy: 'id_alumno')]
    private Collection $relacions;

    public function __construct()
    {
        $this->relacions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getPrimerApellido(): ?string
    {
        return $this->primer_apellido;
    }

    public function setPrimerApellido(string $primer_apellido): static
    {
        $this->primer_apellido = $primer_apellido;

        return $this;
    }

    public function getSegundoApellido(): ?string
    {
        return $this->segundo_apellido;
    }

    public function setSegundoApellido(string $segundo_apellido): static
    {
        $this->segundo_apellido = $segundo_apellido;

        return $this;
    }

    /**
     * @return Collection<int, Relacion>
     */
    public function getRelacions(): Collection
    {
        return $this->relacions;
    }

    public function addRelacion(Relacion $relacion): static
    {
        if (!$this->relacions->contains($relacion)) {
            $this->relacions->add($relacion);
            $relacion->addIdAlumno($this);
        }

        return $this;
    }

    public function removeRelacion(Relacion $relacion): static
    {
        if ($this->relacions->removeElement($relacion)) {
            $relacion->removeIdAlumno($this);
        }

        return $this;
    }
}
