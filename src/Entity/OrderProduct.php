<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\OrderProductRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrderProductRepository::class)
 */
class OrderProduct
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Order::class, inversedBy="orderProducts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $appOrder;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="orderProducts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $product;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantity;

    /**
     * @ORM\Column(type="decimal", precision=15, scale=2)
     */
    private $pricePerOne;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Order|null
     */
    public function getAppOrder(): ?Order
    {
        return $this->appOrder;
    }

    /**
     * @param Order|null $appOrder
     * @return $this
     */
    public function setAppOrder(?Order $appOrder): self
    {
        $this->appOrder = $appOrder;
        return $this;
    }

    /**
     * @return Product|null
     */
    public function getProduct(): ?Product
    {
        return $this->product;
    }

    /**
     * @param Product|null $product
     * @return $this
     */
    public function setProduct(?Product $product): self
    {
        $this->product = $product;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     * @return $this
     */
    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPricePerOne(): ?string
    {
        return $this->pricePerOne;
    }

    /**
     * @param string $pricePerOne
     * @return $this
     */
    public function setPricePerOne(string $pricePerOne): self
    {
        $this->pricePerOne = $pricePerOne;
        return $this;
    }
}
