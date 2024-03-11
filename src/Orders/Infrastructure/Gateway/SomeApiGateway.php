<?php
declare(strict_types=1);

namespace App\Orders\Infrastructure\Gateway;

use App\Orders\Application\DTO\Input\Gateway\SendOrderGatewayRequest;
use App\Orders\Application\DTO\Output\Gateway\SendOrderGatewayResponse;
use SomeApiGatewayInterface;

/**
 * SomeApiGateway
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  App\Orders\Infrastructure\Gateway
*/
class SomeApiGateway implements SomeApiGatewayInterface
{

    /**
     * @inheritDoc
    */
    public function sendOrder(SendOrderGatewayRequest $request): SendOrderGatewayResponse
    {
         //TODO send some data just example
         return new SendOrderGatewayResponse(1);
    }
}