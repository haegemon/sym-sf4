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
 * @ORM\Table(name="testimonials")
 * @ORM\Entity()
 */
class Testimonial
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
     * @ORM\Column(name="ext", type="text")
     */
    private $text;

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
        $this->title = '';
        $this->text = '';
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
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Testimonial
     */
    public function setTitle(string $title): Testimonial
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return Testimonial
     */
    public function setText(string $text): Testimonial
    {
        $this->text = $text;
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
     * @return Testimonial
     */
    public function setPhoto(?Media $photo): Testimonial
    {
        $this->photo = $photo;
        return $this;
    }
}
