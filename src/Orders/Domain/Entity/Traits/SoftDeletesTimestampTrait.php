<?php
declare(strict_types=1);

namespace App\Orders\Domain\Entity\Traits;


use DateTimeImmutable;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;



/**
 * SoftDeletesTimestampTrait
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  App\Orders\Domain\Entity\Traits
 */
trait SoftDeletesTimestampTrait
{

    #[ORM\Column(nullable: true)]
    private ?DateTimeImmutable $deletedAt = null;


    /**
     * @return DateTimeImmutable|null
    */
    public function getDeletedAt(): ?DateTimeImmutable
    {
         return $this->deletedAt;
    }





    /**
     * @param DateTimeImmutable|null $deletedAt
     * @return $this
     */
    public function setDeletedAt(?DateTimeImmutable $deletedAt): static
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }




    /**
     * @return $this
     */
    public function addSoftDeletesTimestamps(): static
    {
        return $this->setDeletedAt(new DateTimeImmutable());
    }
}