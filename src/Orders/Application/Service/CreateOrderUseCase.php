<?php
declare(strict_types=1);

namespace App\Orders\Application\Service;

use App\Orders\Application\Contract\Actions\Order\CreateOrderInterface;
use App\Orders\Application\Contract\Encoder\JsonEncoderInterface;
use App\Orders\Application\Contract\Validator\CreateOrderException;
use App\Orders\Application\Contract\Validator\Order\CreateOrderItemValidatorInterface;
use App\Orders\Application\Contract\Validator\Order\CreateOrderValidatorInterface;
use App\Orders\Application\Contract\Validator\Order\Process\CreateOrderValidatorProcessInterface;
use App\Orders\Application\DTO\Input\CreateOrderRequest;
use App\Orders\Application\DTO\Output\CreateOrderResponse;
use App\Orders\Application\Validator\Order\CreateOrderValidatorProcess;
use App\Orders\Domain\Manager\Order\OrderManagerInterface;
use Throwable;

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
     * @param OrderManagerInterface $orderManager
     * @param CreateOrderValidatorProcessInterface $createOrderValidatorProcess
     * @param JsonEncoderInterface $jsonEncoder
    */
    public function __construct(
        protected OrderManagerInterface $orderManager,
        protected CreateOrderValidatorProcessInterface $createOrderValidatorProcess,
        protected JsonEncoderInterface $jsonEncoder
    )
    {
    }



    /**
     * @inheritDoc
    */
    public function createAndSendOrder(CreateOrderRequest $request): CreateOrderResponse
    {
        try {

            # Process validation order and items
            $request = $this->createOrderValidatorProcess->validationProcess($request);

            # Create order
            $order   = $this->orderManager->createOrderFromDto($request);

            return CreateOrderResponse::createWithId($order->getId());

        } catch (Throwable $e) {
            return CreateOrderResponse::createWithError($e->getMessage());
        }
    }
}