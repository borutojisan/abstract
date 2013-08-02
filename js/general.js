$(document).ready(function() {
	
	$('input[name=usr_passs]').passStrengthify();
	$('input[name=usr_pass2s]').passStrengthify();
	$( ".datepicker" ).datepicker(
	{	'regional':'MY',	
		"altField": ".datepicker-alt",
		"altFormat": "yy-mm-dd",
		"dateFormat":'DD, d MM, yy',
		
	});
	
$('.datatable').dataTable( {
					"fnDrawCallback": function ( oSettings ) {
						var that = this;

						/* Need to redo the counters if filtered or sorted */
						if ( oSettings.bSorted || oSettings.bFiltered )
						{
							this.$('td:first-child', {"filter":"applied"}).each( function (i) {
								that.fnUpdate( i+1, this.parentNode, 0, false, false );
							} );
						}
					},
					"aoColumnDefs": [
						{ "bSortable": false, "aTargets": [ 0 ] }
					]
				} );
				
				
				$('.carousel').carousel()

});

