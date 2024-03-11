<?php
declare(strict_types=1);

namespace App\Orders\Application\Contract\Encoder;


use App\Orders\Application\Contract\Encoder\Exception\JsonErrorExceptionInterface;

/**
 * JsonEncoderInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  App\Orders\Application\Contract\Encoder
 */
interface JsonEncoderInterface
{

       /**
        * @param array $data
        * @return string
        * @throws JsonErrorExceptionInterface
       */
       public function encode(array $data): string;





       /**
        * @param string $json
        * @return array
        * @throws JsonErrorExceptionInterface
       */
       public function decode(string $json): array;
}