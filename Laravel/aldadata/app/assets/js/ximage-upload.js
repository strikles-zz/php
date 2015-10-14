(function($, _, App) {

    'use strict';

    $(window).on('ajaxContentAdded', function() {

        // dropzone for uploading images
        $(".dropzone").each(function() {

            var form_action = $(this).attr('action');

            $(this).dropzone({
                url: form_action,
                accept: function (file, done) {

                    if ((file.type).toLowerCase() !== "image/jpg" &&
                        (file.type).toLowerCase() !== "image/gif" &&
                        (file.type).toLowerCase() !== "image/jpeg" &&
                        (file.type).toLowerCase() !== "image/png")
                    {
                       done("Invalid file");
                    }
                    else {
                        done();
                    }
                },
                init: function() {

                    this.on("addedfile", function(file) {
                        //console.log("Added file.");
                        App.ajax.pages[App.ajax.pages.length - 1].refresh();
                    });
                }
            });
        });

        // colorbox for displaying images
        $('a.mthumbs').volorbox({
            rel:'mthumb',
            title: function(){
                var caption = $(this).attr('data-caption');
                return caption;
            },
            maxWidth: "90%",
            maxHeight: "90%"
        });
    });

})(jQuery, window._, window.App);
