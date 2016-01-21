$(document).ready(function () {
    drawTable();
    //Filter table
    var filter = location.search.split('type=')[1];
    console.log(location.search);
    switch(filter) {
      case 'Intern':
        table.fnFilter(filter, 2);
        document.getElementById("typeDrop").selectedIndex = 1;
        break;
      case 'Volunteer':
        table.fnFilter(filter, 2);
        document.getElementById("typeDrop").selectedIndex = 2;
        break;
      case 'Master':
        table.fnFilter(filter, 2);
        document.getElementById("typeDrop").selectedIndex = 3;
        break;
      case 'Capstone':
        table.fnFilter(filter, 2);
        document.getElementById("typeDrop").selectedIndex = 4;
        break;
      default:
        document.getElementById("typeDrop").selectedIndex = 0;
    }

    // When the table draw the columns
    table.fnSettings().aoRowCallback.push({
        "fn": function (nRow, aData, iDisplayIndex) {
            // Create mission name with url
            $('td:eq(0)', nRow).html(
                $('<a/>', {
                    href: missionUrl + '/' + aData['id'],
                    text: aData['name']
                })[0].outerHTML
            );
            // Create mission type
            console.log(aData);
            var type_mission_id = aData['type_mission'].id;
            $('td:eq(1)', nRow).html(
                typeMissionsTr[type_mission_id - 1]
            );
            // Create session
            $('td:eq(2)', nRow).html(
                sessionTr[aData['session']]
            );
            // Create organizations link
            var htmlOrg = '';
            $(aData.project.organizations).each(function (i, v) {
                htmlOrg += $('<a/>', {
                    href: orgUrl + '/' + v.id,
                    text: v.name
                })[0].outerHTML;
                htmlOrg += ', ';
            });
            $('td:eq(3)', nRow).html(
                htmlOrg.slice(0,-2) //Remove the (last) comma
            );
        }
    });
   var myParam = location.search.split('myParam=')[1]
});
