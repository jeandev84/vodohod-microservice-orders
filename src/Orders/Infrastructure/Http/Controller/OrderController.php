<?php
declare(strict_types=1);

namespace App\Infrastructure\Http\Controller;

use App\Orders\Application\Contract\Actions\Order\CreateOrderInterface;
use App\Orders\Application\Contract\Actions\Order\FindOrderInterface;
use App\Orders\Application\DTO\Input\CreateOrderRequest;
use App\Orders\Application\DTO\Input\FindOrderRequest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * OrderController
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  App\Infrastructure\Http\Controller
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
         * @param Request $request
         * @return JsonResponse
       */
       # В симфони есть возможность инжектить сам DTO (CreateOrderRequest) и настроивать но это через какие-то бандл
       # я по простому решил делать чтобы ничего не усложнать :)
       public function createOrder(Request $request): JsonResponse
       {
            $parsedBody = new ParameterBag($request->toArray());

            $createOrderRequest  = new CreateOrderRequest(
                 $parsedBody->get('email'),
                 $parsedBody->get('cart', [])
            );

            $createOrderResponse = $this->createOrderService->createAndSendOrder($createOrderRequest);

            return $this->json($createOrderResponse, Response::HTTP_CREATED);
       }





       /**
        * @param int $id
        * @return Response
       */
       public function findOrder(int $id): Response
       {
            $findOrderRequest  = new FindOrderRequest($id);
            $findOrderResponse = $this->findOrderService->findOrder($findOrderRequest);

            return $this->json($findOrderResponse, Response::HTTP_OK);
       }
}