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
     * @return DateTimeInterface|null
    */
    public function getCreatedAt(): ?DateTimeInterface;




    /**
     * @param DateTimeImmutable|null $createdAt
     * @return $this
    */
    public function setCreatedAt(?DateTimeImmutable $createdAt): static;





    /**
     * @return DateTimeInterface|null
    */
    public function getUpdatedAt(): ?DateTimeInterface;






    /**
     * @param DateTimeInterface|null $updatedAt
     * @return $this
    */
    public function setUpdatedAt(?DateTimeInterface $updatedAt): static;
}