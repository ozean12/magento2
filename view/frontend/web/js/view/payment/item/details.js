/*jshint browser:true jquery:true*/
/*global alert*/
define(
    [
        'uiComponent'
    ],
    function (Component) {
        "use strict";
        var quoteItemData = window.checkoutConfig.quoteItemData;
        return Component.extend({
            defaults: {
                template: 'Billiepayment_BilliePaymentMethod/payment/item/details'
            },
            quoteItemData: quoteItemData,
            getValue: function(quoteItem) {
                return quoteItem.name;
            },
            getManufacturer: function(quoteItem) {
                var item = this.getItem(quoteItem.item_id);
                return item.manufacturer;
            },
            getDescription: function(quoteItem) {
                var item = this.getItem(quoteItem.item_id);
                return item.description;
            },
            getCategory: function(quoteItem) {
                var item = this.getItem(quoteItem.item_id);
                return item.category;
            },
            getItem: function(item_id) {
                var itemElement = null;
                _.each(this.quoteItemData, function(element, index) {
                    if (element.item_id == item_id) {
                        itemElement = element;
                    }
                });
                return itemElement;
            }
        });
    }
);