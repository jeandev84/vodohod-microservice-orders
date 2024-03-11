<?php
declare(strict_types=1);

namespace App\Orders\Application\Service;

use App\Orders\Application\Contract\Order\CreateOrderInterface;
use App\Orders\Application\DTO\Input\CreateOrderRequest;
use App\Orders\Application\DTO\Output\CreateOrderResponse;

/**
 * CreateOrderUseCase
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  App\Orders\Application\Service
*/
class CreateOrderUseCase implements CreateOrderInterface
{

    /**
     * @inheritDoc
    */
    public function createAndSendOrder(CreateOrderRequest $request): CreateOrderResponse
    {
          return new CreateOrderResponse();
    }
}