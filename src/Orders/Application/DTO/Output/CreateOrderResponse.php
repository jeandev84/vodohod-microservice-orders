<?php
declare(strict_types=1);

namespace App\Orders\Application\DTO\Output;

/**
 * CreateOrderRequest
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  App\Orders\Application\DTO\Output
 */
class CreateOrderResponse
{
     /**
      * @param int|null $orderId
      * @param string|null $error
     */
     public function __construct(
         protected ?int $orderId = null,
         protected ?string $error = null
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





    /**
     * @return string|null
    */
    public function getError(): ?string
    {
        return $this->error;
    }
}