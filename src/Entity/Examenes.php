<?php

namespace App\Entity;

use App\Repository\ExamenesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ExamenesRepository::class)
 * @ORM\HasLifecycleCallbacks()
 */
class Examenes
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=35000)
     */
    private $html;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $ip;

    /**
     * @ORM\Column(type="datetime")
     */
    private $hora;

    /**
     * @ORM\Column(type="float", nullable=false)
     */
    private $puntaje;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHtml(): ?string
    {
        return $this->html;
    }

    public function setHtml(string $html): self
    {
        $this->html = $html;

        return $this;
    }

    public function getIp(): ?string
    {
        return $this->ip;
    }

    public function setIp(string $ip): self
    {
        $this->ip = $ip;

        return $this;
    }

    public function getHora(): ?\DateTimeInterface
    {
        return $this->hora;
    }
    /**
     * Set hora
     *
     * @param \Date $hora
     * @ORM\PrePersist
     * @return this
     */
    public function setHora()
    {
        $this->hora= new \DateTime();
        return $this;
    }

    public function getPuntaje(): ?float
    {
        return $this->puntaje;
    }

    public function setPuntaje(float $puntaje): self
    {
        $this->puntaje = $puntaje;

        return $this;
    }
}
