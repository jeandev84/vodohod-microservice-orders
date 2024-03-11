<?php
declare(strict_types=1);

namespace App\Orders\Application\DTO\Output\Gateway;

/**
 * SendOrderGatewayResponse
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  App\Orders\Application\DTO\Output\Gateway
 */
class SendOrderGatewayResponse
{
      public function __construct(
          private ?int $orderId
      )
      {
      }


      /**
       * @return int|null
      */
      public function getOrderId(): ?int
      {
          return $this->orderId;
      }
}