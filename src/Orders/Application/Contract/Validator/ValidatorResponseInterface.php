<?php
declare(strict_types=1);

namespace App\Orders\Application\Contract\Validator;

/**
 * ValidatorResponseInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package
*/
interface ValidatorResponseInterface
{

      /**
       * @return bool
      */
      public function isValid(): bool;




      /**
       * @return array
      */
      public function getErrors(): array;
}