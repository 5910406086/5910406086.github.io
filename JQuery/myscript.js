$(document).ready(function() {
 
    $.getJSON("data.json", function(data){
        var employee_data = '<tbody id="myTable">';
        $.each(data, function(key, value){
            console.log("bbb");
            employee_data += '<tr>';
            employee_data += '<td>' + value.userId + '</td>';
            employee_data += '<td>' + value.jobTitleName + '</td>';
            employee_data += '<td>' + value.firstName + '</td>';
            employee_data += '<td>' + value.lastName + '</td>';
            employee_data += '<td>' + value.preferredFullName + '</td>';
            employee_data += '<td>' + value.employeeCode + '</td>';
            employee_data += '<td>' + value.region + '</td>';
            employee_data += '<td>' + value.phoneNumber + '</td>';
            employee_data += '<td>' + value.emailAddress + '</td>';
            employee_data += '</tr>';
        });
        employee_data += '</tbody>';
        $('#employee_table').append(employee_data);
    });

    $("#btn").click( function() {
    var value = $("#myInput").val().toLowerCase();
    $("#myTable tr").filter(function() {
        console.log("aaa");
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

    

});



