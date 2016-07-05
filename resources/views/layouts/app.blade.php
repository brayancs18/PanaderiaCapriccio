<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Sistema de Ventas</title>
	{!! Html::style('assets/css/bootstrap.css') !!}
	{!! Html::style('assets/css/font-awesome.min.css') !!}
	{!! Html::style('assets/css/bootstrap.min.css') !!}
    {!! Html::style('assets/css/jquery-ui-1.7.2.custom.css') !!}
	{!! Html::script('assets/js/jquery.min.js') !!}
	{!! Html::script('assets/js/jquery-ui.min.js') !!}

	<script type="text/javascript">
		jQuery(function($){
			$.datepicker.regional['es'] = {
				closeText: 'Cerrar',
				prevText: '&#x3c;Ant',
				nextText: 'Sig&#x3e;',
				currentText: 'Hoy',
				monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
				'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
				monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
				'Jul','Ago','Sep','Oct','Nov','Dic'],
				dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
				dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
				dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
				weekHeader: 'Sm',
				dateFormat: 'dd/mm/yy',
				firstDay: 1,
				isRTL: false,
				showMonthAfterYear: false,
				yearSuffix: ''};
			$.datepicker.setDefaults($.datepicker.regional['es']);
		});    

		$(document).ready(function(){
		   $("#datepicker").datepicker({
		    changeMonth: true 
		    });
		});

	</script>
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
  
 	
</head>

<body background="http://localhost/PanaderiaCapriccio/imagenes/f8.jpg">
		<header>
			<div></div>
		</header>

	<div class="container">
		<nav class="navbar navbar-label label-warning">
			<img src="http://localhost/PanaderiaCapriccio/imagenes/logo.png" width="260" height="120" class="img-rounded">
			<img src="http://localhost/PanaderiaCapriccio/imagenes/cupcakes.jpg" width="120" height="100" class="img-rounded">
			<img src="http://localhost/PanaderiaCapriccio/imagenes/empanadas.jpg" width="150" height="100" class="img-rounded">
			<img src="http://localhost/PanaderiaCapriccio/imagenes/muffins.jpg" width="160" height="100" class="img-rounded">
			<img src="http://localhost/PanaderiaCapriccio/imagenes/pan-indio-de-naan-.jpg" width="140" height="100" class="img-rounded">
			<img src="http://localhost/PanaderiaCapriccio/imagenes/taco de piña.jpg" width="140" height="100" class="img-rounded">
			<img src="http://localhost/PanaderiaCapriccio/imagenes/pandenuezsa.jpg" width="140" height="100" class="img-rounded">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>

					<a class="navbar-brand">Sistema de Ventas - Panaderia "CAPRICCIO"</a>
				</div>

				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
					</ul>

					<ul class="nav navbar-nav navbar-right">
						@if (Auth::guest())
							<li><a href="/PanaderiaCapriccio/public/auth/register"><img src="/PanaderiaCapriccio/iconos/profile-1.png" width="20" height="20">Registrarse</a></li>
							<li><a href="/PanaderiaCapriccio/public/auth/login"><img src="/PanaderiaCapriccio/iconos/success.png" width="20" height="20">Ingresar</a></li>
						@else
							<li class="navbar-text"><img src="/PanaderiaCapriccio/iconos/user1.png" width="20" height="20">{{ Auth::user()->name }}</li>
							<li><a href="/PanaderiaCapriccio/public/clientes"><i class="glyphicon glyphicon-sunglasses"></i>Cliente</a></li>
							<li><a href="/PanaderiaCapriccio/public/productos"><i class="glyphicon glyphicon-apple"></i>Producto</a></li>
							<li><a href="/PanaderiaCapriccio/public/ventas"><i class="glyphicon glyphicon-shopping-cart"></i>Venta</a></li>
							<li><a href="/PanaderiaCapriccio/public/auth/logout"><i class="glyphicon glyphicon-remove-sign"></i>Cerrar sesion</a></li>
						@endif
					</ul>
				</div>
			</div>
		</nav>
	</div>



	@yield('content')
	{!! Html::script('assets/js/bootstrap.min.js') !!}
</body>
</html>
