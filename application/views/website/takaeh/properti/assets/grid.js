$(document).ready(function() {
    alert('tes');

    filter_data(1);

    function filter_data(page) {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
        var title = $('#title').val();
        var tipe = $('#tipe').val();
        var lokasi = $('#lokasi').val();



        // var ram = get_filter('ram');
        // var storage = get_filter('storage');
        $.ajax({
            url: base_url + "takaeh/properti/fetch_data/" + page,
            method: "POST",
            dataType: "JSON",
            data: { action: action, title: title, lokasi: lokasi, tipe: tipe, },
            success: function(data) {
                $('.filter_data').html(data.properti_list);
                $('#pagination_link').html(data.pagination_link);
            }
        })
    }

    function get_filter(class_name) {
        var filter = [];
        $('.' + class_name + ':checked').each(function() {
            filter.push($(this).val());
        });
        return filter;
    }

    $(document).on('click', '.pagination li a', function(event) {
        event.preventDefault();
        var page = $(this).data('ci-pagination-page');
        filter_data(page);
    });

    $('.common_selector').click(function() {
        filter_data(1);
    });

    $('#price_range').slider({
        range: true,
        min: 1000,
        max: 65000,
        values: [1000, 65000],
        step: 500,
        stop: function(event, ui) {
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_data(1);
        }

    });

});