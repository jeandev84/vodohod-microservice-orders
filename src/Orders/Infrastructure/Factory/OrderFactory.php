<?php
declare(strict_types=1);

namespace App\Orders\Infrastructure\Factory;

use App\Orders\Application\DTO\Input\CreateOrderRequest;
use App\Orders\Domain\Entity\Order;
use App\Orders\Domain\Factory\OrderFactoryInterface;
use App\Orders\Domain\Factory\OrderItemFactoryInterface;
use DateTime;
use DateTimeImmutable;

/**
 * OrderFactory
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  App\Orders\Infrastructure\Factory
*/
class OrderFactory implements OrderFactoryInterface
{

    /**
     * @param OrderItemFactoryInterface $orderItemFactory
    */
    public function __construct(
       protected OrderItemFactoryInterface $orderItemFactory
    )
    {
    }



    /**
     * @inheritDoc
    */
    public function createOrderFromDto(CreateOrderRequest $request): Order
    {
         $order = new Order();
         $order->setEmail($request->email);
         foreach ($request->getCreateOrderItems() as $orderItem) {
             $order->addOrderItem($this->orderItemFactory->createOrderItemFromDto($orderItem));
         }
         return $order->addTimestamps();
    }
}