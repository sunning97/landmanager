$(document).ready(function() {

    $(document).on('click','.edit_data',function(){
        var id_user = $(this).attr('id');
        $.ajax( {
                url: 'modules/user/users-ajax.php',
                type: 'post',
                data:{id_user:id_user},
                dataType: 'json',
                success: function ( result ) {
                    $.each( result, function ( key, item ) {
                        $("#user_id").val(item[ 'user_id' ] );	 
                        $("#user_name").val(item[ 'user_name' ] );
                        $("#user_email").val(item[ 'user_email' ] );
                        $("#user_address").val(item[ 'user_address' ] );
                        $("#user_birth_date").val(item[ 'user_birth_date' ] );
                        $("#user_phone").val(item[ 'user_phone' ] );
                        $("#user_sex").val(item[ 'user_sex' ] );
                        $("#user_type").val(item[ 'user_type_id' ] );
                    } );
                }
            } );
    });

    $(document).on('click','.view_data',function(){
        var id_user = $(this).attr('id');
        $.ajax( {
                url: 'modules/user/users-ajax.php',
                type: 'post',
                data:{id_user:id_user},
                dataType: 'json',
                success: function ( result ) {
                    $.each( result, function ( key, item ) {
                        $("div.name").text(item[ 'user_name' ] );
                        if(item[ 'user_sex' ] == 1) sex = 'Nam'; else sex = 'Nữ';
                        $("div.sex").text(sex);
                        $("div.phone").text(item[ 'user_phone' ] );
                        $("div.email").text(item[ 'user_email' ] );
                        $("div.address").text(item[ 'user_address' ] );
                        
                        // format date
                        date = new Date(item[ 'user_birth_date' ]);
                        if(date.getDate() < 10)  var dd = '0'+(date.getDate()); else dd = date.getDate();
                        if((date.getMonth()+1) < 10) var MM = '0'+(date.getMonth()+1); else MM = (date.getMonth()+1);
                        $("div.birth_date").text(dd + '/' + MM + '/' +  date.getFullYear());
                    } );
                }
            } );
    });

    $(document).on('click','.delete_data',function(){
        $('_id').slideUp();
        var id_user = $(this).attr('id');
        $("#_id").val(id_user);   
    });

});