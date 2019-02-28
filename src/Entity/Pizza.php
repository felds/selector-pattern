<?php
declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 */
class Pizza
{
    /**
     * @var int|null
     * @ORM\Column(type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue()
     */
    private $id;

    /**
     * The name of the pizza.
     *
     * @var string|null
     * @ORM\Column()
     * @Assert\NotBlank()
     */
    private $flavor;

    /**
     * The price in cents.
     *
     * @var int
     * @ORM\Column(type="integer")
     * @Assert\GreaterThan(0)
     */
    private $price = 0;

    public function __toString(): string
    {
        return "{$this->flavor} ({$this->getFormattedPrice()})";
    }

    public function getFormattedPrice(): string
    {
        return sprintf('R$ %0.02f', $this->price / 100);
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getFlavor(): ?string
    {
        return $this->flavor;
    }

    /**
     * @param string|null $flavor
     */
    public function setFlavor(?string $flavor): void
    {
        $this->flavor = $flavor;
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
     */
    public function setPrice(int $price): void
    {
        $this->price = $price;
    }
}