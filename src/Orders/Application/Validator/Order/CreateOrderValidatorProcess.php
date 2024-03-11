<?php
declare(strict_types=1);

namespace App\Orders\Application\Validator\Order;

use App\Orders\Application\Contract\Encoder\Exception\JsonErrorExceptionInterface;
use App\Orders\Application\Contract\Encoder\JsonEncoderInterface;
use App\Orders\Application\Contract\Validator\CreateOrderException;
use App\Orders\Application\Contract\Validator\Order\CreateOrderItemValidatorInterface;
use App\Orders\Application\Contract\Validator\Order\CreateOrderValidatorInterface;
use App\Orders\Application\DTO\Input\CreateOrderRequest;
use App\Orders\Domain\Manager\Order\OrderManagerInterface;

/**
 * CreateOrderValidatorProcess
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  App\Orders\Application\Validator\Order
*/
class CreateOrderValidatorProcess
{

        /**
         * @param CreateOrderValidatorInterface $createOrderValidator
         * @param CreateOrderItemValidatorInterface $createOrderItemValidator
         * @param JsonEncoderInterface $jsonEncoder
        */
        public function __construct(
            protected CreateOrderValidatorInterface $createOrderValidator,
            protected CreateOrderItemValidatorInterface $createOrderItemValidator,
            protected JsonEncoderInterface $jsonEncoder
        )
        {
        }





        /**
         * @param CreateOrderRequest $request
         * @return CreateOrderRequest
         * @throws CreateOrderException
         * @throws JsonErrorExceptionInterface
       */
       public function validationProcess(CreateOrderRequest $request): CreateOrderRequest
       {
           # Process validation order and items
           $createOrderRequestValidator  = $this->createOrderValidator->validateCreateOrderRequest($request);

           if (!$createOrderRequestValidator->isValid()) {
               throw new CreateOrderException(
                   $this->jsonEncoder->encode($createOrderRequestValidator->getErrors())
               );
           }

           foreach ($request->getCreateOrderItems() as $createOrderItem) {
               $createOrderItemRequestValidator = $this->createOrderItemValidator->validateCreateOrderItemRequest(
                   $createOrderItem
               );
               if (!$createOrderItemRequestValidator->isValid()) {
                   throw new CreateOrderException(
                       $this->jsonEncoder->encode($createOrderItemRequestValidator->getErrors())
                   );
               }
           }

           return $request;
       }
}