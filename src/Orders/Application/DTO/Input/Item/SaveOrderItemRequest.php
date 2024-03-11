<?php
declare(strict_types=1);

namespace App\Orders\Application\DTO\Input\Item;

/**
 * SaveOrderItemRequest
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  App\Orders\Application\DTO\Input\Item
*/
class SaveOrderItemRequest
{
    /**
     * @param string|null $isbn
     * @param int|null $count
    */
    public function __construct(
        public ?string $isbn = null,
        public ?int $count   = null
    )
    {
    }
}