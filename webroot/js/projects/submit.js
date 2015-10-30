$(document).ready(function () {
    var missionForm = $('#mission-tab-0').html(); // Get the mission form
    var nbrMission = 0;

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

    // Validate an input
    $('.tab-content').on('input', 'input', function () {
        validateInput(this);
    });

    // Validate a textarea
    $('.tab-content').on('input', 'textarea', function () {
        validateInput(this);
    });

    // When submitting the form'
    $(document).on('click', '#submitProject', function (e) {
        var invalidFields = '';
        var error = false;
        //Validating all forms
        $('.tab-content').find('form').each(function (i, v) {
            if (v.hasAttribute('name')) {
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
                        name: 'mission-'+i,
                        value: JSON.stringify($(v).serializeArray())
                    })
                )
            });
            $('#createProject').submit();
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
    var errorMessages = form.find('.error-message');

    $(errorMessages).each(function (i, v) {
        removeError(v);
    });

    $(invalidFields).each(function (i, v) {
        createError(v);
    });

    if (invalidFields.length > 0) {
        invalidFields[0].focus();
    }
    updateFormStatus(invalidFields, tab);
}

// Validate one input
function validateInput(input) {
    if (input.validationMessage.length > 0) {
        createError(input);
    } else {
        removeError($(input).parent().find('.error-message'));
    }

    var form = $(input).parents().closest('form');
    var invalidFields = form.find(':invalid');
    var index = $(input).parents().closest('.tab-pane').index();
    var tab = $('#formTab a').eq(index);
    updateFormStatus(invalidFields, tab);
}


// Create an error for an input
function createError(input) {
    var parent;
    parent = $(input).parent();
    parent.addClass('has-error');
    parent.append($('<div/>', {
            class: 'error-message',
            text: input.validationMessage
        })
    );
}

// Remove the error on an input
function removeError(error) {
    var parent;
    parent = $(error).parent();
    parent.removeClass('has-error');
    error.remove();
}

// Update the icon on the tab
function updateFormStatus(invalidFields, tab) {
    if (invalidFields.length) {
        $(tab).find('i').removeClass('fa-check').addClass('fa-times').css('color', '#A94442');
    } else {
        $(tab).find('i').removeClass('fa-times').addClass('fa-check').css('color', '#5CB85C');
    }
}
