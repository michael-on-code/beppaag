$(function(){
    'use strict';
    console.log(clientData);
    $.ajax({
        url: clientData.publicAjaxifyUrl,
        data: {},
        type: 'POST',
        dataType: 'JSON',
        cache: false,
        success: function (response) {
            console.log(response);
        }
    });

});
