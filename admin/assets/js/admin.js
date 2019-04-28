jQuery(document).ready(function($) {
    
    $("#btn1").click(function() {
        $("#ehf-remove").fadeIn("slow");
        $("#ehf-disable").hide();
        $("#ehf-security").hide();
        $("#ehf-script").hide();
        $("#ehf-header-footer").hide();
        $("#ehf-minify").hide();
        $("#ehf-tools").hide();
    });

    $("#btn2").click(function() {
        $("#ehf-remove").hide();
        $("#ehf-disable").fadeIn("slow");
        $("#ehf-security").hide();
        $("#ehf-script").hide();
        $("#ehf-header-footer").hide();
        $("#ehf-minify").hide();
        $("#ehf-tools").hide();
    });

    $("#btn3").click(function() {
        $("#ehf-remove").hide();
        $("#ehf-disable").hide();
        $("#ehf-security").fadeIn("slow");
        $("#ehf-script").hide();
        $("#ehf-header-footer").hide();
        $("#ehf-minify").hide();
        $("#ehf-misc").hide();
        $("#ehf-tools").hide();
    });

    $("#btn4").click(function() {
        $("#ehf-remove").hide();
        $("#ehf-disable").hide();
        $("#ehf-security").hide();
        $("#ehf-script").fadeIn("slow");
        $("#ehf-header-footer").hide();
        $("#ehf-minify").hide();
        $("#ehf-tools").hide();
    });

    $("#btn5").click(function() {
        $("#ehf-remove").hide();
        $("#ehf-disable").hide();
        $("#ehf-security").hide();
        $("#ehf-script").hide();
        $("#ehf-header-footer").fadeIn("slow");
        $("#ehf-minify").hide();
        $("#ehf-tools").hide();
    });

    $("#btn6").click(function() {
        $("#ehf-remove").hide();
        $("#ehf-disable").hide();
        $("#ehf-security").hide();
        $("#ehf-script").hide();
        $("#ehf-header-footer").hide();
        $("#ehf-minify").fadeIn("slow");
        $("#ehf-tools").hide();
    });

    $("#btn7").click(function() {
        $("#ehf-remove").hide();
        $("#ehf-disable").hide();
        $("#ehf-security").hide();
        $("#ehf-script").hide();
        $("#ehf-header-footer").hide();
        $("#ehf-minify").hide();
        $("#ehf-tools").fadeIn("slow");
    });

    $("#feed-disable").change(function () {
        if ($('#feed-disable').is(':checked')) {
            $('.cl-feed').hide();
            $('#feed').prop('checked', false);
        }
        if (!$('#feed-disable').is(':checked')) {
            $('.cl-feed').show();
        }
    });
    $("#feed-disable").trigger('change');

    $("#enable-iframe").change(function () {
        if ($('#enable-iframe').is(':checked')) {
            $('#iframe-span').show();
            $("#iframe").change(function() {
                if ($('#iframe').val() == 'ALLOW-FROM') {
                    $('#allow-xframe-from').show();
                    $('#iframe-allow-form').attr('required', 'required');
                }
                if ($('#iframe').val() != 'ALLOW-FROM') {
                    $('#allow-xframe-from').hide();
                    $('#iframe-allow-form').removeAttr("required");
                }
            });
            $("#iframe").trigger('change');
        }
        if (!$('#enable-iframe').is(':checked')) {
            $('#iframe-span').hide();
            $('#allow-xframe-from').hide();
            $('#iframe-allow-form').removeAttr("required");
        }
    });
    $("#enable-iframe").trigger('change');

    $("#hsts").change(function () {
        if ($('#hsts').is(':checked')) {
            $('#ex-time-span').show();
            $('#hsts-dir-span').show();
        }
        if (!$('#hsts').is(':checked')) {
            $('#ex-time-span').hide();
            $('#hsts-dir-span').hide();
        }
    });
    $("#hsts").trigger('change');

    $("#erelative").change(function () {
        if ($('#erelative').val() == 'yes') {
            $('.protocol').hide();
        }
        if ($('#erelative').val() == 'no') {
            $('.protocol').show();
        }
    });
    $("#erelative").trigger('change');

    $("#ecomment").change(function () {
        if ($('#ecomment').val() == 'yes') {
            $('.cl-html-comments').hide();
            $('#html-comments').prop('checked', false);
        }
        if ($('#ecomment').val() == 'no') {
            $('.cl-html-comments').show();
        }
    });
    $("#ecomment").trigger('change');

    $("#feed-disable").click(function () {
        $('#changetrigger').val('yes');
    });
    $("#feed-disable").trigger('change');

    $(".coffee-amt").change(function() {
        var btn = $('.buy-coffee-btn');
        btn.attr('href', btn.data('link') + $(this).val());
    });
    $(".coffee-amt").trigger('change');

    if ( location.href.match(/page\=easy-header-footer#meta/ig) ) {

        $("#ehf-disable").hide();
        $("#ehf-security").hide();
        $("#ehf-script").hide();
        $("#ehf-header-footer").hide();
        $("#ehf-minify").hide();
        $("#ehf-tools").hide();

    } else if ( location.href.match(/page\=easy-header-footer#disable/ig) ) {

        $("#btn1").removeClass("active");
        $("#btn2").addClass("active");
        $("#ehf-remove").hide();
        $("#ehf-disable").show();
        $("#ehf-security").hide();
        $("#ehf-script").hide();
        $("#ehf-header-footer").hide();
        $("#ehf-minify").hide();
        $("#ehf-tools").hide();

    } else if ( location.href.match(/page\=easy-header-footer#security/ig) ) {

        $("#btn1").removeClass("active");
        $("#btn3").addClass("active");
        $("#ehf-remove").hide();
        $("#ehf-disable").hide();
        $("#ehf-security").show();
        $("#ehf-script").hide();
        $("#ehf-header-footer").hide();
        $("#ehf-minify").hide();
        $("#ehf-tools").hide();

    } else if( location.href.match(/page\=easy-header-footer#script/ig) ) {

        $("#btn1").removeClass("active");
        $("#btn4").addClass("active");
        $("#ehf-remove").hide();
        $("#ehf-disable").hide();
        $("#ehf-security").hide();
        $("#ehf-script").show();
        $("#ehf-header-footer").hide();
        $("#ehf-minify").hide();
        $("#ehf-tools").hide();

    } else if( location.href.match(/page\=easy-header-footer#header-footer/ig) ) {

        $("#btn1").removeClass("active");
        $("#btn5").addClass("active");
        $("#ehf-remove").hide();
        $("#ehf-disable").hide();
        $("#ehf-security").hide();
        $("#ehf-script").hide();
        $("#ehf-header-footer").show();
        $("#ehf-minify").hide();
        $("#ehf-tools").hide();

    } else if( location.href.match(/page\=easy-header-footer#minify/ig) ) {

        $("#btn1").removeClass("active");
        $("#btn6").addClass("active");
        $("#ehf-remove").hide();
        $("#ehf-disable").hide();
        $("#ehf-security").hide();
        $("#ehf-script").hide();
        $("#ehf-header-footer").hide();
        $("#ehf-minify").show();
        $("#ehf-tools").hide();

    } else if( location.href.match(/page\=easy-header-footer#tools/ig) ) {

        $("#btn1").removeClass("active");
        $("#btn7").addClass("active");
        $("#ehf-remove").hide();
        $("#ehf-disable").hide();
        $("#ehf-security").hide();
        $("#ehf-script").hide();
        $("#ehf-header-footer").hide();
        $("#ehf-minify").hide();
        $("#ehf-tools").show();

    }

});