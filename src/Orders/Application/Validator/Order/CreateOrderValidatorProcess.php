<?php
declare(strict_types=1);

namespace App\Orders\Application\Validator\Order;


use App\Orders\Application\Contract\Encoder\JsonEncoderInterface;
use App\Orders\Application\Contract\Exceptions\Order\CreateOrderException;
use App\Orders\Application\Contract\Validator\Order\CreateOrderItemValidatorInterface;
use App\Orders\Application\Contract\Validator\Order\CreateOrderValidatorInterface;
use App\Orders\Application\Contract\Validator\Order\Process\CreateOrderValidatorProcessInterface;
use App\Orders\Application\DTO\Input\CreateOrderRequest;
use Symfony\Component\HttpFoundation\Response;

/**
 * CreateOrderValidatorProcess
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  App\Orders\Application\Validator\Order
*/
class CreateOrderValidatorProcess implements CreateOrderValidatorProcessInterface
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
         * @@inheritDoc
       */
       public function validationProcess(CreateOrderRequest $request): CreateOrderRequest
       {
           # Process validation order and items
           $createOrderRequestValidator  = $this->createOrderValidator->validateCreateOrderRequest($request);

           if (!$createOrderRequestValidator->isValid()) {
               throw new CreateOrderException(
                   $this->jsonEncoder->encode($createOrderRequestValidator->getErrors()),
             Response::HTTP_BAD_REQUEST
               );
           }

           foreach ($request->getCreateOrderItems() as $createOrderItem) {
               $createOrderItemRequestValidator = $this->createOrderItemValidator->validateCreateOrderItemRequest(
                   $createOrderItem
               );
               if (!$createOrderItemRequestValidator->isValid()) {
                   throw new CreateOrderException(
                       $this->jsonEncoder->encode($createOrderItemRequestValidator->getErrors()),
                 Response::HTTP_BAD_REQUEST
                   );
               }
           }

           return $request;
       }
}