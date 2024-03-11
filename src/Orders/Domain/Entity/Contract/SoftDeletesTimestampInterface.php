<?php
declare(strict_types=1);

namespace App\Orders\Domain\Entity\Contract;


use DateTimeImmutable;
use DateTimeInterface;

/**
 * SoftDeletesTimestampInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  App\Orders\Domain\Entity\Contract
 */
interface SoftDeletesTimestampInterface
{


    /**
     * @return DateTimeImmutable|null
    */
    public function getDeletedAt(): ?DateTimeImmutable;





    /**
     * @param DateTimeImmutable|null $deletedAt
     * @return $this
    */
    public function setDeletedAt(?DateTimeImmutable $deletedAt): static;




    /**
     * @return $this
    */
    public function addSoftDeletesTimestamps(): static;
}