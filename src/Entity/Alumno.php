<?php

namespace App\Entity;

use App\Repository\AlumnoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AlumnoRepository::class)]
class Alumno
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column(length: 255)]
    private ?string $apellido = null;

    #[ORM\OneToMany(mappedBy: 'fk_alumno', targetEntity: Relacion::class)]
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

    public function getApellido(): ?string
    {
        return $this->apellido;
    }

    public function setApellido(string $apellido): static
    {
        $this->apellido = $apellido;

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
            $relacion->setFkAlumno($this);
        }

        return $this;
    }

    public function removeRelacion(Relacion $relacion): static
    {
        if ($this->relacions->removeElement($relacion)) {
            // set the owning side to null (unless already changed)
            if ($relacion->getFkAlumno() === $this) {
                $relacion->setFkAlumno(null);
            }
        }

        return $this;
    }
}
