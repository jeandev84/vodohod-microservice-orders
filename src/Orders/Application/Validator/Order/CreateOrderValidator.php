<?php
declare(strict_types=1);

namespace App\Orders\Application\Validator\Order;

use App\Orders\Application\Contract\Validator\Order\CreateOrderItemValidatorInterface;
use App\Orders\Application\Contract\Validator\Order\CreateOrderValidatorInterface;
use App\Orders\Application\Contract\Validator\ValidatorResponseInterface;
use App\Orders\Application\DTO\Input\CreateOrderRequest;
use App\Orders\Application\DTO\Output\Validator\ValidatorResponse;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\Validation;

/**
 * CreateOrderCustomValidator
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  App\Orders\Application\Validator\Order
*/
class CreateOrderValidator implements CreateOrderValidatorInterface
{


    /**
     * @param ValidatorInterface $validator
    */
    public function __construct(protected ValidatorInterface $validator)
    {
    }



    /**
     * @inheritDoc
    */
    public function validateCreateOrderRequest(CreateOrderRequest $request): ValidatorResponseInterface
    {
         return new ValidatorResponse($this->validator->validate($request));
    }
}