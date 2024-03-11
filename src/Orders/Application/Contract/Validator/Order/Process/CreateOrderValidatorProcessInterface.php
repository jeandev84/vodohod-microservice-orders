<?php
declare(strict_types=1);

namespace App\Orders\Application\Contract\Validator\Order\Process;


use App\Orders\Application\Contract\Encoder\Exception\JsonErrorExceptionInterface;
use App\Orders\Application\Contract\Validator\CreateOrderException;
use App\Orders\Application\DTO\Input\CreateOrderRequest;

/**
 * CreateOrderValidatorProcessInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  App\Orders\Application\Contract\Validator\Order\Process
 */
interface CreateOrderValidatorProcessInterface
{
    /**
     * @param CreateOrderRequest $request
     * @return CreateOrderRequest
     * @throws CreateOrderException
     * @throws JsonErrorExceptionInterface
    */
    public function validationProcess(CreateOrderRequest $request): CreateOrderRequest;
}