<?php
declare(strict_types=1);

namespace App\Orders\Infrastructure\Http\Controller;

use App\Orders\Application\Contract\Actions\Order\CreateOrderInterface;
use App\Orders\Application\Contract\Actions\Order\FindOrderInterface;
use App\Orders\Application\DTO\Input\CreateOrderRequest;
use App\Orders\Application\DTO\Input\FindOrderRequest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * OrderController
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  App\Orders\Infrastructure\Http\Controller
*/
class OrderController extends AbstractController
{
       /**
        * @param CreateOrderInterface $createOrderService
        * @param FindOrderInterface $findOrderService
       */
       public function __construct(
           protected CreateOrderInterface $createOrderService,
           protected FindOrderInterface $findOrderService
       )
       {
       }


       /**
         * В симфони есть возможность инжектить сам DTO (CreateOrderRequest) и настроивать но это через какие-то бандл
         * Я по простому решил делать чтобы ничего не усложнать :)
         *
         * @param Request $request
         * @return JsonResponse
       */
       #[Route(path: '/orders', methods: ['POST'], name: 'app.orders.create')]
       public function createOrder(Request $request): JsonResponse
       {
            $createOrderResponse = $this->createOrderService->createAndSendOrder(
                CreateOrderRequest::createFromArray($request->toArray())
            );

            return $this->json(
                $createOrderResponse,
                $createOrderResponse->statusCode
            );
       }





       /**
        * @param int $id
        * @return JsonResponse
       */
       #[Route(path: '/orders/{id}', methods: ['GET'], name: 'app.orders.show')]
       public function findOrder(int $id): JsonResponse
       {
            $findOrderResponse = $this->findOrderService->findOrder(
                new FindOrderRequest($id)
            );

            return $this->json($findOrderResponse, $findOrderResponse->statusCode);
       }
}