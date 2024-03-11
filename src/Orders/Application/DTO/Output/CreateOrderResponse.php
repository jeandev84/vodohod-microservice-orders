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
         public ?int $orderId = null,
         public ?string $error = null
     )
     {
     }


     /**
      * @param int $id
      * @return static
     */
     public static function createWithId(int $id): static
     {
         $response = new self();
         $response->orderId = $id;
         return $response;
     }





     /**
      * @param string $error
      * @return static
     */
     public static function createWithError(string $error): static
     {
         $response = new self();
         $response->error = $error;
         return $response;
     }
}