$(document).ready(function () {
    drawTable();
    // When the table draw the columns
    table.fnSettings().aoRowCallback.push({
        "fn": function (nRow, aData, iDisplayIndex) {
            $('td:eq(0)', nRow).html(
                $('<a/>', {
                    href: projectUrl + '/' + aData['id'],
                    text: aData['name']
                })[0].outerHTML
                + (!aData['accepted'] ?  ' ' +
                $('<span/>', {
                    class: 'label label-warning label-as-badge',
                    text: validationTxt
                })[0].outerHTML : '')
            );
            $('td:eq(1)', nRow).html(
                $('<a/>', {
                    href: aData['link'],
                    text: aData['link'],
                    target: '_blank'
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
        }
    });
});