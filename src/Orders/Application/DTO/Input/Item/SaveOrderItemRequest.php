<?php
declare(strict_types=1);

namespace App\Orders\Application\DTO\Input\Item;

use Symfony\Component\Validator\Constraints as Assert;

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

    #[Assert\NotBlank(message: "ISBN is required.")]
    public ?string $isbn = null;

    #[Assert\NotBlank(message: "Order item count is required.")]
    public ?int $count = null;


    /**
     * @param string|null $isbn
     * @param int|null $count
    */
    public function __construct(
        ?string $isbn = null,
        ?int $count   = null
    )
    {
        $this->isbn  = $isbn;
        $this->count = $count;
    }
}