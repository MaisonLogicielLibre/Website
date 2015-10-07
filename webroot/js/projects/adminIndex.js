$(document).ready(function () {
    drawTable();
    table.fnFilter('0', 5);
    // When the table draw the columns
    table.fnSettings().aoRowCallback.push({
        "fn": function (nRow, aData, iDisplayIndex) {
            $('td:eq(0)', nRow).html(
                $('<a/>', {
                    href: projectUrl + '/' + aData['id'],
                    text: aData['name']
                })
            );
            $('td:eq(1)', nRow).html(
                $('<a/>', {
                    href: aData['link'],
                    text: aData['link']
                })
            );
            // Create organizations link
            var htmlOrg = '';
            $(aData.organizations).each(function (i, v) {
               htmlOrg += $('<a/>', {
                    href: orgUrl + '/' + v.id,
                    text: v.name
                })[0].outerHTML;
                htmlOrg += ', ';
            });
            $('td:eq(2)', nRow).html(
                htmlOrg.slice(0,-2) //Remove the (last) comma
            );
            $('td:eq(3)', nRow).html($('<input />', {
                    type: 'checkbox',
                    value: aData['accepted'],
                    name: 'cb-' + iDisplayIndex + '-accepted',
                    disabled: Boolean(aData['accepted'])
                })
                    .prop('checked', aData['accepted'])
            );
            $('td:eq(3)', nRow).find('input').bootstrapSwitch({
                'onText': 'Yes',
                'offText': 'No'
            })
                .on('switchChange.bootstrapSwitch', function (e, state) {
                    sendNewState(this, state);
                    $(this).bootstrapSwitch('toggleDisabled')
                });
            $('td:eq(4)', nRow).html($('<input />', {
                    type: 'checkbox',
                    value: aData['archived'],
                    name: 'cb-' + iDisplayIndex + '-archived'
                })
                    .prop('checked', aData['archived'])
            );
            $('td:eq(4)', nRow).find('input').bootstrapSwitch({
                'onText': 'Yes',
                'offText': 'No'
            })
                .on('switchChange.bootstrapSwitch', function (e, state) {
                    sendNewState(this, state);
                });
        }
    });
});

function sendNewState(e, state) {
    row = table.fnGetData($(e).parents('tr').index());
    $.ajax({
        url: ajaxUrl,
        type: "post",
        data: {
            id: row['id'],
            state: $(e).parents('td').index(),
            stateValue: + state
        },
        success: function (data) {
            data = $.parseJSON(data);
            if (data[0] == "error") {
                $('#content').prepend('<div role="alert" class="alert alert-dismissible fade in alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>' + data[1] + '</div>');
            } else {
                $('#content').prepend('<div role="alert" class="alert alert-dismissible fade in alert-success"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>' + data[1] + '</div>');
            }
        }
    })
}