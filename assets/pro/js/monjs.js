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

    if($('div.dropdown-menu.pop-profile')){
        $('div.dropdown-menu.pop-profile > a').each(function () {
            if($(this).attr('href')==pageUrl){
                $(this).addClass('active');
            }
        });
    }


    if ($('.select2').length) {
        $('.select2').select2({
            placeholder: 'Sélectionner',
            //searchInputPlaceholder: 'Rechercher'
        });
    }

    if ($('[required]').length) {
        $('input[required], select[required], textarea[required]').each(function () {
            $(this).parents('.form-group').find('label:not(.empty)').append(" <span style='color: red'>*</span>");
        });
    }

    if ($('.my-summernote').length) {
        $('.my-summernote').summernote({
            lang: 'fr-FR',
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph', 'style']],
                ['height', ['height']],
                ['insert', ['link']],
            ],
            height: 130
        });
    }

    //var validationRules = {};
    //FORM Validation
    if($('form#form-validation').length){
        var validateObj = $( "form#form-validation" ).validate({
            ignore: '.ignore',
            errorElement: 'span',
            errorClass: 'is-invalid',
            validClass: 'is-valid',
            rules: validationRules,
            invalidHandler: function(event, validator) {
                // 'this' refers to the form
                var closestInvalid = validator.errorList[0].element;
                var tabePane = $(closestInvalid).parents('.tab-pane');
                var closestTabePaneID = tabePane.attr('id');
                var openedNavLink = $(this).find('.nav-link.active');
                var navlink = $(this).find('.nav-link#'+closestTabePaneID+'_tab');
                if(openedNavLink != navlink){
                    navlink.addClass('tab-with-error');
                    setTimeout(function () {
                        navlink.removeClass('tab-with-error');
                    }, 2000)
                    /*var targetID = openedNavLink.attr('aria-controls');
                    var openedTabePane = $(this).find('.tab-pane#'+targetID);
                    openedNavLink.removeClass('active');
                    navlink.addClass('active');
                    openedTabePane.addClass('fade');
                    openedTabePane.removeClass('show open active');
                    tabePane.addClass('show open active');*/
                }
                console.log(navlink);
            },
            submitHandler: function(form) {
                // do other things for a valid form
                $(form).find('button[type=submit]').addClass('is-loading');
                form.submit();
            }
        });
        $('.select2').on('change', function (e) {
            validateObj.form();
        });

        $(".my-summernote").on("summernote.change", function (e) {   // callback as jquery custom event
            validateObj.form();
        });
    }


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
                    var fileExists = this.files && this.files[0];
                    if (fileExists) {
                        //check first if extensions is valid because of Dropify Bug
                        var fileStringExplode = this.files[0].name.split('.');
                        var extension = fileStringExplode[(fileStringExplode.length)-1];
                        var allowedExtensions = dropifyInput.attr('data-allowed-file-extensions');
                        if(allowedExtensions.indexOf(extension) === -1){
                            return;
                        }
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

    if($('.toast').length){
        $('.toast').toast('show')
    }

    if($('.form-error').length){
        $('.form-error').prev('input, textarea, select').focus(function(){
            $(this).next('.form-error').fadeOut('slow');
            return false;
        });
    }

    $(document).on('click', 'form button.clear-form', function () {
        var form = $(this).parents('form');
        form.find('textarea, input').each(function () {
            $(this).val('')
        });
        form.find('select').each(function () {
            $(this).val('').trigger('change')
        });
        form.find('.my-summernote').each(function () {
            $(this).summernote('code', '')
        });
        form.find('.dropify-clear').each(function () {
            $(this).trigger('click');
        });
        form.find('.my-file-preview-btn').each(function () {
            $(this).fadeOut();
        })
    });

    if ($('.my-datatable').length) {
        var table = $('.my-datatable').DataTable({
            columnDefs: [{
                'targets': [0], /* column index */
                'orderable': false, /* true or false */
            }],
            //stateSave: true,
            info: true,
            stripe: true,
            ordering: $('.my-datatable').hasClass('isOrdered'),
            lengthChange: true,
            language: {
                processing: "Traitement en cours...",
                search: "Rechercher&nbsp;:&nbsp;",
                lengthMenu: "Afficher _MENU_ &eacute;l&eacute;ments",
                info: "Affichage de <strong>_END_</strong> éléments sur <strong>_TOTAL_</strong> éléments",
                infoEmpty: "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
                infoFiltered: "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                infoPostFix: "",
                loadingRecords: "Chargement en cours...",
                zeroRecords: "Aucun &eacute;l&eacute;ment &agrave; afficher",
                emptyTable: "Aucune donnée disponible dans le tableau",
                paginate: {
                    first: "Premier",
                    previous: "Pr&eacute;c",
                    next: "Suiv",
                    last: "Dernier"
                },
                aria: {
                    sortAscending: ": activer pour trier la colonne par ordre croissant",
                    sortDescending: ": activer pour trier la colonne par ordre décroissant"
                }
            }
        });


        $('a.toggle-vis').on('click', function (e) {
            e.preventDefault();

            // Get the column API object
            var column = table.column($(this).attr('data-column'));

            // Toggle the visibility
            column.visible(!column.visible());
        });
    }
});
