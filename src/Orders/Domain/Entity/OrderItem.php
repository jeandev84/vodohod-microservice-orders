<?php
namespace App\Orders\Domain\Entity;

use App\Orders\Domain\Entity\Contract\HasTimestampInterface;
use App\Orders\Domain\Entity\Contract\SoftDeletesTimestampInterface;
use App\Orders\Domain\Entity\Traits\HasTimestampsTrait;
use App\Orders\Domain\Entity\Traits\SoftDeletesTimestampTrait;
use App\Orders\Infrastructure\Repository\OrderItemRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderItemRepository::class)]
class OrderItem implements HasTimestampInterface, SoftDeletesTimestampInterface
{
    use HasTimestampsTrait;
    use SoftDeletesTimestampTrait;


    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?string $isbn = null;

    #[ORM\Column]
    private ?int $count = null;


    #[ORM\ManyToOne(inversedBy: 'orderItems')]
    private ?Order $ordered = null;


    public function getId(): ?int
    {
        return $this->id;
    }



    /**
     * @return string|null
    */
    public function getIsbn(): ?string
    {
        return $this->isbn;
    }




    /**
     * @param string|null $isbn
     * @return $this
    */
    public function setIsbn(?string $isbn): static
    {
        $this->isbn = $isbn;

        return $this;
    }




    public function getCount(): ?int
    {
        return $this->count;
    }

    public function setCount(int $count): static
    {
        $this->count = $count;

        return $this;
    }


    public function getOrdered(): ?Order
    {
        return $this->ordered;
    }

    public function setOrdered(?Order $ordered): static
    {
        $this->ordered = $ordered;

        return $this;
    }
}
