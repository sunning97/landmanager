$(document).ready(function() {
    $(document).on('click','.delete_data',function(){

        var id_product = $(this).attr('id');
        $("#_id").val(id_product);
    });
});