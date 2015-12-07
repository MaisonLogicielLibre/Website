$(document).ready(function () {
    drawTable();
	//Filter table
	var filter = location.search.split('type=')[1];
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
            $('td:eq(0)', nRow).html(
                $('<a/>', {
                    href: missionUrl + '/' + aData['id'],
                    text: aData['name']
                })[0].outerHTML
            );
            // Create type missions name
            var htmlTypeMis = '';
            $(aData.type_missions).each(function (i, v) {
                htmlTypeMis += v.name + ', ';
            });
            if (aData.type_missions != null) {
                var type_missions = '';
                $(aData.type_missions).each(function (i, v) {
                    type_missions += typeMissionsTr[v.id - 1] + ', ';
                });
                $('td:eq(1)', nRow).html(type_missions.slice(0, -2));
            }
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