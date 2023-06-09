<?php

namespace App\Entity;

use App\Repository\CursoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CursoRepository::class)]
class Curso
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titulo = null;

    #[ORM\Column(length: 255)]
    private ?string $descripcion = null;

    #[ORM\ManyToMany(targetEntity: Relacion::class, mappedBy: 'id_curso')]
    private Collection $relacions;

    public function __construct()
    {
        $this->relacions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): static
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): static
    {
        $this->descripcion = $descripcion;

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
            $relacion->addIdCurso($this);
        }

        return $this;
    }

    public function removeRelacion(Relacion $relacion): static
    {
        if ($this->relacions->removeElement($relacion)) {
            $relacion->removeIdCurso($this);
        }

        return $this;
    }
}
