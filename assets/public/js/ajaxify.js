$(function(){
    'use strict';
    $.ajax({
        url: clientData.publicAjaxifyUrl,
        data: {},
        type: 'POST',
        dataType: 'JSON',
        cache: false,
        //success: function (response) {}
    });

    if($('body.public-view').length){
		$.ajax({
			url: clientData.publicStatUrl,
			data: {},
			type: 'POST',
			dataType: 'JSON',
			cache: false,
			//success: function (response) {}
		});
	}

    if($('body.evaluation-single-view').length){
		$.ajax({
			url: clientData.publicEvaluationStatUrl,
			data: {
				evaluation_id:clientData.evaluation_id
			},
			type: 'POST',
			dataType: 'JSON',
			cache: false,
			//success: function (response) {}
		});
	}



});
