<?php
namespace App\Orders\Infrastructure\Repository;

use App\Orders\Domain\Entity\OrderItem;
use App\Orders\Domain\Repository\Contract\OrderItemRepositoryInterface;
use App\Orders\Infrastructure\Repository\Exceptions\OrderItemNotFoundException;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<OrderItem>
 *
 * @method OrderItem|null find($id, $lockMode = null, $lockVersion = null)
 * @method OrderItem|null findOneBy(array $criteria, array $orderBy = null)
 * @method OrderItem[]    findAll()
 * @method OrderItem[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrderItemRepository extends ServiceEntityRepository implements OrderItemRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OrderItem::class);
    }


    /**
     * @inheritDoc
    */
    public function findOrderItemById(int $id): OrderItem
    {
        $orderItem =  $this->find($id);

        if (!$orderItem) {
            throw new OrderItemNotFoundException($id);
        }

        return $orderItem;
    }
}
