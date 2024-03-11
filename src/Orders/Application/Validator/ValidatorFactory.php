<?php
declare(strict_types=1);

namespace App\Orders\Application\Validator;

use App\Orders\Application\Contract\Validator\ValidatorFactoryInterface;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * ValidatorFactory
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  App\Orders\Application\Validator
 */
class ValidatorFactory implements ValidatorFactoryInterface
{

    /**
     * @inheritDoc
     */
    public function createValidator(): ValidatorInterface
    {
        return Validation::createValidator();
    }
}