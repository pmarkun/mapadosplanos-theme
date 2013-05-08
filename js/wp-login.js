jQuery(document).ready(function () {
	jQuery("#loginform :input").prop("disabled", "disabled");
	var termodeuso;
	termodeuso = jQuery('<input id="termo-checkbox" type="checkbox" NAME="termo-de-uso" VALUE="agree">');
	termodeuso.click(function ()
            {
                if (!jQuery(this).attr("checked")) {
                    jQuery("#loginform :input").prop("disabled", "disabled");
                    jQuery(this).removeAttr("disabled");
                }
                else {
                    jQuery("#loginform :input").removeAttr("disabled");
                    jQuery(this).removeAttr("disabled");
                }
            });

	jQuery(".forgetmenot").append("<p><label id='termo-label' for='termo-de-uso'>Aceitar <a href='/termo-de-uso'>termo de uso</a></label></p>");
	jQuery("#termo-label").prepend(termodeuso);
});