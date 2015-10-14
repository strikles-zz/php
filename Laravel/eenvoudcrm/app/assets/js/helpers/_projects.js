'use strict';

var _ = window._;

/**
 * [Projects - constructor]
 */
var Projects = function() {
    this.models = [];
};

Projects.prototype = {

    /**
     * [init - initialization]
     * @return {[type]} [description]
     */
    init: function() {

        var self = this;

        $.ajax({
            url: '/admin/projects/all',
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
     * [get - dummy test]
     * @return {[type]} [description]
     */
    get: function() {

        var self = this;
        return self.getByCompanyID("1");
    },
    /**
     * [getByCategoryID description]
     * @param  {[type]} categoryID [description]
     * @return {[type]}            [description]
     */
    getByCategoryID: function(categoryID) {

        var self = this;

        var modelsOut = [];
        var relevant_models = _.where(self.models, {category_id: categoryID});
        $.each(relevant_models, function() {

            modelsOut.push({
                label: this.name,
                value: this.id
            });
        });
        return modelsOut;
    },
    /**
     * [getByCompanyID - returns company id,name pair if a company ID is found]
     * @param  {[type]} companyID [description]
     * @return {[type]}           [description]
     */
    getByCompanyID: function(companyID) {

        var self = this;

        var modelsOut = [];
        modelsOut.push({label: "undefined", value: -1});

        var relevant_models = _.where(self.models, {company_id: companyID});
        $.each(relevant_models, function() {

            modelsOut.push({
                label: this.name,
                value: this.id
            });
        });

        return modelsOut;
    },
    /**
     * [belongsToCompany - check if a given project_id belongs to a given company]
     * @param  {[type]} projectID [description]
     * @param  {[type]} companyID [description]
     * @return {[type]}           [description]
     */
    belongsToCompany: function(projectID, companyID) {

        if(projectID === undefined)
        {
            return true;
        }

        var self = this;
        var company_projects = self.getByCompanyID(companyID);
        var relevant_project = _.findWhere(company_projects, {value: projectID});

        return (relevant_project !== undefined);
    }
};

module.exports = new Projects();
