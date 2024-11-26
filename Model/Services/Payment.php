<?php
/**
 * @category    KvaPay
 * @package     KvaPay_Merchant
 * @author      KvaPay
 * @copyright   KvaPay (https://kvapay.com)
 * @license     https://github.com/kvapay/magento2-plugin/blob/master/LICENSE The MIT License (MIT)
 */

declare(strict_types = 1);

namespace KvaPay\Merchant\Model\Services;

use KvaPay\Merchant\Api\PaymentInterface;
use KvaPay\Merchant\Api\Response\PlaceOrderInterface as Response;
use KvaPay\Merchant\Model\Payment as KvaPayPayment;
use Magento\Checkout\Model\Session as CheckoutSession;
use Magento\Framework\Exception\InputException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Quote\Api\CartRepositoryInterface;
use Magento\Sales\Model\OrderRepository;
use Psr\Log\LoggerInterface;

/**
 * Class Payment
 */
class Payment implements PaymentInterface
{
    private Response $response;
    private CheckoutSession $checkoutSession;
    private OrderRepository $orderRepository;
    private CartRepositoryInterface $quoteRepository;
    private KvaPayPayment $kvaPayPayment;
    private LoggerInterface $logger;

    /**
     * @param Response $response
     * @param CheckoutSession $checkoutSession
     * @param OrderRepository $orderRepository
     * @param CartRepositoryInterface $quoteRepository
     * @param KvaPayPayment $kvaPayPayment
     * @param LoggerInterface $logger
     */
    public function __construct(
        Response $response,
        CheckoutSession $checkoutSession,
        OrderRepository $orderRepository,
        CartRepositoryInterface $quoteRepository,
        KvaPayPayment $kvaPayPayment,
        LoggerInterface $logger
    ) {
        $this->response = $response;
        $this->checkoutSession = $checkoutSession;
        $this->orderRepository = $orderRepository;
        $this->quoteRepository = $quoteRepository;
        $this->kvaPayPayment = $kvaPayPayment;
        $this->logger = $logger;
    }

    /**
     * @inheritDoc
     */
    public function placeOrder(): Response
    {
        $orderId = $this->checkoutSession->getLastOrderId();

        try {
            $order = $this->orderRepository->get($orderId);
        } catch (InputException | NoSuchEntityException $exception) {
            $this->logger->critical($exception->getMessage());
            $this->response->setStatus(false);

            return $this->response;
        }

        if (!$order->getIncrementId()) {
            $this->response->setStatus(false);

            return $this->response;
        }

        $quote = $this->quoteRepository->get($order->getQuoteId());
        $quote->setIsActive(1);
        $this->quoteRepository->save($quote);
        $cgOrder = $this->kvaPayPayment->getKvaPayOrder($order);

        if (!$cgOrder) {
            $this->response->setStatus(false);

            return $this->response;
        }

        $this->response->setStatus(true);
        $this->response->setPaymentUrl($cgOrder->shortLink);

        return $this->response;
    }
}
