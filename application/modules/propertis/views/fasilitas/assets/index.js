var manageTable;

$(document).ready(function() {

    // initialize the datatable
    manageTable = $('#manageTable').DataTable({
        'processing': true,
        'serverSide': true,
        'scrollX': true,
        'ajax': {
            'url': base_url + 'propertis/fasilitas/fetchDataFasilitas',
            'type': 'POST',
        },
        'order': [0, 'ASC'],
        'columnDefs': [{
                targets: 1,
                className: 'text-center'
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

function edit(id) {
    //Ajax Load data from ajax
    $.ajax({
        url: base_url + 'propertis/fasilitas/get_data_edit/' + id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('[name="id_fasilitas"]').val(data.id_fasilitas);
            $('[name="nama"]').val(data.nama);
            $('#Edit').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Data Edit '); // Set title to Bootstrap modal title

        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
};


function remove(id) {
    //Ajax Load data from ajax
    $.ajax({
        url: base_url + 'propertis/fasilitas/get_data_edit/' + id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('[name="id_fasilitas"]').val(data.id_fasilitas);
            $('[name="nama"]').val(data.nama);
            $('#Remove').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Data Remove '); // Set title to Bootstrap modal title

        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
};