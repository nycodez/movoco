<?php
	date_default_timezone_set('America/New_York');
	$month = date("m");
	$year = date("Y");
	$day = date("d");
?>
var today = "<?php echo date("Y") .'-'. date("n") .'-'. date("j"); ?>";

$(document).ready(function() {

		$(function() {
			$( ".datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
			});
		});

function toggleDiv(name) {
	$('#'+name).toggle();
}
function confirmDelete(delUrl) {
	if (confirm("Are you sure you want to delete this contact record?")) {
		document.location = delUrl;
	}
}
