<?php
declare(strict_types=1);

namespace App\Orders\Infrastructure\Command;

use App\Orders\Application\Contract\Actions\Order\CreateOrderInterface;
use App\Orders\Application\Contract\Encoder\JsonEncoderInterface;
use App\Orders\Application\DTO\Input\CreateOrderRequest;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Throwable;

/**
 * CreateOrderCommand
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  App\Orders\Infrastructure\Command
 */
class CreateOrderCommand extends Command
{
    protected static $defaultName = "app:create:order";


    /**
     * @param CreateOrderInterface $createOrderService
     * @param JsonEncoderInterface $jsonEncoder
    */
    public function __construct(
        protected CreateOrderInterface $createOrderService,
        protected JsonEncoderInterface $jsonEncoder
    )
    {
        parent::__construct(self::$defaultName);
    }

    protected function configure()
    {
        $this->addArgument('email', InputArgument::REQUIRED, 'User email')
             ->addArgument('cart', InputArgument::REQUIRED, 'Order Items');
    }




    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
    */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try {

            $createOrderRequest = new CreateOrderRequest(
                $input->getArgument('email'),
                $this->jsonEncoder->decode($input->getArgument('cart'))
            );

            $createOrderResponse = $this->createOrderService->createAndSendOrder($createOrderRequest);

            $output->writeln($createOrderResponse->orderId);

            return Command::SUCCESS;

        } catch (Throwable $e) {

            $output->writeln($e->getMessage());

            return Command::FAILURE;
        }
    }

}