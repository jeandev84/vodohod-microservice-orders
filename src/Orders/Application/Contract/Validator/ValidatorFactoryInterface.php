<?php
declare(strict_types=1);

namespace App\Orders\Application\Contract\Validator;


use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * ValidatorFactoryInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  App\Orders\Application\Contract\Validator
*/
interface ValidatorFactoryInterface
{

      /**
       * @return ValidatorInterface
      */
      public function createValidator(): ValidatorInterface;
}