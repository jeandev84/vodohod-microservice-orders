<?php
declare(strict_types=1);

namespace App\Orders\Domain\Manager\Order;


use App\Orders\Application\DTO\Input\CreateOrderRequest;
use App\Orders\Domain\Entity\Order;

/**
 * OrderManagerInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  App\Orders\Infrastructure\Manager
*/
interface OrderManagerInterface
{

     /**
      * @param CreateOrderRequest $request
      * @return Order
     */
     public function createOrderFromDto(CreateOrderRequest $request): Order;





     /**
      * @param Order $order
      * @return Order
     */
     public function saveOrderFromEntity(Order $order): Order;
}