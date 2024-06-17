<?php
/**
 * @category    KvaPay
 * @package     KvaPay_Merchant
 * @author      KvaPay
 * @copyright   KvaPay (https://kvapay.com)
 * @license     https://github.com/kvapay/magento2-plugin/blob/master/LICENSE The MIT License (MIT)
 */

declare(strict_types=1);

namespace KvaPay\Merchant\Block\Adminhtml\System\Config;

use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;
use Magento\Framework\UrlInterface;

/**
 * Class CallbackUrl
 */
class CallbackUrl extends Field
{
    protected $_storeManager;
    protected $_urlInterface;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\UrlInterface $urlInterface,
        array $data = []
    )
    {
        $this->_storeManager = $storeManager;
        $this->_urlInterface = $urlInterface;
        parent::__construct($context, $data);
    }

    /**
     * @var string
     */
    private const URL_CALLBACK = 'url_callback';

    /**
     * @var string
     */
    private const HTML_ID_KEY = 'html_id';

    /**
     * @var string
     */
    protected $_template = 'KvaPay_Merchant::system/config/callback-url.phtml';

    /**
     * Unset scope
     *
     * @param AbstractElement $element
     *
     * @return string
     */
    public function render(AbstractElement $element): string
    {
        $element->unsScope();

        return parent::render($element);
    }

    /**
     * Get the button and scripts contents
     *
     * @param AbstractElement $element
     *
     * @return string
     */
    protected function _getElementHtml(AbstractElement $element): string
    {
        $this->addData([
            self::URL_CALLBACK => $this->_storeManager->getStore()->getBaseUrl().'kvapay/payment/callback',
            self::HTML_ID_KEY => $element->getHtmlId(),
        ]);

        return $this->_toHtml();
    }
}
