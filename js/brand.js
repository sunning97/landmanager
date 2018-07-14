$(document).ready(function() {
    $('#_noitice_add').slideUp(0);
    $('#_noitice_add_2').slideUp(0);
    $('#_noitice_edit').slideUp(0);
    $('#_noitice_edit_2').slideUp(0);

    $(document).on('click','.edit_brand',function(){
        $('#uploadPreview_edit').attr('src','').slideUp(0);
        $('#product_brand_logo_edit').val(null);
        var id_brand = $(this).attr('id');
        $.ajax( {
            url: '../admincp/modules/brand/brand-ajax.php',
            type: 'post',
            data:{id_brand:id_brand},
            dataType: 'json',
            success: function ( resultt ) {
                $.each( resultt, function ( key, item ) {
                    $("#product_brand_name_edit").val(item[ 'product_brand_name' ] );
                    $("#product_brand_id_edit").val(item[ 'product_brand_id' ] );
                } );
            }
        } );

    });

    $(document).on('click','.delete_brand',function(){

        var id_brand = $(this).attr('id');
        $("#_id").val(id_brand);

    });
    
    $(document).on('click','button#_add',function () {
        let name = $('#product_brand_name_add').val();
        let length = $('#product_brand_logo_add').get(0).files.length;
        if(name.length < 2 && length == 0){
            $('#_noitice_add').text('**Vui lòng nhập tên > 2 ký tự').css({'color':'red','fontSize':'14px'}).slideDown();
            $('#_noitice_add_2').text('**Vui lòng chọn tệp hình ảnh').css({'color':'red','fontSize':'14px'}).slideDown();
            return false;
        } else if(name.length < 2){
            $('#_noitice_add').text('**Vui lòng nhập tên > 2 ký tự').css({'color':'red','fontSize':'14px'}).slideDown();
            return false;
        } else if(length == 0){
            $('#_noitice_add_2').text('**Vui lòng chọn tệp hình ảnh').css({'color':'red','fontSize':'14px'}).slideDown();
            return false;
        }
    })

    $('#product_brand_name_add').focus(function () {
        $('#_noitice_add').slideUp();
    })

    $('#product_brand_logo_add').on('change',function () {
        $('#uploadPreview_add').slideDown();
        $('#_noitice_add_2').slideUp();
    })

    $(document).on('click','#_edit',function () {
        let name = $('#product_brand_name_edit').val();
        let length = $('#product_brand_logo_edit').get(0).files.length;

        if(name.length < 2 && length == 0){
            $('#_noitice_edit').text('**Vui lòng nhập tên > 2 ký tự').css({'color':'red','fontSize':'14px'}).slideDown();
            $('#_noitice_edit_2').text('**Vui lòng chọn tệp hình ảnh').css({'color':'red','fontSize':'14px'}).slideDown();
            return false;
        } else if(name.length < 2){
            $('#_noitice_edit').text('**Vui lòng nhập tên > 2 ký tự').css({'color':'red','fontSize':'14px'}).slideDown();
            return false;
        } else if (length ==0){
            $('#_noitice_edit_2').text('**Vui lòng chọn tệp hình ảnh').css({'color':'red','fontSize':'14px'}).slideDown();
            return false;
        }
    })

    $('#product_brand_name_edit').focus(function () {
        $('#_noitice_edit').slideUp();
    })


    $('#product_brand_logo_edit').on('change',function () {
        $('#uploadPreview_edit').slideDown();
        $('#_noitice_edit_2').slideUp();
    })

    $('#_qwe').click(function () {
        $('#uploadPreview_add').attr('scr','').slideUp(0);
        $('#product_brand_logo_add').val(null);
    })


});