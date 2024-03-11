<?php
declare(strict_types=1);

namespace App\Orders\Application\Contract\Actions\Order;


use App\Orders\Application\DTO\Input\CreateOrderRequest;
use App\Orders\Application\DTO\Output\CreateOrderResponse;

/**
 * CreateOrderInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  App\Orders\Application\Contract\Order
 */
interface CreateOrderInterface
{

        /**
         * Метод должен уметь принимать запрос заказа, создавать заказа и отправить ответа
         *
         * @param CreateOrderRequest $request
         * @return CreateOrderResponse
        */
        public function createAndSendOrder(CreateOrderRequest $request): CreateOrderResponse;
}