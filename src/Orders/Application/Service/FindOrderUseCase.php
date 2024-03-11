<?php
declare(strict_types=1);

namespace App\Orders\Application\Service;

use App\Orders\Application\Contract\Actions\Order\FindOrderInterface;
use App\Orders\Application\DTO\Input\FindOrderRequest;
use App\Orders\Application\DTO\Output\FindOrderResponse;

/**
 * FindOrderUseCase
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  App\Orders\Application\Service
 */
class FindOrderUseCase implements FindOrderInterface
{

    /**
     * @inheritDoc
    */
    public function findOrder(FindOrderRequest $request): FindOrderResponse
    {
         return new FindOrderResponse();
    }
}