'use strict';

/**
 * [Dt - constructor]
 */
var Dt = function() {

    this.progress_html =    "<div class='progress'>\
                                <div class='progress-bar progress-bar-success progress-bar-striped active' role='progressbar' aria-valuenow='0' aria-valuemin='0' aria-valuemax='100' style='width: 0%;'></div>\
                            </div>\
                            <div class='progress-message'>\
                            </div>";
    };

Dt.prototype = {

    // fix accounting op_type = invoice => singularAjax
    /**
     * [singularAjaxRequest - ajax handler to process everything at once]
     * @param  {[type]} data_arg [description]
     * @param  {[type]} ajax_url [description]
     * @param  {[type]} editor   [description]
     * @return {[type]}          [description]
     */
    singularAjaxRequest: function(data_arg, ajax_url, editor) {

        var self = this;

        $.ajax({
            url: ajax_url,
            type: 'POST',
            dataType: 'json',
            data: data_arg,
        })
        .done(function(data, textStatus, jqXHR) {

            // Le zone
            $('.DTE_Form_Info').html('Boom');
            editor.close();
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            console.log("singularAjaxRequest error");
        });
    },
    /**
     * [multipleAjaxRequests - ajax handler to process an item at a time and provide progress status]
     * @param  {[type]} data_arg [description]
     * @param  {[type]} ajax_url [description]
     * @param  {[type]} editor   [description]
     * @return {[type]}          [description]
     */
    multipleAjaxRequests: function(data_arg, ajax_url, editor) {

        var self = this;

        $('.DTE_Form_Info').html(self.progress_html);
        var total_complete = 0;

        // create an array to hold the jqXHR ajax deferred objects
        var requests = [];
        $.each(data_arg.values, function(index, val) {

            var row_values = [];
            row_values[0] = val;
            var curr_arg = data_arg;
            curr_arg.values = row_values;

            // push jqXHR to requests array
            requests.push(

                // this will return a deferred jqXHR object with 2 relevant methods
                // (resolve on sucess, reject on error)
                $.ajax({
                    url: ajax_url,
                    type: 'POST',
                    dataType: 'json',
                    data: curr_arg,
                })
                .done(function(data, textStatus, jqXHR) {


                    $('.progress-message').html('<p>Item '+index+' OK'+'</p>');
                    total_complete++;
                    var bar_width = (100.0*total_complete/data_arg.values.length).toString()+'%';
                    $('.progress-bar').width(bar_width);
                })
                .fail(function(jqXHR, textStatus, errorThrown) {

                    console.log("associate worklogs to strip error");
                    $('.progress-message').html('<p>Item '+index+' Failed'+'</p>');
                })
            );
        });

        var successCallback = function() {

            editor.close();
            $('.DTE_Form_Info').html('');
        };

        var failureCallback = function() {

            editor.close();
            $('.DTE_Form_Info').html('');
        };

        // $.when doesn't take arrays as an argument, so we use apply to expand the result
        // returns a master deferred that will be resolved when all promises are resolved
        // and will be rejected if any of the promises are rejected
        $.when.apply(undefined, requests).then(successCallback, failureCallback);
    },
    /**
     * [getDate - format date in YYYY-MM-DD format]
     * @param  {[type]} curr_date [description]
     * @return {[type]}           [description]
     */
    getDate: function(curr_date) {

        // dates
        var twoDigitMonth = (curr_date.getMonth()+1)+"";
        if(twoDigitMonth.length === 1)  {
            twoDigitMonth="0" +twoDigitMonth;
        }

        var twoDigitDate = curr_date.getDate()+"";
        if(twoDigitDate.length === 1) {
            twoDigitDate="0" +twoDigitDate;
        }

        return curr_date.getFullYear() +"-"+ twoDigitMonth +"-" + twoDigitDate;

    },
    /**
     * [createEditor]
     * @param  {[type]} editor  [description]
     * @param  {[type]} options [description]
     * @return {[type]}         [description]
     */
    createEditor: function(editor, options) {

        var self = this;

        var dt_options = $.extend(true, options, {dateImage: "/assets/datatables/extensions/Editor-1.3.3/images/calender.png"});
        editor         = new $.fn.dataTable.Editor(dt_options);

        return editor;
    },
    /**
     * [createTable]
     * @param  {[type]} table          [description]
     * @param  {[type]} table_selector [description]
     * @param  {[type]} options        [description]
     * @return {[type]}                [description]
     */
    createTable: function(table, table_selector, options) {

        var self = this;

        console.log('table selector', table_selector instanceof jQuery);
        var $table_el  = (table_selector instanceof jQuery ? table_selector : $(table_selector));
        var dt_options = $.extend(true, options, {serverSide: true, dom: "<'row'<'col-md-6'T><'col-md-6'f>r>t<'row'<'col-md-6'<'row'<'col-md-12'i>><'row'<'col-md-12'l>>><'col-md-6'p>>"});
        table          = $table_el.dataTable(dt_options);

        return table;
    }
};

module.exports = new Dt();
