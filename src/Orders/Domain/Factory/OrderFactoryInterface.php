<?php
declare(strict_types=1);

namespace App\Orders\Domain\Factory;


use App\Orders\Application\DTO\Input\CreateOrderRequest;
use App\Orders\Domain\Entity\Order;

/**
 * OrderFactoryInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  App\Orders\Domain\Factory
*/
interface OrderFactoryInterface
{
      /**
       * @param CreateOrderRequest $request
       * @return Order
      */
      public function createOrderFromDto(CreateOrderRequest $request): Order;
}