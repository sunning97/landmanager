$(document).ready(function () {

    $('.dropify').dropify();

    
    $('.delete_land').on('click',function () {
        let id = $(this).attr('id');
        console.log(id);
    })
});