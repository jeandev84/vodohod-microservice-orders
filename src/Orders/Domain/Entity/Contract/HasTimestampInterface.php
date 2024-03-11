<?php
declare(strict_types=1);

namespace App\Orders\Domain\Entity\Contract;


use DateTimeImmutable;
use DateTimeInterface;

/**
 * HasTimestampInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  App\Orders\Domain\Entity\Contract
 */
interface HasTimestampInterface
{


    /**
     * @return DateTimeImmutable|null
    */
    public function getCreatedAt(): ?DateTimeImmutable;




    /**
     * @param DateTimeImmutable|null $createdAt
     * @return $this
    */
    public function setCreatedAt(?DateTimeImmutable $createdAt): static;





    /**
     * @return DateTimeImmutable|null
    */
    public function getUpdatedAt(): ?DateTimeImmutable;






    /**
     * @param DateTimeImmutable|null $updatedAt
     * @return $this
    */
    public function setUpdatedAt(?DateTimeImmutable $updatedAt): static;



    /**
     * @return $this
    */
    public function addTimestamps(): static;
}