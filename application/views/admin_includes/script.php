<title><?=(isset($title)) ? $title.' | PKH DIY'.date('Y') : 'PKH DIY'.date('Y');?></title>  

<link rel="icon" type="image/ico" href="<?=base_url()?>files/favicon.ico"/>
<link href="<?=base_url()?>assets/css/stylesheets.css" rel="stylesheet" type="text/css" />
<script src="<?=base_url()?>assets/jquery/jquery.js"></script>
<script src="<?=base_url()?>assets/jquery/global.js"></script>
<!-- validasi -->
<script src="<?=base_url()?>assets/jquery/valid.js"></script>
<!-- datatable -->
<script src="<?=base_url()?>assets/jquery/dt.js"></script>
<script src="<?=base_url()?>assets/jquery/dt_bt.js"></script>
<!-- modal -->
<script src="<?=base_url()?>assets/boostrap/js/bootstrap.js"></script>
<!-- datepicker -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/datepicker/jquery.ui.all.css">
<script src="<?php echo base_url()?>assets/jquery/datepicker/jquery.ui.core.js"></script>
<script src="<?php echo base_url()?>assets/jquery/datepicker/jquery.ui.datepicker.js"></script>
<script>
var base_url = '<?php echo base_url()?>'
$(function() {
	jQuery.browser = {};
	(function () {
	    jQuery.browser.msie = false;
	    jQuery.browser.version = 0;
	    if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
	        jQuery.browser.msie = true;
	        jQuery.browser.version = RegExp.$1;
	    }
	})();
	$( ".datepicker" ).datepicker({
		yearRange: "-35:-19",
		changeMonth: true,
		changeYear: true,
		dateFormat: "dd-mm-yy"
	});
});
</script>