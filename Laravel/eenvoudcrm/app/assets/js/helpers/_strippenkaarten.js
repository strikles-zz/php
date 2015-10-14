'use strict';

/**
 * [Strippenkaarten constructor]
 */
var Strippenkaarten = function() {
    this.models = [];
};

Strippenkaarten.prototype = {

    /**
     * [init - initialization]
     * @return {[type]} [description]
     */
    init: function() {

        var self = this;

        $.ajax({
            url: '/admin/strippenkaarten/all',
            type: 'GET',
            dataType: 'json',
        })
        .done(function(data, textStatus, jqXHR) {
            self.models = data.slice();
            //console.log("strip data", self.models);
        })
        .fail(function(jqXHR, textStatus, errorThrow) {
            console.log("strip error");
        });
    },
    /**
     * [get - dummy test]
     * @return {[type]} [description]
     */
    get: function() {

        var self = this;
        return self.getByCompanyID("28");
    },
    /**
     * [getByCompanyID description]
     * @param  {[type]} companyID [description]
     * @return {[type]}           [description]
     */
    getByCompanyID : function(companyID) {

        var self = this;

        var modelsOut = [];
        $.each(self.models, function() {

            if (parseInt(this.company_id) === parseInt(companyID)) {
                modelsOut.push({
                    label: this.hours,
                    value: this.id
                });
            }
        });
        return modelsOut;
    },
    /**
     * [get1ByCompanyID - get 1st strippenkaart that satisfies conditions]
     * @param  {[type]} companyID [description]
     * @param  {[type]} minutes   [description]
     * @return {[type]}           [description]
     */
    get1ByCompanyID : function(companyID, minutes) {

        var self = this;

        var modelsOut = [];
        $.each(self.models, function() {
            if (parseInt(this.company_id) === parseInt(companyID)  && parseFloat(this.hours * 60.0) >= parseFloat(minutes)) {

                modelsOut.push({
                    label: this.hours,
                    value: this.id
                });

                return false;
            }
        });
        return modelsOut;
    }
};

module.exports = new Strippenkaarten();
