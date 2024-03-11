<?php
declare(strict_types=1);

namespace App\Orders\Application\Contract\Validator\Order;


use App\Orders\Application\Contract\Validator\ValidatorResponseInterface;
use App\Orders\Application\DTO\Input\CreateOrderRequest;


/**
 * CreateOrderValidatorInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  App\Orders\Application\Contract\Validator\Order
*/
interface CreateOrderValidatorInterface
{

       /**
        * @param CreateOrderRequest $request
        * @return ValidatorResponseInterface
       */
       public function validateCreateRequest(CreateOrderRequest $request): ValidatorResponseInterface;
}