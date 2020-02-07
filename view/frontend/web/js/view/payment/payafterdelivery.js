/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

/* @api */
define([
        'uiComponent',
        'Magento_Checkout/js/model/payment/renderer-list'
    ],
    function (Component, rendererList) {
        'use strict';
            rendererList.push(
                {
                    type: 'checkmo',
                    component: 'Magento_BilliePaymentMethod/js/view/payment/method-renderer/payafterdelivery'
                }
            );

        console.log('test6');
        /** Add view logic here if needed */
        return Component.extend({});
    });