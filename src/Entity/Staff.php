<?php

namespace App\Entity;

use Ant\MediaBundle\Entity\Media;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\PersistentCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Ant\MediaBundle\Entity\Gallery;
/**
 * Class House
 * @package App\Entity
 * @ORM\Table(name="staff")
 * @ORM\Entity()
 */
class Staff
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="full_name", type="string", length=1024)
     */
    private $fullName;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="position", type="string", length=1024)
     */
    private $position;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var Media|null
     *
     * @ORM\OneToOne(
     *     targetEntity="Ant\MediaBundle\Entity\Media",
     *     cascade={"PERSIST", "REMOVE"},
     *     orphanRemoval=true
     * )
     */
    private $photo;

    /**
     * House constructor.
     */
    public function __construct()
    {
        $this->fullName = '';
        $this->description = '';
        $this->position = '';
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return $this->fullName;
    }

    /**
     * @param string $fullName
     * @return Staff
     */
    public function setFullName(string $fullName): Staff
    {
        $this->fullName = $fullName;
        return $this;
    }

    /**
     * @return string
     */
    public function getPosition(): string
    {
        return $this->position;
    }

    /**
     * @param string $position
     * @return Staff
     */
    public function setPosition(string $position): Staff
    {
        $this->position = $position;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Staff
     */
    public function setDescription(string $description): Staff
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return Media|null
     */
    public function getPhoto(): ?Media
    {
        return $this->photo;
    }

    /**
     * @param Media|null $photo
     * @return Staff
     */
    public function setPhoto(?Media $photo): Staff
    {
        $this->photo = $photo;
        return $this;
    }

}
