<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ImgRepository")
 */
class Img
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $img;

    /**
     * @ORM\Column(type="string", length=5000)
     */
    private $discription;

    /**
     * @ORM\Column(type="blob")
     */
    private $img_blob;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(string $img): self
    {
        $this->img = $img;

        return $this;
    }

    public function getDiscription(): ?string
    {
        return $this->discription;
    }

    public function setDiscription(string $discription): self
    {
        $this->discription = $discription;

        return $this;
    }

    public function getImgBlob()
    {
        return $this->img_blob;
    }

    public function setImgBlob($img_blob): self
    {
        $this->img_blob = $img_blob;

        return $this;
    }
}
