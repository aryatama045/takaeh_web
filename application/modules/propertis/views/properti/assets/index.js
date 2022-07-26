var manageTable;

$(document).ready(function() {

    // initialize the datatable
    manageTable = $('#manageTable').DataTable({
        'processing': true,
        'serverSide': true,
        'scrollX': true,
        'ajax': {
            'url': base_url + 'propertis/properti/fetchDataProperti',
            'type': 'POST',
        },
        'order': [0, 'DESC'],
        'columnDefs': [{
                targets: 0,
                className: 'text-left'
            },
        ]
    });
    // $("#manageTable_filter").css("display", "none");

    $('.search-input-text').on('keyup', function(event) { // for text boxes
        var i = $(this).attr('data-column'); // getting column index
        var v = $(this).val(); // getting search input value
        var keycode = event.which;
        if (keycode == 13) {
            manageTable.columns(i).search(v).draw();
        }
    });
    $('.search-input-select').on('change', function() { // for select box
        var i = $(this).attr('data-column');
        var v = $(this).val();
        manageTable.columns(i).search(v).draw();
    });

});

function remove(id) {
    //Ajax Load data from ajax
    $.ajax({
        url: base_url + 'propertis/properti/get_data/' + id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('[name="id_properties"]').val(data.id_properties);
            $('[name="properties_title"]').val(data.properties_title);
            $('#Remove').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Data Remove '); // Set title to Bootstrap modal title

        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
};