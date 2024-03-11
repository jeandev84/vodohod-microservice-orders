<?php
declare(strict_types=1);

namespace App\Orders\Application\DTO\Output;

/**
 * FindOrderResponse
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  App\Orders\Application\DTO\Output
*/
class FindOrderResponse
{

    /**
     * @param array $data
     * @param int|null $statusCode
    */
    public function __construct(
        public array $data = [],
        public ?int $statusCode = null
    )
    {
    }
}