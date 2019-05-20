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
 * @ORM\Table(name="houses")
 * @ORM\Entity(repositoryClass="App\Repository\HouseRepository")
 */
class House
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
     * @ORM\Column(name="title", type="string", length=1024)
     */
    private $title;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="url", type="string", length=1024)
     */
    private $url;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var float
     *
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="size", type="float")
     */
    private $size;

    /**
     * @var int
     *
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="price", type="integer")
     */
    private $price;

    /**
     * @var int
     *
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="bedroom_count", type="integer")
     */
    private $bedroomCount;

    /**
     * @var int
     *
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="floor_count", type="integer")
     */
    private $floorCount;

    /**
     * @var int
     *
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="bathroom_count", type="integer")
     */
    private $bathroomCount;

    /**
     * @var Gallery
     *
     * @ORM\OneToOne(
     *     targetEntity="Ant\MediaBundle\Entity\Gallery",
     *     cascade={"PERSIST", "REMOVE"},
     *     orphanRemoval=true
     * )
     */
    private $gallery;

    /**
     * @var Gallery
     *
     * @ORM\OneToOne(
     *     targetEntity="Ant\MediaBundle\Entity\Gallery",
     *     cascade={"PERSIST", "REMOVE"},
     *     orphanRemoval=true
     * )
     */
    private $planGallery;

    /**
     * @var Media
     *
     * @ORM\ManyToOne(
     *     targetEntity="Ant\MediaBundle\Entity\Media"
     * )
     */
    private $mainPhoto;

    /**
     * House constructor.
     */
    public function __construct()
    {
        $this->title = '';
        $this->url = '';
        $this->description = '';
        $this->size = 0;
        $this->price = 0;
        $this->bedroomCount = 0;
        $this->floorCount = 0;
        $this->bathroomCount = 0;
    }


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return House
     */
    public function setId(int $id): House
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return House
     */
    public function setTitle(string $title): House
    {
        $this->title = $title;
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
     * @return House
     */
    public function setDescription(string $description): House
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return float
     */
    public function getSize(): float
    {
        return $this->size;
    }

    /**
     * @param float $size
     * @return House
     */
    public function setSize(float $size): House
    {
        $this->size = $size;
        return $this;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @param int $price
     * @return House
     */
    public function setPrice(int $price): House
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return int
     */
    public function getBedroomCount(): int
    {
        return $this->bedroomCount;
    }

    /**
     * @param int $bedroomCount
     * @return House
     */
    public function setBedroomCount(int $bedroomCount): House
    {
        $this->bedroomCount = $bedroomCount;
        return $this;
    }

    /**
     * @return int
     */
    public function getFloorCount(): int
    {
        return $this->floorCount;
    }

    /**
     * @param int $floorCount
     * @return House
     */
    public function setFloorCount(int $floorCount): House
    {
        $this->floorCount = $floorCount;
        return $this;
    }

    /**
     * @return int
     */
    public function getBathroomCount(): int
    {
        return $this->bathroomCount;
    }

    /**
     * @param int $bathroomCount
     * @return House
     */
    public function setBathroomCount(int $bathroomCount): House
    {
        $this->bathroomCount = $bathroomCount;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return House
     */
    public function setUrl(string $url): House
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return Gallery
     */
    public function getGallery()
    {
        return $this->gallery;
    }

    /**
     * @param Gallery $gallery
     * @return House
     */
    public function setGallery(Gallery $gallery): House
    {
        $this->gallery = $gallery;
        return $this;
    }

    /**
     * @return Gallery
     */
    public function getPlanGallery()
    {
        return $this->planGallery;
    }

    /**
     * @param Gallery $planGallery
     * @return House
     */
    public function setPlanGallery(Gallery $planGallery): House
    {
        $this->planGallery = $planGallery;
        return $this;
    }

    /**
     * @return Media|null
     */
    public function getMainPhoto(): ?Media
    {
        return $this->mainPhoto;
    }

    /**
     * @param Media $mainPhoto
     * @return House
     */
    public function setMainPhoto(Media $mainPhoto): House
    {
        $this->mainPhoto = $mainPhoto;
        return $this;
    }
}
