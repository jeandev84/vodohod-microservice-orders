<?php
declare(strict_types=1);

namespace App\Orders\Domain\Entity\Traits;

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
    private ?DateTimeInterface $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?DateTimeInterface $updatedAt = null;



    /**
     * @return DateTimeInterface|null
    */
    public function getCreatedAt(): ?DateTimeInterface
    {
        return $this->createdAt;
    }




    /**
     * @param DateTimeInterface|null $createdAt
     * @return $this
    */
    public function setCreatedAt(?DateTimeInterface $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }





    /**
     * @return DateTimeInterface|null
    */
    public function getUpdatedAt(): ?DateTimeInterface
    {
        return $this->updatedAt;
    }





    /**
     * @param DateTimeInterface|null $updatedAt
     * @return $this
    */
    public function setUpdatedAt(?DateTimeInterface $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}