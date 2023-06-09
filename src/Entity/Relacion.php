<?php

namespace App\Entity;

use App\Repository\RelacionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RelacionRepository::class)]
class Relacion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToMany(targetEntity: alumnos::class, inversedBy: 'relacions')]
    private Collection $id_alumno;

    #[ORM\ManyToMany(targetEntity: curso::class, inversedBy: 'relacions')]
    private Collection $id_curso;

    public function __construct()
    {
        $this->id_alumno = new ArrayCollection();
        $this->id_curso = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, alumnos>
     */
    public function getIdAlumno(): Collection
    {
        return $this->id_alumno;
    }

    public function addIdAlumno(alumnos $idAlumno): static
    {
        if (!$this->id_alumno->contains($idAlumno)) {
            $this->id_alumno->add($idAlumno);
        }

        return $this;
    }

    public function removeIdAlumno(alumnos $idAlumno): static
    {
        $this->id_alumno->removeElement($idAlumno);

        return $this;
    }

    /**
     * @return Collection<int, curso>
     */
    public function getIdCurso(): Collection
    {
        return $this->id_curso;
    }

    public function addIdCurso(curso $idCurso): static
    {
        if (!$this->id_curso->contains($idCurso)) {
            $this->id_curso->add($idCurso);
        }

        return $this;
    }

    public function removeIdCurso(curso $idCurso): static
    {
        $this->id_curso->removeElement($idCurso);

        return $this;
    }
}
