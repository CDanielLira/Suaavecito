<?php include "navbar.php"; ?>
<!doctype html>
<html lang="es">
<head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gráficos</title>
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos-administrador.css">
    
</head>
<body>
   <header>
    <div class="contenedorP">
    <div class="graficos">
            <div  class="col-lg-12">
                <div class="card" style="padding-top: 20px">
                    <div class="card-header centrar">
                        GRÁFICAS ADMINISTRADOR
                    </div>
                    <div class="card-body">
                        <div class="row centrar">
                            <div class="col-lg-2">
                                <button class="btn btn-primary boton" onclick="CargarDatosGraficoBar()">Ventas</button>
                            </div>
                            <div class="col-lg-2">
                                <button class="btn btn-primary boton" onclick="CargarDatosGraficoBarHorizontal()">Existencias</button>
                            </div>
                        </div>
                        <div class="centrar">
                            <div style="width: 400px; height: 400px; padding-top: 10px;">
                                <canvas id="graficobar" width="400" height="400"></canvas>
                                <canvas id="graficobarhorizontal" width="400" height="400"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   </header>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

<script>
   
    function CargarDatosGraficoBar(){
        $.ajax({
            url:'graficas/controlador_grafico1.php',
            type:'POST'
        }).done(function(resp){
            if(resp.length>0){
                var titulo = [];
                var cantidad = [];
                var data = JSON.parse(resp);
                for(var i=0;i < data.length; i++){
                    titulo.push(data[i][0]);
                    cantidad.push(data[i][1]);
                }

                CrearGrafico(titulo,cantidad,'bar','GRAFICO EN BARRAS DE PRODUCTOS','graficobar');
                document.getElementById("graficobarhorizontal").style.display = "none";
                document.getElementById("graficobar").style.display = "block";
            }
        })
    }
    function CargarDatosGraficoBarHorizontal(){
        $.ajax({
            url:'graficas/controlador_grafico2.php',
            type:'POST'
        }).done(function(resp){
            if(resp.length>0){
                var titulo = [];
                var cantidad = [];
                var data = JSON.parse(resp);
                for(var i=0;i < data.length; i++){
                    titulo.push(data[i][0]);
                    cantidad.push(data[i][1]);
                }
                CrearGrafico(titulo,cantidad,'horizontalBar','GRAFICO EN BARRAS HORIZONTALES DE PRODUCTOS','graficobarhorizontal');
                document.getElementById("graficobar").style.display = "none";
                document.getElementById("graficobarhorizontal").style.display = "block";
            }
        })
    }

    function CrearGrafico(titulo,cantidad,tipo,encabezado,id){
        var ctx = document.getElementById(id);
        var myChart = new Chart(ctx, {
            type: tipo,
            data: {
                labels: titulo,
                datasets: [{
                    label: encabezado,
                    data: cantidad,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    }
</script>
<?php include "footer.html"; ?>