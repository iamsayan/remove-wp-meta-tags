jQuery(document).ready(function(){
    jQuery("#btn1").click(function(){
       jQuery("#plugin-remove").show();
       jQuery("#plugin-disable").hide();
       jQuery("#plugin-security").hide();
       jQuery("#plugin-extra").hide();
       jQuery("#plugin-header-footer").hide();
       jQuery("#plugin-other").hide();

    });

    jQuery("#btn2").click(function(){
        jQuery("#plugin-remove").hide();
        jQuery("#plugin-disable").show();
        jQuery("#plugin-security").hide();
        jQuery("#plugin-extra").hide();
        jQuery("#plugin-header-footer").hide();
        jQuery("#plugin-other").hide();
 
    });

    jQuery("#btn3").click(function(){
        jQuery("#plugin-remove").hide();
        jQuery("#plugin-disable").hide();
        jQuery("#plugin-security").show();
        jQuery("#plugin-extra").hide();
        jQuery("#plugin-header-footer").hide();
        jQuery("#plugin-other").hide();
 
    });

    jQuery("#btn4").click(function(){
        jQuery("#plugin-remove").hide();
        jQuery("#plugin-disable").hide();
        jQuery("#plugin-security").hide();
        jQuery("#plugin-extra").show();
        jQuery("#plugin-header-footer").hide();
        jQuery("#plugin-other").hide();
 
    });

    jQuery("#btn5").click(function(){
        jQuery("#plugin-remove").hide();
        jQuery("#plugin-disable").hide();
        jQuery("#plugin-security").hide();
        jQuery("#plugin-extra").hide();
        jQuery("#plugin-header-footer").show();
        jQuery("#plugin-other").hide();
 
    });

    jQuery("#btn6").click(function(){
        jQuery("#plugin-remove").hide();
        jQuery("#plugin-disable").hide();
        jQuery("#plugin-security").hide();
        jQuery("#plugin-extra").hide();
        jQuery("#plugin-header-footer").hide();
        jQuery("#plugin-other").show();
 
    });

});