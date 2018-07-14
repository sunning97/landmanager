$(document).ready(function () {
    fetch_firts(1);

    $(document).on('click', '.edit_data', function () {

        var id_product_category = $(this).attr('id');
        $.ajax({
            url: '../admincp/modules/land-category/land-category-ajax.php',
            type: 'post',
            data: {id_product_category: id_product_category},
            dataType: 'json',
            success: function (resultt) {
                $.each(resultt, function (key, item) {
                    $("#product_category_id").val(item['product_category_id']);
                    $("#product_category_name").val(item['product_category_name']);
                    $("#product_category_super").val(item['product_category_super_id']);
                });
            }
        });
    });


    $(document).on('click', '.delete_data', function () {
        var id_product_category = $(this).attr('id');
        $("#_id").val(id_product_category);
    });

    $('.dropdown-menu a').on('click', function () {
        $('button#select_category').text($(this).text());

        let id_product_category = $(this).data('product_id');

        $.ajax({
            url: '../admincp/modules/land-category/land-category-ajax.php',
            type: 'post',
            data: {id_product_category_selected: id_product_category},
            dataType: 'text',
            success: function (resultt) {
                let output = resultt.replace(/(\r\n|\n|\r)/gm, "");
                $('#_display_table').html(output);
            }
        });
    })

    function fetch_firts(n) {
        let id_product_category = n;

        $.ajax({
            url: '../admincp/modules/land-category/land-category-ajax.php',
            type: 'post',
            data: {id_product_category_selected: id_product_category},
            dataType: 'text',
            success: function (resultt) {
                let output = resultt.replace(/(\r\n|\n|\r)/gm, "");
                $('#_display_table').html(output);

            }
        });
    }
});