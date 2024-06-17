<?php
/**
 * @category    KvaPay
 * @package     KvaPay_Merchant
 * @author      KvaPay
 * @copyright   KvaPay (https://kvapay.com)
 * @license     https://github.com/kvapay/magento2-plugin/blob/master/LICENSE The MIT License (MIT)
 */

declare(strict_types = 1);

namespace KvaPay\Merchant\Api;

use KvaPay\Merchant\Api\Response\PlaceOrderInterface;

/**
 * Interface PaymentInterface
 */
interface PaymentInterface
{
    /**
     * @return \KvaPay\Merchant\Api\Response\PlaceOrderInterface
     */
    public function placeOrder(): PlaceOrderInterface;
}
