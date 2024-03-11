<?php
declare(strict_types=1);

namespace App\Orders\Application\DTO\Output\Validator;


use App\Orders\Application\Contract\Validator\ValidatorResponseInterface;
use Symfony\Component\Validator\ConstraintViolationInterface;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * ValidatorResponse
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  App\Orders\Application\DTO\Output\Validator
 */
class ValidatorResponse implements ValidatorResponseInterface
{

    /**
     * @param ConstraintViolationListInterface $constraints
    */
    public function __construct(
        protected ConstraintViolationListInterface $constraints
    )
    {
    }



    /**
     * @inheritDoc
    */
    public function isValid(): bool
    {
        return ($this->constraints->count() === 0);
    }




    /**
     * @inheritDoc
     */
    public function getErrors(): array
    {
        $errors = [];

        foreach ($this->constraints as $constraint) {
            $errors[] = $constraint->getMessage();
        }

        return $errors;

        /*
        //TODO code reviews
        return array_map(function (ConstraintViolationInterface $constraint) {
            return $constraint->getMessage();
        }, $this->constraints);
        */
    }
}