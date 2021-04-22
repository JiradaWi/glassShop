function searchCatalog(event) {
    console.log('search catalog');
    var searchText = event.target.value;

    if (event.keyCode === 13) {
        console.log('enter');
        var data = {
            keyword: searchText
        };
        $.ajax({
            url: '/searchCatalog',
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
                    for (var i = 0; i < response.data.length; i++) {
                        tabledetail += '<tr onclick="location.href=\'/catalog/' + data[i].itemId + '\'">';
                        tabledetail += '<td>' + data[i].itemId + '</td>';
                        tabledetail += '<td>' + data[i].name + '</td>';
                        tabledetail += '<td>' + data[i].basePrice + '</td>';
                        tabledetail += '<td>' + data[i].remark + '</td>';

                        if (data[i].isActive == '1') {
                            tabledetail += '<td style="text-align:center"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">' +
                                '<path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />' +
                                '</svg></td>';
                        } else {
                            tabledetail += '<td></td>';
                        }

                        tabledetail += '</tr>'
                    }
                    document.getElementById('catalogDetail').innerHTML = tabledetail;
                }
            },
            error: function (data) {
                console.log(JSON.stringify(data));
            }

        });
    }
}