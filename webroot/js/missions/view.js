$(document).ready(function () {
    drawTable();
    // When the table draw the columns
    table.fnSettings().aoRowCallback.push({
        "fn": function (nRow, aData, iDisplayIndex) {
            console.log(aData);
            $('td:eq(0)', nRow).html(
                $('<a />', {
                    href: userUrl + '/' + aData.user['id'],
                    text: aData.user['firstName'] + ' ' + aData.user['lastName']
                })
            );
            if (aData.accepted) {
                $(nRow).addClass('success');
            } else if (aData.rejected) {
                $(nRow).addClass('danger');
            } else {
                $(nRow).addClass('active');
            }
            $('td:eq(1)', nRow).html(
                $('<a />', {
                    href: acceptUrl + '/' + aData.id,
                    text: acceptCandidateTr,
                    class: 'btn ' + (aData.accepted || aData.rejected ? 'btn-default disabled' : 'btn-success')
                })
            );
            $('td:eq(2)', nRow).html(
                $('<a />', {
                    href: rejectUrl + '/' + aData.id,
                    text: rejectCandidateTr,
                    class: 'btn ' + (aData.accepted || aData.rejected ? 'btn-default disabled' : 'btn-danger')
                })
            );
        }
    });
});