jQuery(document).ready(function($){
    $('#button_car').on('click', function(e){
        e.prevendDefault;

        $.ajax({
            url: genius_ajax_script.ajaxurl,
            data:{
                'action' : 'genius_ajax_example',
                'nonce' : genius_ajax_script.nonce,
                'string_one' : genius_ajax_script.string_box,
                'string_two' : genius_ajax_script.string_new
            },
            success: function(data){
                $('#car_content').append(data);
            },
            error: function(errorThrown){
                console.log(errorThrown);
            }
        });
    });
});