<?php

namespace App\Entity;

use App\Repository\CommentsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommentsRepository::class)]
class Comments
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $rating = null;

    #[ORM\Column(type: "text")]
    private ?string $comment = null;

    #[ORM\Column]
    private ?int $moderation = null;

    #[ORM\Column(type: "datetime")]
    private \DateTime $created;

    public function __construct()
    {
        $this->created = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function setRating(int $rating): static
    {
        $this->rating = $rating;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): static
    {
        $this->comment = $comment;

        return $this;
    }

    public function getModeration(): ?int
    {
        return $this->moderation;
    }

    public function setModeration(int $moderation): static
    {
        $this->moderation = $moderation;

        return $this;
    }

    public function getCreated(): \DateTime
    {
        return $this->created;
    }
}
