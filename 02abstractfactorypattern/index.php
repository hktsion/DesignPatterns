<?php
include 'clases/class.interior.php';
include 'clases/class.exterior.php';
include 'clases/class.visco.php';
include 'clases/class.muelle.php';
include 'clases/class.espuma.php';
include 'clases/class.fibra.php';
include 'clases/class.abstractfactory.php';
include 'clases/class.factoriaexterna.php';
include 'clases/class.factoriainterna.php';
include 'clases/class.generadorfactorias.php';



?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="description" content="Patrones de factoría">
	<meta name="keywords" content="Patrones diseño, PHP, Factorias, patrones php, factory patterns">
	<meta name="author" content="Héctor Ochoa">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Factoría abstracta</title>

	<link rel="shortcut icon" type="image/png" href="img/general/factory_pattern_logo.png"/>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link rel="stylesheet" href="css/custom.css?version=2.9">
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
				<figure class="logo" style="text-align: center; margin: 0px 0px;">
					<img style="width: 12%;" src="img/factory_pattern_logo.png" alt="factory_pattern_logo.png">
				</figure>
				<h1>PATRÓN DE LA FACTORÍA ABSTRACTA</h1>

				<div class="empty-space"></div>

				<div class="row">
					<h3 class="left">LA FÁBRICA DE OBJETOS</h3>
					<p>El patrón de la factoría abstracta es un tipo de <span class="negrita">patrón creacional</span> más avanzado que el patrón de la factoría. Este patrón no crea instancias, sino que crea otras factorías que sí puedan crear instancias de obetos. Son factorías de factorías y está orientado a combinar las instancias.</p>
					<br>

				</div>

				<div class="empty-space"></div>

				<div class="row">
					<div class="wrapper column">
						
						<div class="col2-3">
							<h3 class="left">CASO DE USO</h3>
							<p>Supongamos que somos los dueños de la empresa "Pakolin" que fabrica colchones.</p>
							<p>"Pakolin" fabrica colchones compuestos por capas: 
								<ul>
									<li>Una capa externa</li>
									<li>Una capa interna.</li>
								</ul>
							</p>
							<p>Podemos recurrir entonces a la factoría abstracta, ya que las capas que componen un colchón interactúan entre sí para conformar el producto final, nuestro colchón.</p>
						</div>

						<div class="col1-3">
							<figure>
								<img src="img/pakolin.png" alt="pakolin">
							</figure>
						</div>
					</div>
				</div>


				<div class="row">
					<div class="wrapper">
						<div>
							<h3 class="left">CREACIÓN DE LAS INTERFACES</h3>
							<p>Creamos 2 <span class="code crimson">interfaces</span> para cada una de las capas que vamos a encontrar, la capa externa y la capa interna.</p>
						</div>

						<br>

						<div>
							<p>La <span class="code crimson">primera interfaz</span>, para la capa interior del colchón contiene 2 métodos implementables: <span class="code green">tipo</span> y <span class="code green">firmeza</span>.</p>
						</div>

						<div>
							<figure>
								<img src="img/interface_exterior.png" alt="interface_exterior">
							</figure>
						</div>

						<br>

						<div>
							<p>De la misma forma, creamos la <span class="code crimson">segunda interface</span> para la capa externa del colchón. Provee de otros 2 métodos: <span class="code green">nombre</span> y <span class="code green">grosor</span>.</p>
						</div>

						<div>
							<figure>
								<img src="img/interface_interior.png" alt="interface_interior">
							</figure>
						</div>
					</div>
				</div>

				<div class="empty-space"></div>

				<div class="row">
					<div class="wrapper">
						<div>
							<h3 class="left">CREAMOS NUESTRAS CLASES</h3>
							<p>Las capas externas e internas de los colchones pueden ser muy variadas, podemos tener muchas combinaciones, por ejemplo, colchones de muelles con una capa externa viscoelástica, colchones de espuma con fibra de poliéter de 5, 10 o 15cm, colchones de agua con visco... hay multitud de combinaciones.</p>
							<br>
							<p>La <span class="code crimson">fábrica abstracta</span> precisamente resuelve este tipo de asuntos, nos abstrae y nos faclita la creación de productos independentemente de sus componentes.</p>
							<br>
							<p>Vamos primero a crear ahora nuestras clases, las que implementarán las interfaces que tenemos.</p>
							<p>Por un lado podremos tener colchones de muelles o de espuma (para la base o capa <span class="code crimson">interior</span> de un colchón), qunque podríamos tener muchas más. De hecho veremos más adelante lo fácil que es implementar un nuevo material interior para colchones.</p>
						</div>
						<br>
						<div>
							<p>Creamos una clase <span class="code crimson">muelles</span> que evidentemente es una capa interna.</p>
							<figure>
								<img src="img/class_muelles.png" alt="class_muelles">
							</figure>
						</div>
						<div>
							<p>Hacemos lo mismo para una clase <span class="code crimson">espuma</span>.</p>
							<figure>
								<img src="img/class_espuma.png" alt="class_espuma">
							</figure>
						</div>
						<br>
						<div>
							<p>Nuestra fábrica recubre los colchones con capas externas, que pueden ser capas de <span class="code crimson">fibra</span> o capas viscoelásticas (<span class="code crimson">visco</span>). </p>
							<p>Realizamos el mismo proceso que para los muelles y la espuma, pero esta vez, los recubrimientos serán externos (implementarán los métodos de la interfaz <span class="code green">Exterior</span>).</p>
							<figure>
								<img src="img/class_visco.png" alt="class_visco">
							</figure>
						</div>
						<div>
							<p>Lo mismo en la clase <span class="code crimson">fibra</span>.</p>
							<figure>
								<img src="img/class_fibra.png" alt="class_fibra">
							</figure>
						</div>
					</div>
				</div>


				<div class="empty-space"></div>

				<div class="row">
					<div class="wrapper">
						<div>
							<h3 class="left">CREAMOS NUESTRA FACTORÍA ABSTRACTA</h3>
							<p>Este paso es uno de los 2 pasos importantes en este asunto. Creamos una factoría abstracta que tendrá 2 métodos, también abstractos, que recogen el tipo de materiales con los que construimos los colchones:  el <span class="code green">interno</span> y  <span class="code green">externo</span></p>
							<br>
							<p>Ésta clase será por tanto la fábrica de fábricas, lo top de lo top en la industria del colchón. La clase contiene 2 métodos que serán implementados en las clases hijas que hereden de la <span class="code green">Abstract Factory</span></p>
						</div>

						<div>
							<figure>
								<img src="img/abstractfactory.png" alt="abstractfactory.png">
							</figure>
						</div>
					</div>
				</div>

				<div class="empty-space"></div>

				<div class="row">
					<div class="wrapper">
						<div>
							<h3 class="left">CREAMOS NUESTRAS FACTORÍAS</h3>
							<p>Segundo paso importante, creamos nuestras fábricas, la <span class="code green">fábrica de exteriores</span> y la <span class="code green">fábrica de interiores</span> que extenderán de nuestra factoría abstracta.</p>
						</div>

						<div>
							<figure>
								<img src="img/factory_exterior.png" alt="factory_exterior.png">
							</figure>
						</div>
						<div>
							<figure>
								<img src="img/factory_interior.png" alt="factory_interior.png">
							</figure>
						</div>
					</div>
				</div>

				<div class="empty-space"></div>

				<div class="row">
					<div class="wrapper">
						<div>
							<h3 class="left">GENERADOR DE FACTORÍAS</h3>
							<p>Por último generamos un generador de fábricas abstractas, <span class="code crimson">GeneradorFactorias</span></p>
						</div>

						<div>
							<figure>
								<img src="img/generador_factorias.png" alt="generador_factorias.png">
							</figure>
						</div>
					</div>
				</div>


				<div class="empty-space"></div>

				<div class="row">
					<div class="wrapper">
						<div>
							<h3 class="left">INSTANCIACIÓN DE CLASES</h3>
							<p>Y por fin obtenemos nuestros materiales para la fabricación del colchón <span class="code crimson">"Pakolin"</span></p>
							
							<?php 
							$factoria_externa = (new GeneradorFactorias())->getFactoria('EXT');
							$factoria_interna = (new GeneradorFactorias())->getFactoria('INT');

							$tipo_exterior    = $factoria_externa->getExterior('VIS')->tipo();
							$calidad_exterior = $factoria_externa->getExterior('VIS')->calidad();

							$nombre_interior  = $factoria_interna->getInterior('ESP')->nombre();
							$grosor_interior  = $factoria_interna->getInterior('ESP')->grosor();

							?>

							<div>
								<figure>
									<img src="img/res_colchones.png" alt="res_colchones.png">
								</figure>
							</div>
							<br>

							<p>
								El colchón fabricado tendrá las siguientes características: 
								<ul>
									<li>Capa Exterior: <?php echo $tipo_exterior. '.'; ?></li>
									<li>Calidad:       <?php echo $calidad_exterior. '.'; ?></li>
									<li>Relleno:       <?php echo $nombre_interior. '.'; ?></li>
									<li>Grosor: <?php echo $grosor_interior. '.'; ?></li>
								</ul>
							</p>

						</div>


					</div>
				</div>

				<br><br>


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