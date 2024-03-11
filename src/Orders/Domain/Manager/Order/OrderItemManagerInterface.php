<?php
declare(strict_types=1);

namespace App\Orders\Domain\Manager\Order;


use App\Orders\Application\DTO\Input\Item\CreateOrderItemRequest;
use App\Orders\Domain\Entity\Order;
use App\Orders\Domain\Entity\OrderItem;

/**
 * OrderItemManagerInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  App\Orders\Application\Contract\Manager\Order
 */
interface OrderItemManagerInterface
{
     /**
      * @param CreateOrderItemRequest $request
      * @return OrderItem
     */
     public function creatOrderItemFromDto(CreateOrderItemRequest $request): OrderItem;




     /**
      * @param OrderItem $order
      * @return OrderItem
     */
     public function saveOrderItemFromEntity(OrderItem $order): OrderItem;
}