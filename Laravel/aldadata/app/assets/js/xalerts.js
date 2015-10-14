(function($, App) {

    'use strict';

    var initAlerts = function() {

        if (!$(".alert-success.alert-fade").length) {
            return false;
        }

        setTimeout(function() {
            $(".alert-fade").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
            });
        }, 4000);

    };

    $(window).on('ajaxComplete', initAlerts);
    $(document).ready(initAlerts);

})(jQuery, window.App);
