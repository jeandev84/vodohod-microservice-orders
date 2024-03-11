<?php
declare(strict_types=1);

namespace App\Orders\Application\DTO\Input;

/**
 * FindOrderRequest
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  App\Orders\Application\DTO\Input
 */
class FindOrderRequest
{

     /**
      * @param int|null $orderId идишник заказа
      * так как пишем DTO эти свойства можно публично оставить
      * можно и приватный тогда через сеттеры и геттеры будем иметь доступ к свойству
      * тут через аннотации происходить валидацию
     */
     public function __construct(
         public ?int $orderId
     )
     {
     }
}