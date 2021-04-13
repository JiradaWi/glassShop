function searchCustomer(event) {
    var searchText = event.target.value;

    if (event.keyCode === 13) {
        console.log('enter');
        var data = {keyword: searchText};
        $.ajax({
            //url: 'http://localhost/laravel60/pet/petupdate',
            url: '/search',
            type: 'POST',
            data: data,
            cache: false,
            //method: 'post',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                //   alert('Your data updated');
                if (response.data) {
                    console.log('data:' + JSON.stringify(response.data));
                    console.log('data length:' + response.data.length);
                    var data = response.data;

                    var tabledetail = '';
                    for (var i = 0; i < response.data.length; i++){
                       
                        tabledetail += '<tr>';
                        tabledetail += '<td>'+data[i].clientId+'</td>';
                        tabledetail += '<td>'+data[i].firstName+'</td>';
                        tabledetail += '<td>'+data[i].lastName+'</td>';
                        tabledetail += '<td>'+data[i].contactNo+'</td>';
                        tabledetail += '<td>'+data[i].levelName+'</td>';
                        tabledetail += '</tr>'
                    }    
                    document.getElementById('clientInformation').innerHTML = tabledetail;                   
                }
            },
            error: function (data) {
                console.log(data);
            }

        });
    }

}
