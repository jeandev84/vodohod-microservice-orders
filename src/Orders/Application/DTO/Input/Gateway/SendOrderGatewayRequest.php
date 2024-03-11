<?php
declare(strict_types=1);

namespace App\Orders\Application\DTO\Input\Gateway;

/**
 * SendOrderGatewayRequest
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  App\Orders\Application\DTO\Input
 */
class SendOrderGatewayRequest
{

     /**
      * @param string $email
      * @param array $cart
     */
     public function __construct(
         private string $email,
         private array $cart = []
     )
     {
     }


     /**
      * @return string
     */
     public function getEmail(): string
     {
        return $this->email;
     }




    /**
     * @return array
    */
    public function getCart(): array
    {
        return $this->cart;
    }
}