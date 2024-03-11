<?php
declare(strict_types=1);

namespace App\Orders\Infrastructure\Repository\Exceptions;

/**
 * OrderNotFoundException
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  App\Orders\Infrastructure\Repository\Exceptions
 */
class OrderNotFoundException extends \Exception
{
     /**
      * @param int $orderId
     */
     public function __construct(int $orderId)
     {
         parent::__construct("Order ($orderId) not found.", 404);
     }
}