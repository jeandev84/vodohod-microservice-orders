<?php
declare(strict_types=1);

namespace App\Orders\Domain\Repository\Contract;
#use App\Orders\Domain\Entity\Order;
use App\Orders\Domain\Entity\Order;


/**
 * OrderRepositoryInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  App\Orders\Domain\Contract
 */
interface OrderRepositoryInterface
{

      /**
       * Find order by given id
       *
       * @param int $id
       * @return Order|null
      */
      public function findOrderById(int $id): ?Order;
}