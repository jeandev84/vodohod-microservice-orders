<?php
declare(strict_types=1);

namespace App\Orders\Domain\Entity\Traits;

use DateTimeImmutable;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * HasTimestampsTrait
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  App\Orders\Domain\Entity\Traits
 */
trait HasTimestampsTrait
{
    #[ORM\Column]
    private ?DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?DateTimeImmutable $updatedAt = null;



    /**
     * @return DateTimeImmutable|null
    */
    public function getCreatedAt(): ?DateTimeImmutable
    {
        return $this->createdAt;
    }




    /**
     * @param DateTimeImmutable|null $createdAt
     * @return $this
    */
    public function setCreatedAt(?DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }





    /**
     * @return DateTimeImmutable|null
    */
    public function getUpdatedAt(): ?DateTimeImmutable
    {
        return $this->updatedAt;
    }





    /**
     * @param DateTimeImmutable|null $updatedAt
     * @return $this
    */
    public function setUpdatedAt(?DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }




    /**
     * @return $this
    */
    public function addTimestamps(): static
    {
         return $this->setCreatedAt(new DateTimeImmutable())
                     ->setUpdatedAt(new DateTimeImmutable());
    }
}