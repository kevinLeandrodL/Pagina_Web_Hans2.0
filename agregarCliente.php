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
        $alert = '<div class="alert alert-danger" role="alert">
                                    Todo los campos son obligatorio
                                </div>';
    } else {
        $dni = $_POST['dni'];
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];

        $result = 0;
        if (is_numeric($dni) and $dni != 0) {
            $query = mysqli_query($conexion, "SELECT * FROM cliente where dni = '$dni'");
            $result = mysqli_fetch_array($query);
        }
        if ($result > 0) {
            $alert = '<div class="alert alert-danger" role="alert">
                                    El dni ya existe
                                </div>';
        } else {
            $query_insert = mysqli_query($conexion, "INSERT INTO cliente(dni,nombre,telefono,direccion) values ('$dni', '$nombre', '$telefono', '$direccion')");
            if ($query_insert) {
                $alert = '<div class="alert alert-primary" role="alert">
                                    Cliente Registrado
                                </div>';
            } else {
                $alert = '<div class="alert alert-danger" role="alert">
                                    Error al Guardar
                            </div>';
            }
        }
    }
    mysqli_close($conexion);
 }
 ?>

  <!-- Begin Page Content -->
    <div class=" container-fluid">

        <!-- Page Heading -->
        <div class=" text-center mb-4">

            <h1 class="h3 mb-2  text-black">INGRESE SUS DATOS</h1>
            <h6 class="h4 mb-0  text-warning ">Para realizar la compra</h6>
            
        </div>
        <div class=" text-justifyr mb-5">
        <a href="login.html" class="btn bg-white">Regresar</a>
        
        
        </div>
        <!-- Content Row -->

        <div class="row d-flex justify-content-center">

            
        <span class="border border-5">
            
            <div class="col-lg-10">

               

                    <form action="" method="post" autocomplete="off">
                        <?php echo isset($alert) ? $alert : ''; ?>
                        <div class="form-group">
                            <label for="dni">DNI</label>
                            <input type="number" placeholder="Ingrese dni" name="dni" id="dni" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nombre">NOMBRE</label>
                            <input type="text" placeholder="Ingrese Nombre" name="nombre" id="nombre" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="telefono">TELÉFONO</label>
                            <input type="number" placeholder="Ingrese Teléfono" name="telefono" id="telefono" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="direccion">DIRECCIÓN</label>
                            <input type="text" placeholder="Ingrese Direccion" name="direccion" id="direccion" class="form-control">
                        </div>

                                        

                        <div class="row d-flex justify-content-center">

                            <input type="submit" value="Guardar" class="btn bi bi-save2">

                            <a href="clienteRegistrado.php" class="btn btn-info" width="20"><i> <img src="img/clientes.gif" width="30"> </i></a>
                            
                        </div>
                </form>
            </div>
        </span>
           
        </div>

        


    </div>