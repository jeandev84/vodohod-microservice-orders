<?php
declare(strict_types=1);

namespace App\Orders\Infrastructure\Encoder;


use App\Orders\Application\Contract\Encoder\JsonEncoderInterface;

/**
 * JsonEncoder
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  App\Orders\Infrastructure\Encoder
*/
class JsonEncoder implements JsonEncoderInterface
{

    /**
     * @inheritDoc
    */
    public function encode(array $data): string
    {
        return json_encode($data);
    }



    /**
     * @inheritDoc
    */
    public function decode(string $json): array
    {
        return json_decode($json, true);
    }
}