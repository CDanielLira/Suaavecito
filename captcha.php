<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content=
		"width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/estilos-captcha.css">
    <link
     
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Aboreto&family=Gloria+Hallelujah&family=Libre+Baskerville&family=Raleway:wght@100&family=Roboto&family=Silkscreen&display=swap" rel="stylesheet">
  
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
	integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
	<script src="js/funciones.js"></script>
</head>

<!--<body onload="generate()">
	<div class="row">
		<div class="col-4"></div>
		<div class="col-1" id="user-input">
			<input type="text" class="form-control" id="submit" placeholder="Ingresa el captcha">
		</div>
		<div id="image" selectable="False"></div>
		<div class="col-1" onclick="generate()">
			<button class="btn fas fa-sync"></button>
		</div>
	</div>
	<div class="row">
		<div class="col-4"></div>
		<div id="boton" class="col-2 py-3">
			<button class="btn btn-outline-secondary" onclick="printmsg()">Verificar captcha</button>  
			<p id="key"></p>
		</div>
	</div>
-->

<!-- Si se deja el código de arriba, el captcha no funcionará correctamente, este es el original: -->
<body onload="generate()">
	<div id="user-input" class="inline">
		<input type="text" id="submit"
			placeholder="Captcha code" />
	</div>

	<div class="inline" onclick="generate()">
		<button class="fas fa-sync"></button>
	</div>
    
    <div id="image" class="inline" selectable="False">
	</div>  

    <br>
    <br>
	<div id="boton">
      <button type="button" class="btn btn-outline-primary" onclick="printmsg()" >Verificar</button>  
    </div>
    
	<p id="key"></p>



</body>

</html>
