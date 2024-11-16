<?php

include("conexion_bd.php");
$conexion = conectar_bd();
$id_producto = $_GET['id_producto'];
$sql= "SELECT * FROM `producto` WHERE `id_producto` = $id_producto";
$result = mysqli_query($conexion, $sql);
foreach($result as $valor){
    
    // campos de la bd -> cliente
  
   $descripcion= $valor["descripcion_producto"];
   $precio= $valor["precio_producto"];
   $cantidad= $valor["cantidad_producto"];
    $imagen=$valor["imagen_producto"];
    $modelo=$valor["modelo_producto"];
    $estado = $valor["estado_producto"];
    }
     
    ?>

<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema Worktech SRL</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
      .error {
        color: red;
      }
    </style>
</head>

<body>
<!-- Contenedor para el Navbar -->
<div id="navbar-container"></div>

<!-- Cargar navbar.html usando JavaScript -->
<script>
  document.addEventListener("DOMContentLoaded", function () {
    fetch('navbar.html')
      .then(response => response.text())
      .then(data => {
        document.getElementById('navbar-container').innerHTML = data;
      })
      .catch(error => console.error('Error cargando el navbar:', error));
  });
</script>


  </br>
  </br>
  </br>
  <div class="container">
    <h1 class="text-center">Registro Producto</h1>
  </div>
  </br>

  <div class="container">
    <div class="form-control mb-3">
      <form id="formulario-producto" action="producto_funcion_editar.php" method="post">
       
      <div class="form-group row">
          <div class="col-4 mb-3">
            <label for="id_producto" class="form-label">ID Producto :</label>
            <input type="text" class="form-control" id="id_producto" name="id_producto" aria-describedby="id_productoHelp" value ="<?php echo $id_producto?>" readonly>
          
          </div>
          </div>
        <div class="form-group row">
          <div class="col-4 mb-3">
            <label for="modelo" class="form-label">Modelo :</label>
            <input type="text" class="form-control" id="modelo" name="modelo" aria-describedby="modeloHelp" value ="<?php echo $modelo?>" required>
            <div id="modeloHelp" class="form-text">Introduzca el modelo.</div>
          </div>

          <div class="col-8 mb-3">
            <label for="descripcion" class="form-label">Descripción :</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" aria-describedby="descripcionHelp" value =" <?php echo $descripcion?>" required>
            <div id="descripcionHelp" class="form-text">Introduzca la Descripcion del producto.</div>
          </div>


        <div class="form-group row">
          <div class="col-4 mb-3">
            <label for="cantidad" class="form-label">Cantidad :</label>
            <input type="number" class="form-control" id="cantidad" name="cantidad" aria-describedby="cantidadHelp" min="1" value = <?php echo $cantidad?> required>
            <div id="cantidadHelp" class="form-text">Introduzca la cantidad.</div>
          </div>
          <div class="col-4 mb-3">
            <label for="precio" class="form-label">Precio :</label>
            <input type="number" class="form-control" id="precio" name="precio" aria-describedby="precioHelp" min="500" value = <?php echo $precio?> required>
            <div id="precioHelp" class="form-text">Introduzca el precio.</div>
          </div>
          <div class="col-4 mb-3 form-floating">
            <select class="form-select" id="estado" name="estado" aria-label="Floating label select example">
              <option value="Disponible">Disponible</option>
              <option value="No Disponible	">No Disponible</option>
            </select>
            <label for="estado">Seleccione el estado del producto: </label>
          </div>

         

        <div class="form-group row">
            <div class="col-4 mb-3">
                <label for="imagen" class="form-label">Imagen :</label>
                <input type="text" class="form-control" id="imagen" name="imagen" aria-describedby="imagenHelp" value =" <?php echo $imagen?>" required>
                <div id="imagenHelp" class="form-text">Introduzca el nombre de la imagen.</div>
              </div>
        </div>

        <div class="form-group row">
          <span id="error-message" class="error"></span><br><br>
        </div>

        <div class="form-group row">
          <div class="col-12 text-center d-flex justify-content-center">
            <button type="submit" class="btn btn-primary btn-lg">Editar Producto</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <script>
   

    // Función para validar descripcion
    function validarDato(dato) {
      let datoRegex = /^[A-Za-z0-9\s.,#/-]+$/;
      if (!datoRegex.test(dato)) {
        return "Datos no permitidos, solo debe contener letras, números, espacios y caracteres permitidos (. , - # /).";
      }
      return ""; // No hay error
    }

    // Validación al enviar el formulario
    document.getElementById('formulario-producto').addEventListener('submit', function (event) {
      let modelo = document.getElementById('modelo').value;
      let descripcion = document.getElementById('descripcion').value;
      let cantidad = document.getElementById('cantidad').value;
      let precio = document.getElementById('precio').value;
      let estado = document.getElementById('estado').value;

      errorMessage.textContent = ""; // Limpiar mensajes anteriores
      let errores = [];

      

      // Validar dirección
      let errorModelo = validarDato(modelo);
      if (errorModelo) {
        errores.push(errorModelo);
      }

      // Mostrar mensajes de error si los hay
      if (errores.length > 0) {
        event.preventDefault(); // Prevenir el envío del formulario
        errorMessage.innerHTML = errores.join("<br>"); // Mostrar cada error en una línea separada
      }
    });
  </script>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
    crossorigin="anonymous"></script>


</body>

</html>