<?php
declare(strict_types=1);

namespace App\Orders\Application\Validator\Order;

use App\Orders\Application\Contract\Validator\Order\CreateOrderItemValidatorInterface;
use App\Orders\Application\Contract\Validator\ValidatorResponseInterface;
use App\Orders\Application\DTO\Input\Item\CreateOrderItemRequest;
use App\Orders\Application\DTO\Output\Validator\ValidatorResponse;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * CreateOrderItemCustomValidator
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  App\Orders\Application\Validator\Order
 */
class CreateOrderItemValidator implements CreateOrderItemValidatorInterface
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
    public function validateCreateOrderItemRequest(CreateOrderItemRequest $request): ValidatorResponseInterface
    {
        return new ValidatorResponse($this->validator->validate($request));
    }
}