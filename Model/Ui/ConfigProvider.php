<?php

declare(strict_types = 1);

namespace KvaPay\Merchant\Model\Ui;

use Magento\Checkout\Model\ConfigProviderInterface;

/**
 * Abstract Class ConfigProvider
 */
abstract class ConfigProvider implements ConfigProviderInterface
{
    /**
     * @var string
     */
    public const CODE = 'kvapay_merchant';
}
