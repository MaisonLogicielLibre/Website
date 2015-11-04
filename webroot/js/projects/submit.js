var nbrMission = 0;
var missionForm = '';
$(document).ready(function () {

    $('#mission-tab-0').find('input[type=text]').attr('value', ''); // Reset inputs because cakephp is dump
    $('#mission-tab-0').find('textarea').html('');
    missionForm = $('#mission-tab-0').html(); // Get the mission form

    fillForms(); // This will something only if the form is returned with errors

    // If the user click on a tab
    $('#formTab').on('click', 'a', function (e) {
        e.preventDefault();
        if ($(this).attr('id') == "newMission") {
            nbrMission += 1;
            createNewMissionForm(nbrMission, missionForm);
            initMissionForm(nbrMission);
            $(this).find('i').removeClass('fa-plus');
            $(this).removeAttr('id');
            $('#addMission').attr('data-tab', 'mission-' + nbrMission);
        }
        $(this).tab('show');
    });

    // callback when a tab is shown
    $('#formTab').on('shown.bs.tab', 'a', function (e) {
        var indexTab = $(e.relatedTarget).closest('li').index();
        validateForm($('.tab-content > div').eq(indexTab).find('form'), e.relatedTarget);
    });

    // If the user click on the bottom link it trigger a tab change
    $('.tab-content').on('click', '#addMission', function (e) {
        e.preventDefault();
        $('#formTab a#newMission').trigger('click');
    });

    // If the user click on the delete button
    $('.tab-content').on('click', '.deleteMission', function (e) {
        e.preventDefault();
        var index = $(this).parents().closest('.tab-pane').index();
        $('#formTab a').eq(index - 1).tab('show');
        $('#formTab li').eq(index).remove();
        $('.tab-content .tab-pane').eq(index).remove();
    });

    // Validate an input or textareaa
    $('.tab-content').on('input', 'input, textarea', function () {
        validateInput(this);
    });

    // Validate the checkbox
    $('.tab-content').on('change', '[name*=type_missions], [name*=mission_levels]', function () {
        validateInput(this);
    });

    // When submitting the form'
    $(document).on('click', '#submitProject', function (e) {
        var invalidFields = '';
        var error = false;
        //Validating all forms
        $('.tab-content').find('form').each(function (i, v) {
            if (v.hasAttribute('name')) {
                validateForm($(v), null);
                invalidFields = $(v).find(':invalid');
                if (invalidFields.length > 0) {
                    error = true;
                }
            }
        });
        if (!error) {
            $('.tab-content').find('form[name*=mission]').each(function (i, v) {
                $('#createProject').append($('<input/>', {
                        type: 'hidden',
                        name: 'mission-' + i,
                        value: JSON.stringify($(v).serializeArray())
                    })
                )
            });
            $('#createProject').submit();
        } else {
            $('#formTab').parents().eq(2).prepend($('<div/>', {
                class: 'row',
                html: $('<div/>', {
                    class: 'col-lg-12 col-md-12 col-sm-12 col-xs-12',
                    html: $('<div/>', {
                        class: 'alert alert-dismissible fade in alert-danger',
                        role: 'alert',
                        html: $('<button/>', {
                            class: 'close',
                            'aria-label': 'Close',
                            'data-dismiss': 'alert',
                            'type': 'button',
                            html: $('<span/>', {
                                'aria-hidden': true,
                                html: '×'
                            })
                        })
                    }).append(errorMsg)
                })
            }));
        }
    });
});

// Set the form name so it can be sended
function initMissionForm(nbrMission) {
    var id = nbrMission - 1;
    $('#mission-tab-' + id).find('form').attr('id', 'mission-' + id).attr('name', 'mission-' + id);
}

// Create the next possibly mission form
function createNewMissionForm(index, missionForm) {
    var formTab = $('#formTab');
    var tabContent = $('.tab-content');

    // Create the new tab
    formTab.append($('<li/>', {
            html: $('<a/>', {
                id: 'newMission',
                href: "#mission-tab-" + index,
                'data-toggle': "tab",
                'aria-controls': "mission-" + index,
                'class': "mission-" + index,
                text: 'Add a mission '
            })
                .append($('<i/>', {
                    class: 'fa fa-plus'
                })
            )
        })
    );

    // Create the new form
    tabContent.append($('<div/>', {
            class: "tab-pane",
            id: "mission-tab-" + index,
            html: missionForm
        })
    );
}

// Validate the entire form
function validateForm(form, tab) {
    var invalidFields = form.find(':invalid');
    var errorMessages = form.find('.help-block');
    var multiselectError = false;

    $(errorMessages).each(function (i, v) {
            removeError(v);
    });

    $(invalidFields).each(function (i, v) {
        if (v.length != 0) {
            createError(v, null);
        }
    });

    $(form.find('.multicheckbox')).each(function (i, v) {
        if ($(v).find('input:checked').length == 0) {
            if (!$(v).find('.help-block').length) {
                createError($(v).find('[type=hidden]'), null);
            }
            multiselectError = true;
        }
    });


    if (invalidFields.length > 0) {
        invalidFields[0].focus();
    }
    updateFormStatus(invalidFields, tab, multiselectError);
}

// Validate one input
function validateInput(input) {
    var form = $(input).parents().closest('form');
    var index = $(input).parents().closest('.tab-pane').index();
    var tab = $('#formTab a').eq(index);
    var invalidFields = form.find(':invalid');
    var div = $(input).parents().closest('.form-group');
    var multiselectError = false;

    removeError(div.find('.help-block'));

    if ($(input).attr('name') == 'type_missions[_ids][]' || $(input).attr('name') == 'mission_levels[_ids][]') {
        if (div.find('input:checked').length == 0) {
            createError(div.find('[type=hidden]'), null);
            multiselectError = true;
        }
    }

    if (input.validationMessage.length > 0)
        createError(input, null);

    updateFormStatus(invalidFields, tab, multiselectError);
}


// Create an error for an input
function createError(input, error) {
    var parent;
    if (error === null)
        error = input.validationMessage;

    parent = $(input).parents().closest('.form-group');
    parent.addClass('has-error');
    parent.append($('<div/>', {
            class: 'help-block',
            text: error
        })
    );
}

// Remove the error on an input
function removeError(error) {
    var parent;
    parent = $(error).parents().closest('.form-group');
    parent.removeClass('has-error');
    error.remove();
}

// Update the icon on the tab
function updateFormStatus(invalidFields, tab, multiselectError) {
    if (invalidFields.length || multiselectError) {
        $(tab).find('i').removeClass('fa-check').addClass('fa-times').css('color', '#A94442');
    } else {
        $(tab).find('i').removeClass('fa-times').addClass('fa-check').css('color', '#5CB85C');
    }
}

function fillForms() {
    var data;
    $('#createProject input[type=hidden][name*=mission-]').each(function (i, v) {
        data = $.parseJSON($(v).val());
        var form = $('.tab-content > div').eq(i + 1).find('form');
        $(data).each(function (j, o) {
            if (!Array.isArray(o)) {
                if (o.name.match(/type_missions/)) {
                    if (o.value != '') {
                        form.find($('[name*=type_missions][value=' + o.value + ']')).prop('checked', true);
                    }
                } else if (o.name.match(/mission_levels/)) {
                    if (o.value != '') {
                        form.find($('[name*=mission_levels][value=' + o.value + ']')).prop('checked', true);
                    }
                }
                else {
                    form.find('[name=' + o.name + ']').val(o.value);
                }
            } else {
                for (var arrayErrors in o) {
                    var errors = o[arrayErrors];
                    for (var error in errors) {
                        if (error == 'type_missions') {
                            createError(form.find('[name="type_missions[_ids]"]'), errors[error]);
                        } else if (error == 'mission_levels') {
                            createError(form.find('[name="mission_levels[_ids]"]'), errors[error]);
                        } else {
                            createError(form.find('[name=' + error + ']'), errors[error]);
                        }
                    }
                }
            }
        });

        // Prepare the next form
        var tab = $('#formTab #newMission');
        nbrMission += 1;
        createNewMissionForm(nbrMission, missionForm);
        initMissionForm(nbrMission);
        $(tab).find('i').removeClass('fa-plus');
        $(tab).removeAttr('id');
        $('#addMission').attr('data-tab', 'mission-' + nbrMission);

    });
    // Validate form
    if ($('#createProject input[type=hidden][name*=mission-]').length) {
        $('.tab-content form').each(function (i, v) {
            if (v.hasAttribute('name')) {
                validateForm($(v), $('#formTab li').eq(i));
            }
        });
    }
}
