<?php
declare(strict_types=1);

namespace App\Orders\Infrastructure\Manager;


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
      * @return Order
     */
     public function createUserFromDto(): Order;
}