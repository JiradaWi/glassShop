function init(){   
    document.getElementById("dateMeasure").valueAsDate = new Date();
}

function saveEyesight(){
    console.log('submit form');
    var clientId = document.getElementById("clientId").value;
    var data = {
        clientId:       clientId,
        dateMeasure:    document.getElementById("dateMeasure").value,
        leftEye:        document.getElementById("leftEye").value,
        rightEye:       document.getElementById("rightEye").value,
        remark:         document.getElementById("remark").value,       
    };

    $.ajax({
        url: '/saveNewEyesight',
        type: 'POST',
        data: data,
        cache: false,
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {      
            console.log('response.status: '+response.status);     
            if (response.status == 'SUCCESS') {
                window.location.href = '/client/'+clientId;
            }else{
                console.log('dead: '+JSON.stringify(data));
            }
        },
        error: function (data) {
            console.log('dead: '+JSON.stringify(data)));
        }
    });
}