define(
    [
        'jquery',
        'ko',
        'Magento_Checkout/js/view/shipping'
    ],
    function(
        $,
        ko,
        Component
    ) {
        'use strict';
        return Component.extend({
            defaults: {
                template: 'Rltsquare_CustomShipping/shipping'
            },

            initialize: function () {
                var self = this;
                this._super();
            }

        });
    }
);