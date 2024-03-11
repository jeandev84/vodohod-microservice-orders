<?php
declare(strict_types=1);

namespace App\Orders\Application\DTO\Input;

use App\Orders\Application\DTO\Input\Item\CreateOrderItemRequest;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\Validator\Constraints as Assert;


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

    #[Assert\NotBlank]
    public string $email;


    /**
     * @var array
    */
    public array $cart = [];



    /**
     * @param string|null $email е-майл пользователя
     * @param array|null $cart список заказаны товаров например книги :)
     * тут через аннотации происходить валидацию
     */
    public function __construct(
        ?string $email = null,
        ?array  $cart = [] // cart items
    )
    {
        $this->email = $email;
        $this->cart  = $cart;
    }




    /**
     * @return CreateOrderItemRequest[]
    */
    public function getCreateOrderItems(): array
    {
        $items = [];

        foreach ($this->cart as $cart) {
           $parameterBag = new ParameterBag($cart);
           $items[] = new CreateOrderItemRequest(
               $parameterBag->get('isbn'),
               $parameterBag->getInt('count')
           );
        }

        return $items;
    }
}