jQuery(document).ready(function($){
    
    $("#btn1").click(function(){
        $("#plugin-remove").fadeIn("slow");
        $("#plugin-disable").hide();
        $("#plugin-security").hide();
        $("#plugin-extra").hide();
        $("#plugin-header-footer").hide();
        $("#plugin-minify").hide();
        $("#plugin-misc").hide();
        $("#plugin-tools").hide();

    });

    $("#btn2").click(function(){
        $("#plugin-remove").hide();
        $("#plugin-disable").fadeIn("slow");
        $("#plugin-security").hide();
        $("#plugin-extra").hide();
        $("#plugin-header-footer").hide();
        $("#plugin-minify").hide();
        $("#plugin-misc").hide();
        $("#plugin-tools").hide();
 
    });

    $("#btn3").click(function(){
        $("#plugin-remove").hide();
        $("#plugin-disable").hide();
        $("#plugin-security").fadeIn("slow");
        $("#plugin-extra").hide();
        $("#plugin-header-footer").hide();
        $("#plugin-minify").hide();
        $("#plugin-misc").hide();
        $("#plugin-tools").hide();
 
    });

    $("#btn4").click(function(){
        $("#plugin-remove").hide();
        $("#plugin-disable").hide();
        $("#plugin-security").hide();
        $("#plugin-extra").fadeIn("slow");
        $("#plugin-header-footer").hide();
        $("#plugin-minify").hide();
        $("#plugin-misc").hide();
        $("#plugin-tools").hide();
 
    });

    $("#btn5").click(function(){
        $("#plugin-remove").hide();
        $("#plugin-disable").hide();
        $("#plugin-security").hide();
        $("#plugin-extra").hide();
        $("#plugin-header-footer").fadeIn("slow");
        $("#plugin-minify").hide();
        $("#plugin-misc").hide();
        $("#plugin-tools").hide();
 
    });

    $("#btn6").click(function(){
        $("#plugin-remove").hide();
        $("#plugin-disable").hide();
        $("#plugin-security").hide();
        $("#plugin-extra").hide();
        $("#plugin-header-footer").hide();
        $("#plugin-minify").fadeIn("slow");
        $("#plugin-misc").hide();
        $("#plugin-tools").hide();
 
    });

    $("#btn7").click(function(){
        $("#plugin-remove").hide();
        $("#plugin-disable").hide();
        $("#plugin-security").hide();
        $("#plugin-extra").hide();
        $("#plugin-header-footer").hide();
        $("#plugin-minify").hide();
        $("#plugin-misc").fadeIn("slow");
        $("#plugin-tools").hide();
 
    });

    $("#btn8").click(function(){
        $("#plugin-remove").hide();
        $("#plugin-disable").hide();
        $("#plugin-security").hide();
        $("#plugin-extra").hide();
        $("#plugin-header-footer").hide();
        $("#plugin-minify").hide();
        $("#plugin-misc").hide();
        $("#plugin-tools").fadeIn("slow");
 
    });

    $("#feed-disable").change(function () {
        if ($('#feed-disable').is(':checked')) {
            $('.cl-feed').hide();
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

    if ( location.href.match(/page\=easy-header-footer#meta/ig) ) {

        $("#plugin-disable").hide();
        $("#plugin-security").hide();
        $("#plugin-extra").hide();
        $("#plugin-header-footer").hide();
        $("#plugin-minify").hide();
        $("#plugin-misc").hide();
        $("#plugin-tools").hide();

    } else if ( location.href.match(/page\=easy-header-footer#disable/ig) ) {

        $("#btn1").removeClass("active");
        $("#btn2").addClass("active");
        $("#plugin-remove").hide();
        $("#plugin-disable").show();
        $("#plugin-security").hide();
        $("#plugin-extra").hide();
        $("#plugin-header-footer").hide();
        $("#plugin-minify").hide();
        $("#plugin-misc").hide();
        $("#plugin-tools").hide();

    } else if ( location.href.match(/page\=easy-header-footer#security/ig) ) {

        $("#btn1").removeClass("active");
        $("#btn3").addClass("active");
        $("#plugin-remove").hide();
        $("#plugin-disable").hide();
        $("#plugin-security").show();
        $("#plugin-extra").hide();
        $("#plugin-header-footer").hide();
        $("#plugin-minify").hide();
        $("#plugin-misc").hide();
        $("#plugin-tools").hide();

    } else if( location.href.match(/page\=easy-header-footer#privacy/ig) ) {

        $("#btn1").removeClass("active");
        $("#btn4").addClass("active");
        $("#plugin-remove").hide();
        $("#plugin-disable").hide();
        $("#plugin-security").hide();
        $("#plugin-extra").show();
        $("#plugin-header-footer").hide();
        $("#plugin-minify").hide();
        $("#plugin-misc").hide();
        $("#plugin-tools").hide();

    } else if( location.href.match(/page\=easy-header-footer#header-footer/ig) ) {

        $("#btn1").removeClass("active");
        $("#btn5").addClass("active");
        $("#plugin-remove").hide();
        $("#plugin-disable").hide();
        $("#plugin-security").hide();
        $("#plugin-extra").hide();
        $("#plugin-header-footer").show();
        $("#plugin-minify").hide();
        $("#plugin-misc").hide();
        $("#plugin-tools").hide();

    } else if( location.href.match(/page\=easy-header-footer#minify/ig) ) {

        $("#btn1").removeClass("active");
        $("#btn6").addClass("active");
        $("#plugin-remove").hide();
        $("#plugin-disable").hide();
        $("#plugin-security").hide();
        $("#plugin-extra").hide();
        $("#plugin-header-footer").hide();
        $("#plugin-minify").show();
        $("#plugin-misc").hide();
        $("#plugin-tools").hide();

    } else if( location.href.match(/page\=easy-header-footer#misc/ig) ) {

        $("#btn1").removeClass("active");
        $("#btn7").addClass("active");
        $("#plugin-remove").hide();
        $("#plugin-disable").hide();
        $("#plugin-security").hide();
        $("#plugin-extra").hide();
        $("#plugin-header-footer").hide();
        $("#plugin-minify").hide();
        $("#plugin-misc").show();
        $("#plugin-tools").hide();
        
    } else if( location.href.match(/page\=easy-header-footer#tools/ig) ) {

        $("#btn1").removeClass("active");
        $("#btn8").addClass("active");
        $("#plugin-remove").hide();
        $("#plugin-disable").hide();
        $("#plugin-security").hide();
        $("#plugin-extra").hide();
        $("#plugin-header-footer").hide();
        $("#plugin-minify").hide();
        $("#plugin-misc").hide();
        $("#plugin-tools").show();
        
    }

});