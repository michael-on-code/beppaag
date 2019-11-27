
$(function(){
    'use strict';
    $('form').submit(function(e){
        e.preventDefault();
        $(this).find('button[type=submit]').addClass('is-loading');
        $(this).unbind('submit').submit()
    });
    if($('.form-error').length){
        $('.form-error').prev('input, textarea, select').focus(function(){
            $(this).next('.form-error').fadeOut('slow');
            return false;
        });
    }
    if($('.toast').length){
        $('.toast').toast('show')
    }

    if($('.form-error').length){
        $('.form-error').parents('.form-group').find('input, textarea, select').focus(function(){
            $(this).parents('.form-group').find('.form-error').fadeOut('slow');
            return false;
        });
    }

});
