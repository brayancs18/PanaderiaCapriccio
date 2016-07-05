@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-warning">
			<p>					           
						
				{!! Form::open(array('route' => 'productos.store', 'class' => 'form-horizontal', 'method' => 'POST' )) !!}
						<!-- Task Title -->
						<div class="form-group">
							<label for="nombre" class="col-sm-3 control-label label-warning">Nombre Producto</label>

							<div class="col-sm-6">
								<input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre Producto" required>
							</div>
						</div>
						<div class="form-group">
							<label for="precio" class="col-sm-3 control-label label-warning">Precio</label>

							<div class="col-sm-6">
								<input type="text" name="precio" id="precio" class="form-control" placeholder="Precio" required>
							</div>
						</div>
						<div class="form-group">
							<label for="stock" class="col-sm-3 control-label label-warning">Stock</label>

							<div class="col-sm-6">
								<input type="text" name="stock" id="stock" class="form-control" placeholder="Stock" required>
							</div>
						</div>
						
						
						<!-- Add Task Button -->
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6">
								<button type="submit" class="btn btn-success">
									<i class="glyphicon glyphicon-plus-sign"></i>Agregar Producto
								</button>
							</div>
						</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@endsection