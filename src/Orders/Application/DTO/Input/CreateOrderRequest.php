<?php
declare(strict_types=1);

namespace App\Orders\Application\DTO\Input;

/**
 * CreateOrderRequest
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  App\Orders\Application\DTO\Input
*/
class CreateOrderRequest
{

    /**
     * @param string $email е-майл пользователя
     * @param array $cart   список заказаны товаров например книги :)
     * тут через аннотации происходить валидацию
     */
    public function __construct(
        public string $email,
        public array  $cart = [] // cart items
    )
    {
    }
}