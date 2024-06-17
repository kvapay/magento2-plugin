<?php
/**
 * @category    KvaPay
 * @package     KvaPay_Merchant
 * @author      KvaPay
 * @copyright   KvaPay (https://kvapay.com)
 * @license     https://github.com/kvapay/magento2-plugin/blob/master/LICENSE The MIT License (MIT)
 */

declare(strict_types = 1);

namespace KvaPay\Merchant\Api\Response;

/**
 * Interface PlaceOrderInterface
 */
interface PlaceOrderInterface
{
    /**
     * @return string
     */
    public function getPaymentUrl(): string;

    /**
     * @param string $paymentUrl
     *
     * @return void
     */
    public function setPaymentUrl(string $paymentUrl): void;

    /**
     * @return bool
     */
    public function getStatus(): bool;

    /**
     * @param bool $status
     *
     * @return void
     */
    public function setStatus(bool $status): void;
}
