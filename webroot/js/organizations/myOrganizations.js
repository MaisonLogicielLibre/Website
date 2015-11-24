$(document).ready(function () {
    drawTable();
    // When the table draw the columns
    table.fnSettings().aoRowCallback.push({
        "fn": function (nRow, aData, iDisplayIndex) {
            console.log(aData);
            $('td:eq(0)', nRow).html(
                $('<a />', {
                    href: orgUrl + '/' + aData['id'],
                    text: aData['name']
                })[0].outerHTML
                + (aData.owners.length ? ' ' +
                $('<span/>', {
                    class: 'label label-info label-as-badge',
                    text: ownerTxt
                })[0].outerHTML : '')
                + (!aData['isValidated'] ? ' ' +
                $('<span/>', {
                    class: 'label label-warning label-as-badge',
                    text: validationTxt
                })[0].outerHTML : '')
            );
            $('td:eq(1)', nRow).html(
                $('<a/>', {
                    href: aData['website'],
                    text: aData['website'],
                    target: '_blank'
                })
            );
        }
    });
});