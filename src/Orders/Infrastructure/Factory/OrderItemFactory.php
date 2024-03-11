<?php
declare(strict_types=1);

namespace App\Orders\Infrastructure\Factory;

use App\Orders\Application\DTO\Input\Item\CreateOrderItemRequest;
use App\Orders\Domain\Entity\OrderItem;
use App\Orders\Domain\Factory\OrderItemFactoryInterface;

/**
 * OrderItemFactory
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  App\Orders\Infrastructure\Factory
*/
class OrderItemFactory implements OrderItemFactoryInterface
{

    /**
     * @inheritDoc
    */
    public function createOrderItemFromDto(CreateOrderItemRequest $request): OrderItem
    {
         $orderItem = new OrderItem();
         $orderItem->setIsbn($request->isbn)
                   ->setCount($request->count);
         return $orderItem;
    }
}