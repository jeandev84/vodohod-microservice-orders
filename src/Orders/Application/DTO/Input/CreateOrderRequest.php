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

    #[Assert\NotBlank(message: "Email Address required.")]
    #[Assert\Email(message: "Invalid Email Address")]
    public string $email;


    #[Assert\NotBlank(message: "Cart item required.")]
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
        $this->cart  = $this->convertCartItems($cart);
    }




    /**
     * @return CreateOrderItemRequest[]
    */
    public function getCreateOrderItems(): array
    {
        return $this->cart;
    }





    /**
     * @param array $data
     * @return static
    */
    public static function createFromArray(array $data): static
    {
        $parsedBody = new ParameterBag($data);

        return new self(
            $parsedBody->get('email'),
            $parsedBody->get('cart', [])
        );
    }




    /**
     * @param array $cart
     * @return array
    */
    private function convertCartItems(array $cart): array
    {
        return array_map(function ($item) {
            $parameterBag = new ParameterBag($item);
            return new CreateOrderItemRequest(
                $parameterBag->get('isbn'),
                $parameterBag->getInt('count')
            );
        }, $cart);
    }
}