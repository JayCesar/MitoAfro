(function ($) {
    "use strict";


    /*==================================================================
    [ Focus Contact2 ]*/
    $('.input2').each(function(){
        $(this).on('blur', function(){
            if($(this).val().trim() != "") {
                $(this).addClass('has-val');
            }
            else {
                $(this).removeClass('has-val');
            }
        })
    })
            
    // AJAX
    $('.form').submit(function(){
        $('.loading').html("<img src='../../img/loading.gif' width='30px' style='position: absolute; bottom: 10px; margin-left: 15px;'>");
        $.ajax({
            url: 'validar.php',
            type: 'POST',
            data: $('.form').serialize(),
            success: function(data){
                $('.mostrar').html(data);
                $('form')[0].reset();
            }
        });
        return false;
    });

	
})(jQuery);