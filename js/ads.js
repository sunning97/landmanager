$(document).ready(function(){
    $('#_noitice_add').slideUp(0);
    $('#_noitice_add_2').slideUp(0);
    $('#_noitice_edit').slideUp(0);
    $('#_noitice_edit_2').slideUp(0);
    $('#_noitice_edit_slide').slideUp(0);
    $('#_noitice_edit_slide_2').slideUp(0);
//ads

    $(document).on('click','.edit_data',function(){
        var id_ads = $(this).attr('id');

        $.ajax( {
            url: '../admincp/modules/ads/ads-ajax.php',
            type: 'post',
            data:{id_ads:id_ads},
            dataType: 'text',
            success: function ( resultt ) {
                $("#ads_url_edit").val(resultt);
                $("#ads_id_edit").val(id_ads);
            }
        } );

    });

    $('#_edit_ads').click(function () {
        let ads_url = $('#ads_url_edit').val();
        let length = $('#ads_image_edit').get(0).files.length;

        if(length == 0 && !check_url(ads_url)){
            $('#_noitice_edit').text('**Vui lòng chọn tệp hình ảnh').css({'color':'red','fontSize':'14px'}).slideDown();
            $('#_noitice_edit_2').text('**Vui lòng nhập vào đúng định dạng URL').css({'color':'red','fontSize':'14px'}).slideDown();
            return false;
        } else if(!check_url(ads_url)){
            $('#_noitice_edit_2').text('**Vui lòng nhập vào đúng định dạng URL').css({'color':'red','fontSize':'14px'}).slideDown();
            return false;
        } else if (length == 0){
            $('#_noitice_edit').text('**Vui lòng chọn tệp hình ảnh').css({'color':'red','fontSize':'14px'}).slideDown();
            return false;
        }
    })
    
    $('#ads_url_edit').focus(function () {
        $('#_noitice_edit_2').slideUp();
    })

    $('#ads_image_edit').on('change',function () {
        $('#_noitice_edit').slideUp();
    })

//slide
    $(document).on('click','.view_data_slide',function(){
        var id_slide = $(this).attr('id');
        $.ajax( {
            url: '../admincp/modules/ads/ads-ajax.php',
            type: 'post',
            data:{id_slide:id_slide},
            dataType: 'json',
            success: function ( result ) {
                $.each( result, function ( key, item ) {
                    $("#content_1").text(item.content_1);
                    $("#content_2").text(item.content_2);
                    $("#content_3").text(item.content_3);
                    $("#content_4").text($.number(item.content_4)+'đ');
                    $("#content_5").text(item.content_5);
                    $("#url_slide").text(item.url);
                    $("#side_image").html('<img style="width: 100%;height: 100%" src="../uploads/slider/'+item.image_slide+'" alt="Card image">');
                } );
            }
        } );

    });

    $(document).on('click','.edit_data_slide',function(){
        var id_slide = $(this).attr('id');
        $.ajax( {
            url: '../admincp/modules/ads/ads-ajax.php',
            type: 'post',
            data:{id_slide_edit:id_slide},
            dataType: 'json',
            success: function ( result ) {
                $.each( result, function ( key, item ) {
                    $("#edit_content_1").val(item.content_1);
                    $("#edit_content_2").val(item.content_2);
                    $("#edit_content_3").val(item.content_3);
                    $("#edit_content_4").val(parseInt(item.content_4));
                    $("#edit_content_5").val(item.content_5);
                    $("#edit_url_slide").val(item.url);
                    $("#slide_id").val(item.slide_id);
                } );
            }
        } );

    });


    $('#_edit_slide').click(function () {
        let length = $("#slide_image_edit").get(0).files.length;
        let url = $('#edit_url_slide').val();

        if(length == 0 && !check_url(url)){
            $('#_noitice_edit_slide').text('**Vui lòng nhập vào đúng định dạng URL').css({'color':'red','fontSize':'14px'}).slideDown();
            $('#_noitice_edit_slide_2').text('**Vui lòng chọn tệp hình ảnh').css({'color':'red','fontSize':'14px'}).slideDown();
            return false;
        } else if(length == 0){
            $('#_noitice_edit_slide_2').text('**Vui lòng chọn tệp hình ảnh').css({'color':'red','fontSize':'14px'}).slideDown();
            return false;
        } else if(!check_url(url)){
            $('#_noitice_edit_slide').text('**Vui lòng nhập vào đúng định dạng URL').css({'color':'red','fontSize':'14px'}).slideDown();
            return false;
        }

    })

    $('#slide_image_edit').on('change',function () {
        $('#_noitice_edit_slide_2').slideUp();
    })
    $('#edit_url_slide').focus(function () {
        $('#_noitice_edit_slide').slideUp();
    })

    function check_url(url) {
        var expression = /[-a-zA-Z0-9@:%_\+.~#?&//=]{2,256}\.[a-z]{2,4}\b(\/[-a-zA-Z0-9@:%_\+.~#?&//=]*)?/gi;
        var regex = new RegExp(expression);

        if (url.match(regex)) {
            return true;
        } else {
            return false;
        }

    }


});