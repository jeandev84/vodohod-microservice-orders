<?php
declare(strict_types=1);

namespace App\Orders\Domain\Entity\Traits;


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
    private ?\DateTimeImmutable $deletedAt = null;


    /**
     * @return DateTimeInterface|null
    */
    public function getDeletedAt(): ?DateTimeInterface
    {
         return $this->deletedAt;
    }





    /**
     * @param DateTimeInterface|null $deletedAt
     * @return $this
     */
    public function setDeletedAt(?DateTimeInterface $deletedAt): static
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }
}