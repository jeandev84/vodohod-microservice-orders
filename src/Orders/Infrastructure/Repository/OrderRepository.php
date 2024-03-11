<?php
namespace App\Orders\Infrastructure\Repository;

use App\Orders\Domain\Contract\OrderRepositoryInterface;
use App\Orders\Domain\Entity\Order;
use App\Orders\Infrastructure\Repository\Exceptions\OrderNotFoundException;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Order>
 *
 * @method Order|null find($id, $lockMode = null, $lockVersion = null)
 * @method Order|null findOneBy(array $criteria, array $orderBy = null)
 * @method Order[]    findAll()
 * @method Order[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrderRepository extends ServiceEntityRepository implements OrderRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Order::class);
    }



    /**
     * @inheritDoc
    */
    public function findOrderById(int $id): ?Order
    {
        $order = $this->find($id);

        if (!$order) {
            throw new OrderNotFoundException($id);
        }

        return $order;
    }
}
