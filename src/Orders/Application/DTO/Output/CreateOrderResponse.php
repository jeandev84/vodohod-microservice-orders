<?php
declare(strict_types=1);

namespace App\Orders\Application\DTO\Output;

use Symfony\Component\HttpFoundation\Response;

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
      * @param int|null $statusCode
     */
     public function __construct(
         public ?int $orderId = null,
         public ?string $error = null,
         public ?int $statusCode = null
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
         $response->orderId    = $id;
         $response->statusCode = Response::HTTP_CREATED;
         return $response;
     }



     /**
      * @param string $error
      * @param int|null $statusCode
      * @return static
     */
     public static function createWithError(string $error, ?int $statusCode = null): static
     {
         $response = new self();
         $response->error = $error;
         $response->statusCode = $statusCode ?: Response::HTTP_INTERNAL_SERVER_ERROR;
         return $response;
     }
}