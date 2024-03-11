<?php
declare(strict_types=1);

namespace App\Orders\Application\DTO\Output\Validator;


use App\Orders\Application\Contract\Validator\ValidatorResponseInterface;
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
     * @param array $errors
    */
    public function __construct(
        protected array $errors = []
    )
    {
    }



    /**
     * @inheritDoc
    */
    public function isValid(): bool
    {
        return !empty($this->errors);
    }




    /**
     * @inheritDoc
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
}