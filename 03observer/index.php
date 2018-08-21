
<?php
include_once 'clases/class.coche.php';
include_once 'clases/class.testigo.php';
include_once 'clases/class.taller.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="description" content="Patrón de comportamiento Observer">
	<meta name="keywords" content="Patrones diseño, PHP, Factorias, patrones php, patterns">
	<meta name="author" content="Héctor Ochoa">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Patrón Observer</title>

	<link rel="shortcut icon" type="image/png" href="img/factory_pattern_logo.png"/>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link rel="stylesheet" href="css/custom.css?version=2.9">
</head>
<body>
	<header>
		<div class="wrapper">
			<div class="cover"></div>
			<h1 class="header negro"><span>PATRONES </span><span> DE</span><span> COMPORTAMIENTO</span></h1>
		</div>
		
	</header>

	<main>
		<section>
			<div class="wrapper">
				<figure class="logo" style="text-align: center; margin: 0px 0px;">
					<img style="width: 12%;" src="img/factory_pattern_logo.png" alt="factory_pattern_logo.png">
				</figure>
				<h1>PATRÓN OBSERVER</h1>

				<div class="empty-space"></div>

				<div class="row">
					<h3 class="left">EL PATRÓN OBSERVER</h3>
					<p>El patrón observer es un tipo de patrón de comportamiento cuyo objetivo es el de establecer una dependencia de <span class="negrita">uno a muchos.</span> El patrón observer se utiliza cuando queremos notificar a otros objetos un evento es disparado. Se pueden crear tantos observadores como queramos y la notificación del cambio de estado se hace de acuerdo al orden en que han sido suscritos los Observadores.</p>
					<br>
					<p>Dentro de esta relación denominamos Sujeto al objeto que emite la información sobre el cambio de estado, y Observador al que la recibe para realizar la acción que sea necesaria.</p>
					<p>A partir de PHP5.1 existen interfaces en la librería estándar que ayudan a implementar. Son <span class="code green">SplSubject y SplObserver</span></p>
					<br>
				</div>

				<div class="empty-space"></div>

				<div class="row">
					<div class="wrapper column">
						
						<div class="col2-3">
							<h3 class="left">CASO DE USO</h3>
							<p>Tenemos que realizar un software para el control de temperatura, nivel de aceite y presión de ruedas de un vehículo. Cuando el nivel de aceite, la presión de las ruedas sea baja, o la temperatura elevada, se encenderá un testigo en el panel de control del vehículo.</p>
							<br>
						</div>

						<div class="col1-3">
							<figure>
								<img src="img/cochefuturo.png" alt="cochefuturo.png">
							</figure>
						</div>
					</div>
				</div>

				<div class="empty-space"></div>


				<div class="row">
					<div class="wrapper">
						<div>
							<h3 class="left">CREACIÓN DEL SUJETO</h3>
							<p>Creamos nuestra <span class="code green">class Coche</span> que implementa la interface <span class="code crimson">\SplSubject</span> de PHP que nos ayudarán con la implemetación.</p>
							<br>
							<p>Debemos implementar 3 métodos:</p>
							<ul>
								<li><span class="code crimson">attach( )</span> : añade un observador;</li>
								<li><span class="code crimson">detach( )</span> : elimina un observador;</li>
								<li><span class="code crimson">notify( )</span> : notificación de los cambios;</li>
							</ul>
						</div>

						<br>

						<div>
							<figure>
								<img src="img/niveles_1.png" alt="niveles_1">
							</figure>
						</div>
						<br>
						<div>
							<p>En la función <span class="code green">attach</span> vamos a añadir los observadores para esta clase. Acumularemos los observadores en un array asociativo utilizando <span class="code crimson">spl_object_hash( )</span> que  devuelve un identificador de objeto único. (Cuando el objeto se destruye, el hash puede volver a reutilizarse)</p>
						</div>
						<div>
							<figure>
								<img src="img/niveles_2.png" alt="niveles_2.png">
							</figure>
						</div>
						<br>
						<div>
							<p>La función <span class="code green">detach</span> elimina observadores. Utilizamos el id generado por el spl_object_hash para eliminar del array ese observador.</p>
						</div>
						<div>
							<figure>
								<img src="img/niveles_3.png" alt="niveles_3.png">
							</figure>
						</div>
						<br>
						<div>
							<p>La función <span class="code green">notify</span> es clave en nuestro entorno. Esta función llama al <span class="code crimson">update( )</span> de nuestro/s observador/es que realizarán otro tipo de acciones independientes de nuestra clase principal. Este esquema respeta al máximo el principio de bajo acoplamiento. El Subject y el Observer pueden interactuar entre ellos, pero apenas tienen conocimiento del uno sobre el otro.</p>
						</div>
						<div>
							<figure>
								<img src="img/niveles_4.png" alt="niveles_4.png">
							</figure>
						</div>
						<div>
							<p>Y actualizamos nuestra función <span class="code green">getNiveles</span> para que dispare las notificaciones.</p>
						</div>
						<div>
							<figure>
								<img src="img/niveles_5.png" alt="niveles_5.png">
							</figure>
						</div>
					</div>
				</div>

				<div class="empty-space"></div>

				<div class="row">
					<div class="wrapper">
						<div>
							<h3 class="left">CREACIÓN DE LOS OBSERVADORES</h3>
							<p>Vamos a crear ahora nuestro primer observador. El <span class="code green">observador Testigo</span> implementará la interface <span class="code crimson">\SplObserver</span>. Tendremos el método  <span class="code green">update()</span> que realizará las acciones que sean necesarias.</p>
						</div>
						<br>
						<div>
							<figure>
								<img src="img/testigo_1.png" alt="testigo_1">
							</figure>
						</div>
						<br>
						<div>
							<p>Creamos nuestra alerta para el testigo del panel de control del coche.</p>
						</div>
						<br>
						<div>
							<figure>
								<img src="img/testigo_2.png" alt="testigo_2">
							</figure>
						</div>
						<br>
						
					</div>
				</div>

				<div class="empty-space"></div>

				<div class="row">
					<div class="wrapper">
						<div>
							<h3 class="left">INSTANCIACIÓN DE CLASES</h3>
							
							<?php 
							// --------------------------------- niveles trayecto 1
							$niveles_1 = array(
								'temperatura'=>20,
								'aceite'=>24,
								'ruedas'=>2.0
							);
							$trayecto = new Coche($niveles_1);
							$trayecto->attach(new Testigo());
							
							// --------------------------------- comprobación de niveles
							$trayecto->getNiveles();

							// --------------------------------- variación de la temperatura del motor 
							//---------------------------------- debido a una disminución en el nivel de aceite.
							$niveles_2 = array(
								'temperatura'=>120,
								'aceite'=>9,
								'ruedas'=>2.1
							);
							$trayecto->setNiveles($niveles_2);

							// --------------------------------- comprobación de niveles + notificación
							// $trayecto->getNiveles();

							?>
							<div>
								<figure>
									<img src="img/testigo_3.png" alt="testigo_3.png">
								</figure>
							</div>
							<br>
							<p>Tenemos una alerta en el panel de control y se han encendido dos testigos</p>
							<p>Los testigos indican que: <span class="code crimson"><?php $trayecto->getNiveles(); ?></span></p>
						</div>
					</div>
				</div>

				<div class="empty-space"></div>

				<div class="row">
					<div class="wrapper column">
						
						<div class="col2-3">
							<h3 class="left">AMPLIACIÓN</h3>
							<p>Podemos configurar fácilmente un segundo observador simplemente creando una nueva  <span class="code green">class Taller</span> y registrando mediante la función <span class="code crimson">attach( )</span></p>
							<figure>
								<img src="img/testigo_4.png" alt="testigo_4">
							</figure>
							<figure>
								<img src="img/testigo_5.png" alt="testigo_5">
							</figure>
							<p>Ahora, además de encenderse los testigos, se envía una notificación al taller:<span class="code crimson">
								<?php 
								$trayecto->attach(new Taller());
								$trayecto->getNiveles();
								?>
							</span></p>
						</div>

						<div class="col1-3">
							<figure>
								<img src="img/taller.png" alt="taller.png">
							</figure>
						</div>
					</div>
				</div>


				<div class="empty-space"></div>			

				<div class="row">
					<div class="wrapper">
						<a href="https://github.com/hktsion/DesignPatterns"><i class="fas fa-download"></i> Descargar código</a>
					</div>
				</div>
				<br><br>	



			</div>

			
		</section>

	</main>

	<footer>
		<p class="center">by Héctor Ochoa</p>
		<p class="center small"><a href="http://hectorochoa.es" target="_blank">hectorochoa.es</a></p>
	</footer>
</body>
</html>