function updateClient(){
    console.log('submit form');
    var data = {
        clientId:       document.getElementById("clientId").value,
        firstName:      document.getElementById("firstName").value,
        lastName:       document.getElementById("lastName").value,
        birthDate:      document.getElementById("Birthdate").value,
        contactNo:      document.getElementById("contactNo").value,
        customerLevel:  document.getElementById("customerLevel").value
    };

    $.ajax({
        url: '/updateClient',
        type: 'POST',
        data: data,
        cache: false,
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {           
            if (response.status) {
                location.reload();              
            }
        },
        error: function (data) {
            console.log('dead: '+data);
        }
    });
}