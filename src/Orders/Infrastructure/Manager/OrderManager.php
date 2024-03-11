<?php
declare(strict_types=1);

namespace App\Orders\Infrastructure\Manager;

use App\Orders\Application\DTO\Input\CreateOrderRequest;
use App\Orders\Domain\Entity\Order;
use App\Orders\Domain\Factory\OrderFactoryInterface;
use App\Orders\Domain\Manager\Order\OrderManagerInterface;
use Doctrine\ORM\EntityManagerInterface;

/**
 * OrderManager
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  App\Orders\Application\Manager
*/
class OrderManager implements OrderManagerInterface
{

     /**
      * @param EntityManagerInterface $em
      * @param OrderFactoryInterface $orderFactory
     */
     public function __construct(
         protected EntityManagerInterface $em,
         protected OrderFactoryInterface $orderFactory
     )
     {
     }



     /**
      * @inheritDoc
     */
     public function createOrderFromDto(CreateOrderRequest $request): Order
     {
          return $this->saveOrderFromEntity(
              $this->orderFactory->createOrderFromDto($request)
          );
     }





     /**
      * @inheritDoc
     */
     public function saveOrderFromEntity(Order $order): Order
     {
        $this->em->persist($order);
        $this->em->flush();
        return $order;
     }
}