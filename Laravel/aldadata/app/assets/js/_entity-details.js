'use strict';

var EntityDetails = function() {

    this.models = {
        'company':      'companies',
        'venue':        'venues',
        'contact':      'contacts'
    };

};

EntityDetails.prototype = {

    get: function(args) {

        var self = this;

        if (!args) {
            throw 'No arguments given';
        }
        if (!args.type) {
            throw 'Entity type not set';
        }
        if (!args.id) {
            throw 'Entity ID not set';
        }

        var url = '/' + args.type + '/' + args.id + '/details';

        $.ajax({
            url: url,
            method: 'GET',
            type: 'html',
            success: function(data, status) {
                $('#search_' + args.type).find('.details').html(data);
            }
        });
    }
};

module.exports = new EntityDetails();
