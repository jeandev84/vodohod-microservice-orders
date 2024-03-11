<?php
declare(strict_types=1);

namespace App\Orders\Application\Contract\Actions\Order;


use App\Orders\Application\DTO\Input\FindOrderRequest;
use App\Orders\Application\DTO\Output\FindOrderResponse;

/**
 * FindOrderInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  App\Orders\Application\Contract\Order
 */
interface FindOrderInterface
{

      /**
       * @param FindOrderRequest $request
       * @return FindOrderResponse
      */
      public function findOrder(FindOrderRequest $request): FindOrderResponse;
}