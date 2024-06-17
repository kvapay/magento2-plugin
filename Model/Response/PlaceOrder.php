<?php
/**
 * @category    KvaPay
 * @package     KvaPay_Merchant
 * @author      KvaPay
 * @copyright   KvaPay (https://kvapay.com)
 * @license     https://github.com/kvapay/magento2-plugin/blob/master/LICENSE The MIT License (MIT)
 */

declare(strict_types = 1);

namespace KvaPay\Merchant\Model\Response;

use KvaPay\Merchant\Api\Response\PlaceOrderInterface as Response;

/**
 * Class PlaceOrder
 */
class PlaceOrder implements Response
{
    private string $paymentUrl = '';
    private bool $status = false;

    /**
     * @inheritDoc
     */
    public function getPaymentUrl(): string
    {
        return $this->paymentUrl;
    }

    /**
     * @inheritDoc
     */
    public function setPaymentUrl(string $paymentUrl): void
    {
        $this->paymentUrl = $paymentUrl;
    }

    /**
     * @inheritDoc
     */
    public function getStatus(): bool
    {
        return $this->status;
    }

    /**
     * @inheritDoc
     */
    public function setStatus(bool $status): void
    {
        $this->status = $status;
    }
}
