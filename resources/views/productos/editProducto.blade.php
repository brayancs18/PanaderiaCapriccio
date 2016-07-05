@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-warning">
			<p>					           
						
				
				{!! Form::model($producto, ['route' => ['productos.update', $producto->codigo ], 'method'=>'PUT','class' => 'form-horizontal']) !!}
						
						<!-- Task Title -->
						<div class="form-group">
							<label for="book-title" class="col-sm-3 control-label label-warning">Nombre Producto</label>

							<div class="col-sm-6">
								<input type="text" name="nombre" id="book-title" class="form-control" value="{{ $producto->nombre }}">
							</div>							
						</div>
						<div class="form-group">
							<label for="book-title" class="col-sm-3 control-label label-warning">Precio</label>

							<div class="col-sm-6">
								<input type="text" name="precio" id="book-title" class="form-control" value="{{ $producto->precio }}">
							</div>							
						</div>
						<div class="form-group">
							<label for="book-title" class="col-sm-3 control-label label-warning">Stock</label>

							<div class="col-sm-6">
								<input type="text" name="stock" id="book-title" class="form-control" value="{{ $producto->stock }}">
							</div>							
						</div>
						
						<!-- Fin de Mostrar producto -->
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6">
								<button type="submit" class="btn btn-success">
									<img src="/PanaderiaCapriccio/iconos/technology.png" width="20" height="20">Guardar	
								</button>
							</div>
						</div>					

				{!! Form::close() !!}

			</div>
		</div>
	</div>
@endsection