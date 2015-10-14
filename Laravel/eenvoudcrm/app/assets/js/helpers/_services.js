'use strict';

var _ = window._;

/**
 * [Services constructor]
 */
var Services = function() {
    this.models = [];
};

Services.prototype = {

    /**
     * [init - initialization]
     * @return {[type]} [description]
     */
    init: function(){

        var self = this;

        $.ajax({
            url: '/admin/settings/services/all',
            type: 'GET',
            dataType: 'json',
        })
        .done(function(data, textStatus, jqXHR) {
            self.models = data.slice();
        })
        .fail(function(jqXHR, textStatus, errorThrow) {
            console.log("error");
        });

    },
    /**
     * [get - dummy test]
     * @return {[type]} [description]
     */
    get: function() {

        var self = this;
        return self.getByCategoryID("3");

    },
    /**
     * [getByCategoryID description]
     * @param  {[type]} categoryID [description]
     * @return {[type]}            [description]
     */
    getByCategoryID: function(categoryID) {

        var self = this;

        var modelsOut = [];
        var relevant_models = _.where(self.models, {category_id: parseInt(categoryID, 10)});
        $.each(relevant_models, function() {
            modelsOut.push({
                label: this.name,
                value: this.id
            });
        });

        console.log('modelsOut', modelsOut);
        return modelsOut;
    },
    /**
     * [getIDsByCategory - given a cat_id returns array of service_id's thatbelong to cat]
     * @param  {[type]} categoryID [description]
     * @return {[type]}            [description]
     */
    getIDsByCategory: function(categoryID) {

        var self = this;

        var IdsOut = [];
        var relevant_models = _.where(self.models, {category_id: parseInt(categoryID, 10)});
        $.each(relevant_models, function() {
            IdsOut.push(parseInt(this.id, 10));
        });

        console.log('IdsOut', IdsOut, self.models, relevant_models, categoryID, typeof categoryID);
        return IdsOut;
    },
    /**
     * [getDefaultPrice - get service default price]
     * @param  {[type]} serviceID [description]
     * @return {[type]}           [description]
     */
    getDefaultPrice: function(serviceID) {

        var self = this;

        if(serviceID === undefined)
        {
            console.log('Undefined Service ID :(');
            return 0;
        }

        var related_model = _.findWhere(self.models, {id: parseInt(serviceID, 10)});
        var ret;
        if(related_model)
        {
            ret = related_model.default_monthly_costs;
        }

        return ret;
    },
    /**
     * [getStatus - get service renewal status]
     * @param  {[type]} serviceID [description]
     * @return {[type]}           [description]
     */
    getStatus: function(serviceID) {

        var self = this;

        if(serviceID === undefined)
        {
            console.log('Undefined Service ID :(');
            return 0;
        }
        var models = self.models;
        var selectedModels = _.findWhere(models, {id: parseInt(serviceID,10)});
        console.log(models, selectedModels);
        var ret = _.findWhere(self.models, {id: parseInt(serviceID,10)}).status_id;

        return ret;
    },
    /**
     * [getPeriod - get service billing period]
     * @param  {[type]} serviceID [description]
     * @return {[type]}           [description]
     */
    getPeriod: function(serviceID) {

        var self = this;

        if(serviceID === undefined)
        {
            console.log('Undefined Service ID :(');
            return 0;
        }
        var ret = _.findWhere(self.models, {id: parseInt(serviceID, 10)});

        if (ret && ret.invoice_periods_id) {
        	ret = ret.invoice_periods_id;
        }

        return ret;
    }
};

module.exports = new Services();
