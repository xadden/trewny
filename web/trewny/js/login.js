"use strict";
(function (trewny, $) {

    trewny.template = function (elem) {
        //do something
    };

    /* START UP */
    $(document).ready(function () {
        $('#signup-password, #signup-repeatpassword').on('keyup', function () {
            if ($('#signup-password').val() == $('#signup-repeatpassword').val()) {
                $('#signup-repeatpassword').css('background-color', '#3b4148');
                $('#signup-repeatpassword').removeClass("mismatch");
            } else {
                $('#signup-repeatpassword').css('background-color', '#d23b3b');
                $('#signup-repeatpassword').addClass("mismatch");
            }
        });
    });

})(window.trewny = window.trewny || {}, jQuery);