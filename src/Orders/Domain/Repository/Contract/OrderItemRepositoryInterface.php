<?php
declare(strict_types=1);

namespace App\Orders\Domain\Repository\Contract;


use App\Orders\Domain\Entity\OrderItem;

/**
 * OrderItemRepositoryInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  App\Orders\Domain\Contract
*/
interface OrderItemRepositoryInterface
{
       /**
        * @param int $id
        * @return OrderItem
       */
       public function findOrderItemById(int $id): OrderItem;
}