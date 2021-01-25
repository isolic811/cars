<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CarRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use App\Dto\CarOutput;

/**
 * @ApiResource(
 *     output=CarOutput::class,
 *     collectionOperations={"get", "post"},
 *     itemOperations={"get", "patch"}
 * )
 * @ORM\Entity(repositoryClass=CarRepository::class)
 */
class Car
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private string $name;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank()
     * @Assert\PositiveOrZero()
     */
    private float $price;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 3,
     *      max = 3,
     *      minMessage = "Currency code has to match ISO 4217 standard (3 characters long)!",
     *      maxMessage = "Currency code has to match ISO 4217 standard (3 characters long)!",
     *      allowEmptyString = false
     * )
     * @Assert\Choice({"HRK", "GBP", "EUR", "YEN", "CAN", "USD"})
     */
    public string $currency;

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }
}
