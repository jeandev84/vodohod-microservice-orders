<?php
declare(strict_types=1);

namespace App\Orders\Domain\Factory;


use App\Orders\Application\DTO\Input\Item\CreateOrderItemRequest;
use App\Orders\Domain\Entity\OrderItem;

/**
 * OrderItemFactoryInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  App\Orders\Domain\Factory
 */
interface OrderItemFactoryInterface
{

     /**
      * @param CreateOrderItemRequest $request
      * @return OrderItem
     */
     public function createOrderItemFromDto(CreateOrderItemRequest $request): OrderItem;
}