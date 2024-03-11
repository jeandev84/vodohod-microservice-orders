<?php
declare(strict_types=1);

namespace App\Orders\Infrastructure\Manager;

use App\Orders\Application\DTO\Input\Item\CreateOrderItemRequest;
use App\Orders\Domain\Entity\Order;
use App\Orders\Domain\Entity\OrderItem;
use App\Orders\Domain\Factory\OrderItemFactoryInterface;
use App\Orders\Domain\Manager\Order\OrderItemManagerInterface;
use Doctrine\ORM\EntityManagerInterface;

/**
 * OrderItemManager
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  App\Orders\Infrastructure\Manager
*/
class OrderItemManager implements OrderItemManagerInterface
{


    /**
     * @param EntityManagerInterface $em
     * @param OrderItemFactoryInterface $orderItemFactory
    */
    public function __construct(
        protected EntityManagerInterface $em,
        protected OrderItemFactoryInterface $orderItemFactory
    )
    {
    }




    /**
     * @inheritDoc
    */
    public function creatOrderItemFromDto(CreateOrderItemRequest $request): OrderItem
    {
         return $this->saveOrderItemFromEntity(
             $this->orderItemFactory->createOrderItemFromDto($request)
         );
    }





    /**
     * @inheritDoc
    */
    public function saveOrderItemFromEntity(OrderItem $order): OrderItem
    {
         $this->em->persist($order);
         $this->em->flush();
         return $order;
    }
}