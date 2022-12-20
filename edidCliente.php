<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Punto de Venta</title>

	<!-- Custom styles for this template-->
	<link href="css/sb-admin-2.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
	
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<?php 
include "conexion.php";
if (!empty($_POST)) {
  $alert = "";
  if (empty($_POST['nombre']) || empty($_POST['telefono']) || empty($_POST['direccion'])) {
    $alert = '<p class"error">Todo los campos son requeridos</p>';
  } else {
    $idcliente = $_POST['id'];
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];

    $result = 0;
    if (is_numeric($dni) and $dni != 0) {

      $query = mysqli_query($conexion, "SELECT * FROM cliente where (dni = '$dni' AND idcliente != $idcliente)");
      $result = mysqli_fetch_array($query);
      $resul = mysqli_num_rows($query);
    }

    if ($resul >= 1) {
      $alert = '<p class"error">El dni ya existe</p>';
    } else {
      if ($dni == '') {
        $dni = 0;
      }
      $sql_update = mysqli_query($conexion, "UPDATE cliente SET dni = $dni, nombre = '$nombre' , telefono = '$telefono', direccion = '$direccion' WHERE idcliente = $idcliente");

      if ($sql_update) {
        $alert = '<p class"exito">Cliente Actualizado correctamente</p>';
      } else {
        $alert = '<p class"error">Error al Actualizar el Cliente</p>';
      }
    }
  }
}




// Mostrar Datos clienteRegistrado

if (empty($_REQUEST['id'])) {
  header("Location: clienteRegistrado.php");
}
$idcliente = $_REQUEST['id'];
$sql = mysqli_query($conexion, "SELECT * FROM cliente WHERE idcliente = $idcliente");
$result_sql = mysqli_num_rows($sql);
if ($result_sql == 0) {
  header("Location: clienteRegistrado.php");
} else {
  while ($data = mysqli_fetch_array($sql)) {
    $idcliente = $data['idcliente'];
    $dni = $data['dni'];
    $nombre = $data['Nombre'];
    $telefono = $data['telefono'];
    $direccion = $data['direccion'];
  }
}
?>
        <!-- Begin Page Content -->
      <div class=" container-fluid">


        <div class="text-center mb-4 align-items-center justify-content-between mb-4">
		       <h1 class="h3 mb-0 text-black">Confirma tu Compra</h1>
		       
	      </div>

          <a href="login.html" class="btn btn-warning">Regresar</a>

          <span class="border top-0">

            <div class="row d-flex justify-content-center">
              <div class="col-lg-6 m-auto">

                <form class="" action="" method="post">
                  <?php echo isset($alert) ? $alert : ''; ?>
                  <input type="hidden" name="id" value="<?php echo $idcliente; ?>">
                  <div class="form-group">
                    <label for="dni">DNI</label>
                    <input type="number" placeholder="Ingrese dni" name="dni" id="dni" class="form-control" value="<?php echo $dni; ?>">
                  </div>
                  <div class="form-group">
                    <label for="nombre">NOMBRE</label>
                    <input type="text" placeholder="Ingrese Nombre" name="nombre" class="form-control" id="nombre" value="<?php echo $nombre; ?>">
                  </div>
                  <div class="form-group">
                    <label for="telefono">TELÉFONO</label>
                    <input type="number" placeholder="Ingrese Teléfono" name="telefono" class="form-control" id="telefono" value="<?php echo $telefono; ?>">
                  </div>
                  <div class="form-group">
                    <label for="direccion">DIRECCIÓN</label>
                    <input type="text" placeholder="Ingrese Direccion" name="direccion" class="form-control" id="direccion" value="<?php echo $direccion; ?>">
                  </div>
                  <button type="submit" class="btn btn-danger">Modificar Referencia</button>
                </form>
              </div>
           

              <div Clase= "">
              
                <iframe src="CarritoCompra.html" width="1000" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>	
              
              </div>

            </div>
          </span>
          <div class="row d-flex justify-content-center">
           <button type="" class="btn btn-white-center" class="abs-center"><i></i> <img src="img/comprar-100.png" width="100"></button>
          </div> 
        </div>        

      </div>
      
