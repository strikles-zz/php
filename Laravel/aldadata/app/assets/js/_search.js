'use strict';

var SearchModule = function() {

    this.name       = '';
    this.$table     = {};
    this.res        = {};
    this.dt         = {};
    this.dt_columns = [];

    this.typeaheads = undefined;
};

SearchModule.prototype = {

    init: function(options) {

        var self = this;

        self.name       = options.name;
        self.$table     = $('#search_'+options.name+'_table');
        self.res        = {};
        self.dt         = {};
        self.dt_columns = [];

        self.initData()
            .initColumns()
            .initTable()
            .initDetails()
            .initClickListener()
            .initKBListener();
    },

    initColumns: function() {

        var self = this;

        $('#search_'+self.name+'_table th').each(function(ndx) {
            self.dt_columns.push({data: $(this).attr('data-column')});
        });

        console.log('self.dt_columns', self.dt_columns);

        return self;
    },
    initData: function() {

        var self = this;

        self.res.data = JSON.parse($('#dt_'+self.name+'_init').text()).data;
        console.log('self.res.data', '#dt_'+self.name+'_init', self.res.data, $('#dt_'+self.name+'_init').text());

        return self;
    },
    initTable: function() {

        var self = this;

        console.log(self.name);
        self.dt = $('#search_'+self.name+'_table').dataTable({
            "dom": "<'row'<'col-md-6'<'row'<'col-xs-6'l><'col-xs-6 text-right'r>>><'col-md-6'f>>t<'row'<'col-md-6'i><'col-md-6'p>>",
            "pageLength": 5,
            "order": [[ 0, "desc" ]],
            "columns": self.dt_columns,
            "data": JSON.parse($('#dt_'+self.name+'_init').text()).data,
            "lengthChange": false,
            "searching": false,
            "tableTools": {
                "sRowSelect": "single",
                "aButtons": [
                ]
            }
        });

        return self;
    },
    initDetails: function() {

        var self = this;

        var $el = $('#search_' + self.name + '_table tbody tr:first');
        if($el.length) {

            var entity_id = $('#search_' + self.name + '_table tbody tr:first').attr('id');
            var entity_details = require('./_entity-details');
            entity_details.get({
                type: self.name,
                id: entity_id
            });
        }




        return self;
    },
    initClickListener: function() {

        var self = this,

        selector = '#search_' + self.name + '_table tbody tr';

        $('body').on('click', selector, function() {

            var $row = $(this);

            var entity_details = require('./_entity-details');
            entity_details.get({
                type: self.name,
                id: $row.attr('id')
            });
            $(selector).not($row).removeClass('selected');
            $row.toggleClass('selected');
        });

        return self;
    },
    initKBListener: function () {

        var self = this;
        var name = self.name;

        // typeaheads input
        $('body').on('focusout', '.tt-input', function(event) {

            $(this).hide();
            $(this).parent('span').find('.tt-hint').hide();
            event.stopPropagation();
        });

        // tags input
        $('body').on('click', '.bootstrap-tagsinput', function(event) {

            var $sel_input = $(this).find('.tt-input');
            var $sel_hint = $(this).find('.tt-hint');

            $sel_input.val('').show().focus();
            $sel_hint.show();

            event.stopPropagation();
        });

        // Main KB event pump
        $('body').on('keyup', '#search_' + name + ' input', function() {

            var req_data = {};
            $('#search_' + name + '_table thead tr th').each(function(ndx){

                var curr_property = $(this).attr('data-column');
                req_data[curr_property] = $('#'+self.name+'_'+curr_property).val();
                console.log(curr_property, req_data[curr_property]);
            });

            // extend request params
            switch(name) {
                case 'companies':
                    req_data = $.extend('true', req_data,
                        {
                            references: $('#companies_references').val()
                        });

                    break;
                case 'venues':
                    req_data = $.extend('true', req_data,
                        {
                            min_capacity: $('#venues_min_capacity').val(),
                            max_capacity: $('#venues_max_capacity').val(),
                            min_rig_capacity: $('#venues_min_rig_capacity').val()
                        });

                    break;
                default:
                    break;
            }

            // post query
            $.ajax({
                type: "POST",
                url: "/search_"+self.name+"_data",
                async: true,
                dataType: 'json',
                data: req_data,
                success: function(data, textStatus, jqXHR) {

                    self.dt.fnClearTable();
                    if (data.data && data.data.length) {
                        console.log('ajax search data', data.data);
                        self.dt.fnAddData(data.data);
                    }

                    if($('#search_' + name + '_table tbody tr:selected').length === 0)
                    {
                        $('.details').empty();
                    }
                },

                error: function(qXHR, textStatus, errorThrown) {
                    console.log(qXHR, textStatus, errorThrown);
                }
            });
        });

        return self;
    }
};

module.exports = new SearchModule();

