window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 7000);

// datatable ordenin disabled
$('#tabla').dataTable( {
	"ordering": true,

	language: {
        url: '//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json'
    }
} );

// datatable ordenin disabled
$('#tabla2').dataTable( {
	"order": [[ 0, "asc" ]],

	language: {
        url: '//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json'
    }
} );

