$(document).ready(function () {
    drawTable();
    // When the table draw the columns
    table.fnSettings().aoRowCallback.push({
        "fn": function (nRow, aData, iDisplayIndex) {
            // Create Mission link
            var mission = aData.mission;
            $('td:eq(0)', nRow).html(
                $('<a/>', {
                    href: missionsUrl + '/' + mission.id,
                    text: mission.name
                })[0].outerHTML
            );
            $('td:eq(1)', nRow).html(
                $('<a/>', {
                    href: applicationsUrl + '/' + aData.id,
                    text: 'Remove your application',
                    class: 'btn btn-danger'
                })[0].outerHTML
            );
        }
    });
});
