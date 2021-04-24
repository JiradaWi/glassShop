function updateOrder() {
    console.log('submit form');
    var orderId = document.getElementById("orderId").value;
    var data = {
        orderId: orderId,
        orderDate: document.getElementById("orderDate").value,
        status: document.getElementById("status").value,
        orderFinishDate: document.getElementById("orderFinishDate").value,
        remark: document.getElementById("remark").value,
        paymentMethod: document.getElementById("paymentMethod").value,
    };

    $.ajax({
        url: '/updateOrder',
        type: 'POST',
        data: data,
        cache: false,
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            console.log('response.status: ' + response.status);
            if (response.status == 'SUCCESS') {
                window.location.href = '/order/' + orderId;
            } else {
                console.log('dead: ' + JSON.stringify(response));
            }
        },
        error: function (data) {
            console.log('dead: ' + JSON.stringify(data));
        }
    });
}

function getPrice() {
    var catalogId = document.getElementById("catalogId").value; 
    if (catalogId == '-') {
        return;
    }

    var data = {
        catalogId: catalogId
    };

    $.ajax({
        url: '/retrievePrice',
        type: 'POST',
        data: data,
        cache: false,
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {           
            if (response.status == 'SUCCESS') {
                document.getElementById('salesPrice').value = response.catalog.basePrice;
            } else {
                console.log('dead: ' + JSON.stringify(response));
            }
        },
        error: function (data) {
            console.log('dead: ' + JSON.stringify(data));
        }
    });
}

function newOrderItem(){
    var data = {
        orderId: document.getElementById('orderId').value,
        catalogId: document.getElementById('catalogId').value,
        salesPrice: document.getElementById('salesPrice').value
    };

    $.ajax({
        url: '/newOrderItem',
        type: 'POST',
        data: data,
        cache: false,
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {           
            if (response.status == 'SUCCESS') {
               location.reload();
            } else {
                console.log('dead: ' + JSON.stringify(response));
            }
        },
        error: function (data) {
            console.log('dead: ' + JSON.stringify(data));
        }
    });
}