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

<?php ?>


<div class="container-fluid">

	
	<div class=" text-center">
		<h1 class="h2  text-dark -800">Clientes Registrados</h1>
		
	</div>

	<div class="row d-flex justify-content-center">
		<div class="col-lg-5">

			<div class="table-responsive">
				<table class="table " id="table">

				    <thead class="bg-warning text-center">
						<tr>
							<th>ID</th>
							<th>DNI</th>
							<th>NOMBRE</th>
							<th>TELEFONO</th>
							<th>DIRECCIÓN</th>
							<th>ACCIONES</th>			
							
						</tr>
					</thead>
					<tbody>
						<?php
						include "conexion.php";

						$query = mysqli_query($conexion, "SELECT * FROM cliente");
						$result = mysqli_num_rows($query);
						if ($result > 0) {
							while ($data = mysqli_fetch_assoc($query)) { ?>
								<tr>
									<td><?php echo $data['idcliente']; ?></td>
									<td><?php echo $data['dni']; ?></td>
									<td><?php echo $data['Nombre']; ?></td>
									<td><?php echo $data['telefono']; ?></td>
									<td><?php echo $data['direccion']; ?></td>								
									<td>									
										<a href="edidCliente.php?id=<?php echo $data['idcliente']; ?>" class="btn" ><i> <img src="img/like.gif" width="30"></i></a>
									</td>
								</tr>
						<?php }
						} ?>
					</tbody>
				</div>
			</div>	
		</div>
		
	</div>

	<a href="login.html" class="btn bg-white">Regresar</a>

</div>


</div>



<?php ?>