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
     * @var ?int
     * @ORM\Column(type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue()
     */
    private $id;

    /**
     * The name of the pizza.
     *
     * @var ?string;
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

    public function __toString()
    {
        return "{$this->flavor} ({$this->getFormattedPrice()})";
    }

    public function getFormattedPrice(): string
    {
        return sprintf('R$ %0.02f', $this->price / 100);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getFlavor()
    {
        return $this->flavor;
    }

    /**
     * @param mixed $flavor
     */
    public function setFlavor($flavor): void
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