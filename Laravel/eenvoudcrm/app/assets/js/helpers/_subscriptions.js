'use strict';

var _ = window._;

/**
 * [Subscriptions - constructor]
 */
var Subscriptions = function() {
    this.models = [];
};

Subscriptions.prototype = {

    /**
     * [init - initialization]
     * @return {[type]} [description]
     */
    init: function() {

        var self = this;

        $.ajax({
            url: '/admin/subscriptions/all',
            type: 'GET',
            dataType: 'json',
        })
        .done(function(data, textStatus, jqXHR) {
            self.models = data.slice();
            //console.log("projects data", self.models);
        })
        .fail(function(jqXHR, textStatus, errorThrow) {
            console.log("error");
        });
    },
    /**
     * [getServiceByID - description]
     * @param  {[type]} subscriptionID [description]
     * @return {[type]}                [description]
     */
    getServiceByID : function(subscriptionID) {

        var self = this;
        self.init();


        var subscription = _.findWhere(self.models, {id: parseInt(subscriptionID,10)});
        console.log('>>> getServiceByID', subscriptionID, self.models, subscription);

        return subscription.service_id;
    }
};

module.exports = new Subscriptions();
