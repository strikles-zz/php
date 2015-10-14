'use strict';

var _ = window._;

/**
 * [Worklogs - constructor]
 */
var Worklogs = function() {
    this.models = [];
};

Worklogs.prototype = {

    /**
     * [init - initialization]
     * @return {[type]} [description]
     */
    init: function() {

        var self = this;

        $.ajax({
            url: '/admin/werklogs/all',
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
     * [getProjectByID - description]
     * @param  {[type]} worklogID [description]
     * @return {[type]}           [description]
     */
    getProjectByID: function(worklogID) {

        var self = this;

        var ret;
        console.log('getProjectByID', worklogID, self.models);
        var relevant_models = _.findWhere(self.models, {id: worklogID});
        if(relevant_models !== undefined)
        {
            ret = relevant_models.project_id;
        }

        console.log('wh ret', ret);
        return ret;
    }
};

module.exports = new Worklogs();

