<?php
declare(strict_types=1);

namespace App\Orders\Application\DTO\Output\Item;

/**
 * CreateOrderItemResponse
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  App\Orders\Application\DTO\Output\Item
 */
class CreateOrderItemResponse
{

    /**
     * @param int|null $orderItemId
     * @param string|null $error
     */
    public function __construct(
        public ?int $orderItemId = null,
        public ?string $error = null
    )
    {
    }
}