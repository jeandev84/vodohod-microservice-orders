<?php
declare(strict_types=1);

use App\Orders\Application\DTO\Input\Gateway\SendOrderGatewayRequest;
use App\Orders\Application\DTO\Output\Gateway\SendOrderGatewayResponse;


/**
 * SomeApiGatewayInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package
*/
interface SomeApiGatewayInterface
{

     /**
      * @param SendOrderGatewayRequest $request
      * @return SendOrderGatewayResponse
     */
     public function sendOrder(SendOrderGatewayRequest $request): SendOrderGatewayResponse;
}