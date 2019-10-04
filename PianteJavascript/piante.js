var gauge1,gauge2;
function visualizza_pianta(id_pianta){
    var code ="";
    var ogg;

    $.ajax({
        type: "POST",
        url: "../PianteDati/realtimePianta.php",
        data: "pianta="+id_pianta,
        dataType: "html",
        success: function(risposta) {
            ogg = $.parseJSON(risposta);
            console.log(ogg);
            code += "<div class='row'><div class='col-lg-12'><svg id=\"fillgauge1\" width=\"100%\" height=\"500\"></svg></div></div>";
            code += "<div class='row'><div class='col-lg-12'><svg id=\"fillgauge2\" width=\"100%\" height=\"500\"></svg></div></div>";
            $('#bodyModalRealTime').empty();
            $('#bodyModalRealTime').append(code);
            gauge1 = loadLiquidFillGauge("fillgauge1", ogg.humidity);
            gauge2 = loadLiquidFillGauge("fillgauge2", ogg.temperature);
        },
        error: function() {
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
        success: function(risposta) {
            console.log(risposta);
        },
        error: function() {
            alert("Chiamata fallita, si prega di riprovare...");
        }
    });
}