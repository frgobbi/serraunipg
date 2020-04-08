var chart;

function creaGrafico(dati, type, tipo) {
    var i;
    var colum = [];
    var index = 0;
    var yLabel = "";
    colum[index] = [];
    colum[index].push("x");

    var controllo =0;
    for (i = 0; (i < dati.nodi.length) && (controllo === 0); i++) {
        if (dati.nodi[i].value.length > 0) {
            for (var j = 0; j < dati.nodi[i].times.length; j++) {
                colum[index].push(dati.nodi[i].times[j]);
            }
            index++;
            controllo = 1;
        }
    }

    for (i = 0; i < dati.nodi.length; i++) {
        colum[index] = [];
        colum[index].push(dati.nodi[i].nome);
        for (var j = 0; j < dati.nodi[i].value.length; j++) {
            colum[index].push(dati.nodi[i].value[j]);
        }
        index++
    }
    if(tipo == 1){
        yLabel =  "Temperature (°C)";
    } else {
        yLabel = "Humidity ()";
    }

    chart = c3.generate({
        size: {
            height: 400,
            width: 1250
        },
        data: {
            type: type,
            x: 'x',
            columns: colum,
            xFormat: '%H:%M:%S'
        },
        axis: {
            x: {
                type: 'timeseries',
                tick: {
                    format: '%H:%M:%S'
                },
                label: {
                    text: 'time(H:m)',
                    position: 'outer-center'
                }
            },
            y: {
                label: {
                    text: yLabel,
                    position: 'outer-middle',
                }
            },
        },
        /*
         color: {
         pattern: ['#FF0000','#FFFF00', '#0000FF', '#964B00', '#4B0082', '#21421E', '#00FF00', '#ff9896', '#9467bd', '#c5b0d5', '#8c564b', '#c49c94', '#e377c2',
         '#f7b6d2', '#aec7e8' , '#c7c7c7','#1f77b4' , '#dbdb8d', '#17becf', '#9edae5']
         },
         */
        zoom: {
            enabled: true,
        },
        point: {
            show: true,
        },
    });
}

function changeGrafico() {
    var data = $('#Dgraph').val();

    var val = $('input[name=type]:checked').val();

    var nodi = [];
    $('input[name="nodi"]:checked').each(function () {
        nodi.push(this.value);
    });

    var type = $('input[name=typeSensor]:checked').val();
    var parametri = {
        nodi: nodi,
        data: data,
        type: type,
    };
    console.log(parametri);
    var jsonString = JSON.stringify(parametri);
    $.ajax({
        type: "POST",
        url: "../GraficiDati/graficoPianta.php",
        data: {data: jsonString},
        success: function (risposta) {
            var ogg = $.parseJSON(risposta);
            console.log(ogg);
            creaGrafico(ogg, val, type);
        },
        error: function () {
            alert("Chiamata fallita, si prega di riprovare...");
        }
    });

}