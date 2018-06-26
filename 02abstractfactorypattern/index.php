<?php
include 'clases/class.muffin.php';
include 'clases/class.chocolate.php';
include 'clases/class.arandanos.php';
include 'clases/class.muffin_factory.php';

$mfactory = new MuffinFactory('ARND');
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="description" content="Patrones de factoría">
	<meta name="keywords" content="HTML,CSS,PHP,JavaScript">
	<meta name="author" content="Héctor Ochoa">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Factoría abstracta</title>

	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link rel="stylesheet" href="css/custom.css?version=1.0">
</head>
<body>
	<header>
		<div class="wrapper">
			<div class="cover"></div>
			<h1 class="header negro"><span>PATRONES </span><span> DE</span><span> DISEÑO</span></h1>
		</div>
		
	</header>

	<main>
		<section>
			<div class="wrapper">
				<h1>PATRÓN DE LA FACTORÍA</h1>
				<h3>- factory pattern -</h3>

				<div class="empty-space"></div>

				<div class="row">
					<h3 class="left">LA FÁBRICA DE OBJETOS</h3>
					<p>El patrón de la factoría es un tipo de <span class="negrita">patrón creacional</span>. Sirve para que el proceso de creación de objetos pueda ser indpendiente del resto de nuestro código.</p>
					<br>
					<p>Crea a través de una interfaz, familias de objetos que tienen relación entre sí, sin especificar en concreto el objeto.</p>
				</div>

				<div class="empty-space"></div>

				<div class="row">
					<div class="wrapper column">
						
						<div class="col2-3">
							<h3 class="left">CASO DE USO</h3>
							<p>Tenemos una fábrica de MUFFINS, sí de 'madalenas' de toda la vida. El caso es que nuestra fábrica sólo fabrica 2 tipo de madalenas, unas con arándanos y otras de chocolate (pero las 2 son madalenas).</p>
							<br>
							<p>Todas ellas tendrán unas características comunes, como <span class="negrita">calorías</span>, <span clas="negrita">precio</span>... , pero además, unas llevarán <span class="chocolate">chocolate</span> y otras <span class="arandano">arandanos</span>.</p>
						</div>

						<div class="col1-3">
							<figure>
								<img src="img/factorypattern/muffins.png" alt="interface">
							</figure>
						</div>
					</div>
				</div>

				<div class="empty-space"></div>

				<div class="row">
					<div class="wrapper">
						<div>
							<h3 class="left">CREACIÓN DE LA INTERFAZ</h3>
							<p>Creamos una <span class="code crimson">interfaz</span> que contenga los métodos implementables: <span class="code green">getCalorias</span>, <span class="code green">getPPU</span> (precio por ud), <span class="code green">tieneChocolate</span>, y <span class="code green">tieneArandanos</span></p>
						</div>

						<div>
							<figure>
								<img src="img/factorypattern/interface.png" alt="interface">
							</figure>
						</div>
					</div>
				</div>

				<div class="empty-space"></div>

				<div class="row">
					<div class="wrapper">
						<div>
							<h3 class="left">CREAMOS NUESTRAS CLASES PARA LAS MUFFINS</h3>
							<p>Creamos dos <span class="code crimson">clases</span>, una para nuestras muffins de chocolate y otra para nuestras muffins de frambuesa, que implementen la interfaz.</p>
							<br>
							<p>Todas ellas tendrán unas características comunes, como <span class="negrita">calorías</span>, <span clas="negrita">precio</span>... , pero además, unas llevarán <span class="chocolate">chocolate</span> y otras <span class="arandano">arándanos</span>.</p>
						</div>

						<div>
							<figure>
								<img src="img/factorypattern/arandanos.png" alt="arandanos">
							</figure>
						</div>

						<div>
							<p>Y hacemos lo mismo para las muffins de chocolate.</p>
							<figure>
								<img src="img/factorypattern/chocolate.png" alt="chocolate">
							</figure>
						</div>
					</div>
				</div>


				<div class="empty-space"></div>

				<div class="row">
					<div class="wrapper">
						<div>
							<h3 class="left">CREAMOS NUESTRA FATORÍA DE MUFFINS</h3>
							<p>Aquí viene el paso <span class="crimson">IMPORTANTE: </span> Creamos nuestra fábrica de muffins, una <span class="code crimson">class</span> que generará Muffins de chocolate o de arándanos dependiendo del parámetro que le pasemos, la <span class="green">MuffinFactory</span></p>
						</div>

						<div>
							<figure>
								<img src="img/factorypattern/mufinfactory.png" alt="mufinfactory.png">
							</figure>
						</div>
					</div>
				</div>

				<div class="empty-space"></div>

				<div class="row">
					<div class="wrapper">
						<div>
							<h3 class="left">OBTENER EL TIPO DE MUFFIN</h3>
							<p>A partir de la factoría podemos obtener las muffins que queramos con un código limpio y escalable.</p>
						</div>

						<div>
							<figure>
								<img src="img/factorypattern/final.png" alt="final.png">
							</figure>
						</div>
					</div>
				</div>


				<div class="empty-space"></div>

				<?php if($mfactory->getMuffin()):?>
					<div class="row">
						<div class="wrapper">
							<div>
								<h3 class="left">EL RESULTADO FINAL SERÁ</h3>
								<?php $sabor = ($mfactory->getMuffin()->tieneChocolate()) ? 'chocolate' : 'arandano'; ?>
								<h4>Muffin de <span class="<?php echo $sabor; ?>"><?php echo $sabor.':'; ?></span></h4>
								<p><?php echo "Calorías: ".$mfactory->getMuffin()->getCalorias()." kcal."; ?></p>
								<p><?php echo "Precio: ".$mfactory->getMuffin()->getPPU()." €."; ?></p>
							</div>
						</div>
					</div>
				<?php endif; ?>


			</div>
		</section>
	</main>

	<footer>
		<p class="center">by Héctor Ochoa</p>
		<p class="center small"><a href="http://hectorochoa.es" target="_blank">hectorochoa.es</a></p>
	</footer>
</body>
</html>