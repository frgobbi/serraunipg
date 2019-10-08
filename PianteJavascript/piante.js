var gauge1, gauge2;

function visualizza_pianta(id_pianta) {
    var code = "";
    var ogg,chart1;

    $.ajax({
        type: "POST",
        url: "../PianteDati/realtimePianta.php",
        data: "pianta=" + id_pianta,
        dataType: "html",
        success: function (risposta) {
            ogg = $.parseJSON(risposta);
            console.log(ogg);


        },
        error: function () {
            alert("Chiamata fallita, si prega di riprovare...");
        }
    });

    $('#modalPianta').modal('show');

}

function irrigatore(id_p) {
    $.ajax({
        type: "POST",
        url: "Metodi/invio_socket.php",
        data: "comando=1",
        dataType: "html",
        success: function (risposta) {
            console.log(risposta);
        },
        error: function () {
            alert("Chiamata fallita, si prega di riprovare...");
        }
    });
}