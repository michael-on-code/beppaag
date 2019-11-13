$(function () {
    'use strict';
    var pageUrl = window.location.href.split(/[?#]/)[0];
    if ($('div.side-nav').length) {
        $("div.side-nav ul li").each(function () {
            var grandParent = $(this);
            if($(this).hasClass('dropdown')){
                var submenus = $(this).find('ul.dropdown-menu li');
                submenus.each(function () {
                    if($(this).hasClass('dropdown')){
                        var parent = $(this);
                        var childSubmenus = $(this).find('ul.dropdown-menu li');
                        childSubmenus.each(function () {
                            var myHref = $(this).find('a').attr('href');
                            if( myHref == pageUrl || (pageUrl.indexOf(myHref) !== -1 && myHref !== parent.attr('href'))){
                                $(this).addClass("active open"); // add active to a
                                parent.addClass('open');
                                grandParent.addClass('open');
                            }
                        })
                    }else{
                        var myHref = $(this).find('a').attr('href');
                        if( myHref == pageUrl){
                            $(this).addClass("active open"); // add active to a
                            grandParent.addClass('open');
                        }
                    }
                })
            }else{
                var myHref = $(this).find('a').attr('href');
                if( myHref == pageUrl){
                    $(this).addClass("active"); // add active to a
                }
            }
        });
    }

    if ($('input[required]').length) {
        $('input[required], select[required], textarea[required]').each(function () {
            $(this).parents('.form-group').find('label:not(.empty)').append(" <span style='color: red'>*</span>");
        });
    }

    //var validationRules = {};
    //FORM Validation
    $( "form" ).validate({
        ignore: ':hidden:not(:checkbox), .ignore',
        errorElement: 'div',
        errorClass: 'is-invalid',
        validClass: 'is-valid',
        rules: validationRules,
        submitHandler: function(form) {
            // do other things for a valid form
            $(form).find('button[type=submit]').addClass('is-loading');
            form.submit();
        }
    });

    //Dropify
    if ($('.dropify').length) {
        var myDropify = $('.dropify').dropify({
            messages: {
                default: 'Glissez / déposez un fichier ici ou cliquez ici',
                replace: 'Glissez / déposez un fichier ou cliquez ici pour remplacer',
                remove: 'Enlever',
                error: 'Ooops, une erreur a été rencontrée'
            },
            error: {
                'fileSize': 'Le ficher est trop volumineux | {{ value }} max.',
                'fileExtension': "Le format du fichier n'est pas autorisé | {{ value }} autorisé."
            }
        });

        myDropify.each(function () {
            if ($(this).hasClass('auto-upload')) {
                $(this).on('change', function () {
                    var data = {};
                    var dropifyInput = $(this);
                    var currentForm = dropifyInput.parents('form');
                    var currentFormGroup = dropifyInput.parents('.form-group');
                    var submitBtn = currentForm.find('button[type=submit]');
                    if (this.files && this.files[0]) {
                        var fd = new FormData();
                        var target = dropifyInput.attr('data-target');
                        var targetName = dropifyInput.attr('data-target-name');
                        fd.append(target, this.files[0]);
                        fd.append('name', target);
                        fd.append(clientData.csrf_token_name, clientData.csrf_hash);
                        $.ajax({
                            url: clientData.uploadUrl,
                            processData: false,
                            contentType: false,
                            data: fd,
                            type: 'POST',
                            dataType: 'JSON',
                            cache: false,
                            beforeSend: function () {
                                dropifyInput.addClass('upload-on-progress');
                                submitBtn.attr('disabled', true);
                                currentFormGroup.find('label').append(' <span data-toggle="tooltip" data-placement="top" ' +
                                    'title="Upload en cours" class="upload-spinner" role="status" aria-hidden="true">' +
                                    '<i class="anticon anticon-loading"></i></span>');
                            },
                            error: function () {
                                alert('Ooops... Une erreur a été rencontrée');
                            },

                            success: function (response) {
                                //console.log(response);
                                if (response.status) {
                                    clientData.csrf_token_name = response.csrf_token_name;
                                    clientData.csrf_hash = response.csrf_hash;
                                    $('input[name="' + targetName + '"]').val(response.fileName);
                                    var previewBtn = currentFormGroup.find('.my-file-preview-btn');
                                    previewBtn.attr('href', clientData.uploadPath + response.fileName);
                                    dropifyInput.removeClass('upload-on-progress');
                                    currentFormGroup.find('label span.upload-spinner').fadeOut();
                                    currentFormGroup.find('label span.upload-spinner').remove();
                                    previewBtn.fadeIn();
                                    if (currentForm.find('.upload-on-progress').length < 1) {
                                        submitBtn.removeAttr('disabled')
                                    }
                                }
                            }
                        });
                    }
                });
            }
        });
        myDropify.on('dropify.beforeClear', function (event, element) {
            var $this = $(element.element);
            $this.parents('.form-group').find('input[type=hidden]').val('');
            $this.parents('.form-group').find('.my-file-preview-btn').fadeOut();
        });
    }
});
