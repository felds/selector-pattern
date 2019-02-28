<?php
declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 * @ORM\Table(name="order_is_a_reserved_keyword")
 */
class Order
{
    /**
     * @var int|null
     * @ORM\Column(type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue()
     */
    private $id;

    /**
     * @var Pizza|null
     * @ORM\ManyToOne(targetEntity=Pizza::class)
     * @Assert\NotNull()
     */
    private $pizza;

    /**
     * The name of the customer.
     * @var string
     * @ORM\Column()
     * @Assert\NotBlank()
     */
    private $customer = "";

    public function __toString(): string
    {
        return "{$this->customer} - {$this->pizza}";
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Pizza|null
     */
    public function getPizza(): ?Pizza
    {
        return $this->pizza;
    }

    /**
     * @param Pizza|null $pizza
     */
    public function setPizza(?Pizza $pizza): void
    {
        $this->pizza = $pizza;
    }

    /**
     * @return string
     */
    public function getCustomer(): string
    {
        return $this->customer;
    }

    /**
     * @param string $customer
     */
    public function setCustomer(string $customer): void
    {
        $this->customer = $customer;
    }
}