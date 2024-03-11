<?php
namespace App\Orders\Domain\Entity;

use App\Orders\Domain\Entity\Contract\HasTimestampInterface;
use App\Orders\Domain\Entity\Contract\SoftDeletesTimestampInterface;
use App\Orders\Domain\Entity\Traits\HasTimestampsTrait;
use App\Orders\Domain\Entity\Traits\SoftDeletesTimestampTrait;
use App\Orders\Infrastructure\Repository\OrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\Table(name: '`order`')]
class Order implements HasTimestampInterface, SoftDeletesTimestampInterface
{

    use HasTimestampsTrait;
    use SoftDeletesTimestampTrait;


    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\OneToMany(
        targetEntity: OrderItem::class,
        mappedBy: 'ordered',
        cascade: ['persist', 'remove']
    )]
    private Collection $orderItems;


    public function __construct()
    {
        $this->orderItems = new ArrayCollection();
    }




    /**
     * @return int|null
    */
    public function getId(): ?int
    {
        return $this->id;
    }



    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Collection<int, OrderItem>
     */
    public function getOrderItems(): Collection
    {
        return $this->orderItems;
    }

    public function addOrderItem(OrderItem $orderItem): static
    {
        if (!$this->orderItems->contains($orderItem)) {
            $this->orderItems->add($orderItem);
            $orderItem->setOrdered($this);
        }

        return $this;
    }

    public function removeOrderItem(OrderItem $orderItem): static
    {
        if ($this->orderItems->removeElement($orderItem)) {
            // set the owning side to null (unless already changed)
            if ($orderItem->getOrdered() === $this) {
                $orderItem->setOrdered(null);
            }
        }

        return $this;
    }
}
