$(function(){
    $('form').validate({
        rules: {
            'user_name' : {
                required:true
            },
            'user_phone' : {
                required:true
            },
            'user_email': {
                email:true
            }
        },
        errorPlacement: function(error, element) {},
        submitHandler: function(form) {
                        
            $.post('imail.php', $(form).serialize(), function(result){
                $('.success').fadeIn(300, function() {
                    $(this).fadeOut(10000);
                    $(form).trigger('reset');
                });
            });
            
            return false;
        }
    });
})