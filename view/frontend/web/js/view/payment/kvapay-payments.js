define([
        'uiComponent',
        'Magento_Checkout/js/model/payment/renderer-list'
    ], function (
        Component,
        rendererList
    ) {
        'use strict';
        rendererList.push(
            {
                type: 'kvapay_merchant',
                component: 'KvaPay_Merchant/js/view/payment/method-renderer/kvapay-method'
            }
        );
        /** Add view logic here if needed */
        return Component.extend({});
    }
);
