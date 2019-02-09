$(document).ready(function() {
    var arrData = [];
    var index = 0;
    $.getJSON("data.json", function(data){
        var employee_data = '<tbody id="myTable">';
        $.each(data, function(key, value){
            var information = { userId: value.userId,jobTitleName: value.jobTitleName,firstName: value.firstName,
                lastName: value.lastName,preferredFullName: value.preferredFullName,employeeCode: value.employeeCode,
                region: value.region,phoneNumber: value.phoneNumber,emailAddress: value.emailAddress
            };
            arrData[index] = information;
            index++;
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
    
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

    $("#adBtn").click(function(){
       
    })
    $("#myInput").keyup(function(event){
        console.log(event.keyCode);
            if(event.keyCode == 13){
                $("#btn").click();
                $("#btn2").click();
            }

    })
    
    $("#formButton").click(function(){
        $("#div1").toggle();
        $("#btn").toggle();
        $("#myInput").toggle();
    });

     $("#btn2").click(function(){
        var arr = [];
        var fname =  $("#firstName").val().toLowerCase();
        var lname =  $("#lastName").val().toLowerCase();
        var uid =  $("#userId").val().toLowerCase();
        var job =  $("#jobName").val().toLowerCase();
        var ph =  $("#phone").val().toLowerCase();
        var email =  $("#emailAddress").val().toLowerCase();
        console.log("arr "+ arrData);

        $.each(arrData, function( index, value ) {
            if(!(value.firstName.toLowerCase()).includes(fname)){
                return;
            }
            if(!(value.lastName.toLowerCase()).includes(lname)){
                return;
            }
            if(!(value.userId.toLowerCase()).includes(uid)){
                return;
            }
            if(!(value.jobTitleName.toLowerCase()).includes(job)){
                return;
            }
            if(!(value.phoneNumber.toLowerCase()).includes(ph)){
                return;
            }
            if(!(value.emailAddress.toLowerCase()).includes(email)){
                return;
            }

            arr.push(value);
        });
      
        $("#employee_table").empty();
        var employee_data = '<tr><th>userId</th><th>jobTitleName</th><th>firstName</th><th>lastName</th><th>preferredFullName</th><th>employeeCode</th><th>region</th><th>phoneNumber</th><th>emailAddress</th></tr>';
        $.each(arr, function(key, value){
            console.log("++++"+value.firstName);
            
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
        $('#employee_table').append(employee_data);
    });
});




