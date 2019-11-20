$(function () {
    'use strict';
    var pageUrl = window.location.href.split(/[?#]/)[0];
    if ($('div.side-nav').length) {
        $("div.side-nav ul li").each(function () {
            var grandParent = $(this);
            if ($(this).hasClass('dropdown')) {
                var submenus = $(this).find('ul.dropdown-menu li');
                submenus.each(function () {
                    if ($(this).hasClass('dropdown')) {
                        var parent = $(this);
                        var childSubmenus = $(this).find('ul.dropdown-menu li');
                        childSubmenus.each(function () {
                            var myHref = $(this).find('a').attr('href');
                            if (myHref == pageUrl || (pageUrl.indexOf(myHref) !== -1 && myHref !== parent.attr('href'))) {
                                $(this).addClass("active open"); // add active to a
                                parent.addClass('open');
                                grandParent.addClass('open');
                            }
                        })
                    } else {
                        var myHref = $(this).find('a').attr('href');
                        if (myHref == pageUrl) {
                            $(this).addClass("active open"); // add active to a
                            grandParent.addClass('open');
                        }
                    }
                })
            } else {
                var myHref = $(this).find('a').attr('href');
                if (myHref == pageUrl) {
                    $(this).addClass("active"); // add active to a
                }
            }
        });
    }

    if ($('div.dropdown-menu.pop-profile')) {
        $('div.dropdown-menu.pop-profile > a').each(function () {
            if ($(this).attr('href') == pageUrl) {
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

    if ($('[required], [fake-required]').length) {
        $('[required], [fake-required]').each(function () {
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
                        var sizeExplode = dropifyInput.attr('data-max-file-size').split('M');
                        var maxSize = parseInt(sizeExplode[0]) * 1024 * 1024;
                        if (maxSize < this.files[0].size) {
                            return;
                        }
                        //check first if extensions is valid because of Dropify Bug
                        var fileStringExplode = this.files[0].name.split('.');
                        var extension = fileStringExplode[(fileStringExplode.length) - 1];
                        var allowedExtensions = dropifyInput.attr('data-allowed-file-extensions');
                        if (allowedExtensions.indexOf(extension) === -1) {
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

    if ($('.toast').length) {
        $('.toast').toast('show')
    }

    if ($('.datepicker-input').length) {
        $.fn.datepicker.defaults.format = "dd/mm/yyyy";
        $.fn.datepicker.defaults.language = "fr";
        $('.datepicker-input').datepicker();
    }

    if ($('.form-error').length) {
        $('.form-error').prev('input, textarea, select').focus(function () {
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

    if ($('.my-complicated-datatable').length) {
        var complicatedTable = $('.my-complicated-datatable').DataTable({

            //stateSave: true,
            //Is a LifeSAVER
            drawCallback: function (settings) {
                var api = this.api();
                $('[data-toggle="tooltip"]', api.table().container()).tooltip();
            },
            //info: false,
            stripe: true,
            ordering: true,
            columnDefs: [{
                'targets': clientData.unOrderableColumns, /* column index */
                'orderable': false, /* true or false */
            }],
            aaSorting: [],
            //lengthChange: false,
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
        //Is a Life Saver
        complicatedTable.columns(clientData.invisiblesColumns).visible(false);
        $('select#columnToggle').on('change', function (e) {
            var column = complicatedTable.columns($(this).val());
            var allColumns = complicatedTable.columns(clientData.allColumns);
            allColumns.visible(false);
            column.visible(true, false);
            /*if ($('[data-toggle="tooltip"]').length) {
                $('[data-toggle="tooltip"]').tooltip()
            }*/
        });
    }

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
    }

    $(document).on('click', ".prompt", function (e) {
        e.preventDefault();
        var message = $(this).attr("data-confirm-message"), href = $(this).attr('data-href');
        swal({
            title: "Confirmation",
            text: message,
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: 'Oui',
            cancelButtonText: 'Non',
            closeOnConfirm: false,
            html: false
        }, function () {
            window.location.href = href;
        });
    });

    if ($('.recommendation-actor-switcher').length) {
        if ($('.recommendation-actor-switcher').is(':checked')) {
            $('#personal_insert_recommendation_formgroups').fadeOut();
            $('#actor_recommendation_formgroups .ignore').each(function () {
                $(this).removeClass('ignore');
            });
            $('#actor_recommendation_formgroups').fadeIn();
        } else {
            $('#actor_recommendation_formgroups').fadeOut();
            $('#personal_insert_recommendation_formgroups .ignore').each(function () {
                $(this).removeClass('ignore');
            });
            $('#personal_insert_recommendation_formgroups').fadeIn();
        }
    }

    if ($('.my-repeater').length) {
        //console.log("in");
        $('.my-repeater').repeater({
            hide: function (e) {
                confirm($('.my-repeater').attr('delete-message')) && $(this).slideUp(e)
            },
            show: function () {
                $(this).fadeIn();
                $('.my-repeater .ignore').each(function () {
                    $(this).removeClass('ignore');
                });
                /*$('.select2-container').remove();
                $('.select2').select2({
                    placeholder: 'Sélectionner',
                });
                $('.select2-container').css('display','block');*/
                /*new Cleave('.currencyInput', {
                    numeral: true,
                    delimiter: ' ',
                    numeralThousandsGroupStyle: 'thousand'
                });*/

            },
            isFirstItemUndeletable: true,
        });
    }

    //var validationRules = {};
    //FORM Validation
    if ($('form#form-validation').length) {
        var validateObj = $("form#form-validation").validate({
            ignore: '.ignore',
            errorElement: 'span',
            errorClass: 'is-invalid',
            validClass: 'is-valid',
            rules: validationRules,
            invalidHandler: function (event, validator) {
                // 'this' refers to the form
                if ($(this).hasClass('evaluationForm')) {
                    var closestInvalid = validator.errorList[0].element;
                    var tabePane = $(closestInvalid).parents('.tab-pane');
                    var closestTabePaneID = tabePane.attr('id');
                    var openedNavLink = $(this).find('.nav-link.active');
                    var navlink = $(this).find('.nav-link#' + closestTabePaneID + '_tab');
                    if (openedNavLink != navlink) {
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
                }
            },
            submitHandler: function (form) {
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

    if ($('.currencyInput').length) {
        $('.currencyInput').each(function () {
            new Cleave(this, {
                numeral: true,
                delimiter: ' ',
                numeralThousandsGroupStyle: 'thousand'
            });
        })
    }

    $(document).on('change', '.recommendation-actor-switcher', function () {
        if ($(this).is(':checked')) {
            $('#actor_recommendation_formgroups .ignore').each(function () {
                $(this).removeClass('ignore');
            });
            $('#personal_insert_recommendation_formgroups').fadeOut();

            $('#personal_insert_recommendation_formgroups input, ' +
                '#personal_insert_recommendation_formgroups select, ' +
                '#personal_insert_recommendation_formgroups textarea').each(function () {
                $(this).addClass('ignore');
            });
            $('#actor_recommendation_formgroups').fadeIn();
        } else {
            $('#actor_recommendation_formgroups input, ' +
                '#actor_recommendation_formgroups select, ' +
                '#actor_recommendation_formgroups textarea').each(function () {
                $(this).addClass('ignore');
            });
            $('#actor_recommendation_formgroups').fadeOut();
            $('#personal_insert_recommendation_formgroups .ignore').each(function () {
                $(this).removeClass('ignore');
            });


            $('#personal_insert_recommendation_formgroups').fadeIn();
        }
    })

    $(document).on('submit', '.myAjaxifyModalForm', function (e) {
        e.preventDefault();
        var form = $(this);
        var button = form.find('button[type=submit]');
        //console.log(clientData);return;
        $.ajax({
            url: clientData.ajaxifyUrl + $(this).attr('data-caller'),
            data: $(this).serialize(),
            type: 'POST',
            dataType: 'JSON',
            cache: false,
            beforeSend: function () {
                button.addClass('is-loading');
                form.find('.alert').fadeOut();
                form.find('.alert').remove();
            },
            error: function () {
                alert('Oopps... Une erreur a été rencontrée')
            },
            success: function (response) {
                button.removeClass('is-loading');
                var message = '';
                if (response.status) {
                    message = '<div class="alert alert-success alert-dismissible" style="display: none">\n' +
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close" style="\n' +
                        '">\n' +
                        '        <span aria-hidden="true">×</span>\n' +
                        '    </button>' +
                        '    <div class="d-flex justify-content-start">\n' +
                        '        <span class="alert-icon m-r-20 font-size-30">\n' +
                        '            <i class="anticon anticon-check-circle"></i>\n' +
                        '        </span>\n' +
                        '        <div>\n' +
                        '            <h5 class="alert-heading">Notification</h5>\n' +
                        '            <p>' + response.message + '</p>\n' +
                        '        </div>\n' +
                        '    </div>\n' +
                        '</div>';
                    var select2Data = response.select2Data;
                    var select2Target = form.attr('return-select-caller-id');
                    var newOption = new Option(select2Data.text, select2Data.id, true, true);
                    $('#' + select2Target).append(newOption).trigger('change');
                    form.trigger('reset');
                    //all went well
                } else {
                    var message = '<div class="alert alert-danger alert-dismissible" style="display: none">\n' +
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close" style="\n' +
                        '">\n' +
                        '        <span aria-hidden="true">×</span>\n' +
                        '    </button>' +
                        '    <div class="d-flex justify-content-start">\n' +
                        '        <span class="alert-icon m-r-20 font-size-30">\n' +
                        '            <i class="anticon anticon-close-circle"></i>\n' +
                        '        </span>\n' +
                        '        <div>\n' +
                        '            <h5 class="alert-heading">Notification</h5>\n' +
                        '            <p>' + response.message + '</p>\n' +
                        '        </div>\n' +
                        '    </div>\n' +
                        '</div>';
                }
                form.find('.modal-body-container').prepend(message);
                form.find('.alert').fadeIn();
                setTimeout(function () {
                    form.find('.alert').fadeOut();
                }, 5000)
            }
        });
    })
});
