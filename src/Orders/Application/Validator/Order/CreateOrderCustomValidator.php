<?php
declare(strict_types=1);

namespace App\Orders\Application\Validator\Order;

use App\Orders\Application\Contract\Validator\Order\CreateOrderValidatorInterface;
use App\Orders\Application\Contract\Validator\ValidatorResponseInterface;
use App\Orders\Application\DTO\Input\CreateOrderRequest;
use App\Orders\Application\DTO\Output\Validator\ValidatorResponse;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * CreateOrderCustomValidator
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  App\Orders\Application\Validator\Order
*/
class CreateOrderCustomValidator implements CreateOrderValidatorInterface
{


    /**
     * @param ValidatorInterface $validator
    */
    public function __construct(
        protected ValidatorInterface $validator
    )
    {
    }




    /**
     * @inheritDoc
    */
    public function validateCreateRequest(CreateOrderRequest $request): ValidatorResponseInterface
    {
         // TODO map errors if exists and send them

         return new ValidatorResponse([]);
    }
}