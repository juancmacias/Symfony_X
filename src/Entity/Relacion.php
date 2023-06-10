<?php

namespace App\Entity;

use App\Repository\RelacionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RelacionRepository::class)]
class Relacion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'relacions')]
    private ?Alumno $fk_alumno = null;

    #[ORM\ManyToOne(inversedBy: 'relacions')]
    private ?Curso $fk_curso = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFkAlumno(): ?Alumno
    {
        return $this->fk_alumno;
    }

    public function setFkAlumno(?Alumno $fk_alumno): static
    {
        $this->fk_alumno = $fk_alumno;

        return $this;
    }

    public function getFkCurso(): ?Curso
    {
        return $this->fk_curso;
    }

    public function setFkCurso(?Curso $fk_curso): static
    {
        $this->fk_curso = $fk_curso;

        return $this;
    }
}
