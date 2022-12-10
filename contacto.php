<?php include "navbar.php"; ?>

<html>

<head>
   
    <title>Contacto</title>
    <link rel="stylesheet" href="css/estilos-contacto.css">
    
</head>

<body>
    <header>
        <div class="subconte">
            <form action="enviar.php" class="box1" method="post">
                <br>
                <h1>CONTÁCTANOS</h1>
                <hr>
                <div class="mb-3">
                    <label for="n" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Juan" id="n" required>
                </div>
                <div class="mb-3">
                    <label for="a" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" name="apellido" placeholder="Gonzales" id="a" required>
                </div>
                <div class="mb-3">
                    <label for="e" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" name="correo" placeholder="ejemplo@ejemplo.com" id="e" required>
                </div>
                <div class="mb-3">
                    <label for="m" class="form-label">Escríbenos tus comentarios</label>
                    <textarea class="form-control" id="m" rows="6" name="mensaje" required></textarea>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-light">Enviar</button>
                </div>
            </form>
        </div>
    </header>
</body>

</html>
<?php include "footer.html"; ?>
