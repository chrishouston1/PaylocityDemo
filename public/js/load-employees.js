$(document).ready(function() {

	$(".employees-container").ready( function() {
		$.ajax({
			type: "GET",
			url: "../load-employees-json.php",
			dataType: "json",
			success: function(result) {
                if(result){
                    var jsonLength = Object.keys(result).length;  
                    var tableString = "<table id=\"employees-table\"><tr><th>First name </th> <th>Last name</th><th>Number of dependents</th></tr>";
                    for(i=jsonLength-1; i >=0  ; i--){
                        tableString += "<tr><td>" + result[i]['first_name'] + "</td><td>" + result[i]['last_name'] + "</td><td> " + result[i]['number_dependents'] + "</td></tr>";
                    }
                    tableString += "</table>";
                    $(".employees-container").append(tableString);

                }
			},
            
			error: function () {
				$(".employees-container").text("Failed to load follwers.");
			}
		}); 
	});

});