@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-warning">
			<p>					           
				
				@foreach ($productos as $producto)			

					{!! Form::model($producto, ['route' => ['productos.index'], 'method'=>'GET','class' => 'form-horizontal']) !!}
						<div class="form-group">
							<label for="codigo" class="col-sm-3 control-label label-warning">Codigo</label>

							<div class="col-sm-6">
								<input type="text" name="codigo" id="book-title" class="form-control" value="{{ $producto->codigo }}" disabled="disabled">
							</div>
						</div>
						<div class="form-group">
							<label for="nombre" class="col-sm-3 control-label label-warning">DNI</label>

							<div class="col-sm-6">
								<input type="text" name="nombre" id="book-title" class="form-control" value="{{ $producto->nombre }}" disabled="disabled">
							</div>
						</div>
						<div class="form-group">
							<label for="precio" class="col-sm-3 control-label label-warning">Apellidos</label>

							<div class="col-sm-6">
								<input type="text" name="precio" id="book-title" class="form-control" value="{{ $producto->precio }}" disabled="disabled">
							</div>
						</div>
						<div class="form-group">
							<label for="book-title" class="col-sm-3 control-label label-warning">Nombres</label>

							<div class="col-sm-6">
								<input type="text" name="stock" id="book-title" class="form-control" value="{{ $producto->stock }}" disabled="disabled">
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6">
								<button type="submit" class="btn btn-success">
									<i class="glyphicon glyphicon-chevron-left"></i>Regresar	
								</button>
							</div>
						</div>					

				{!! Form::close() !!}									    
				@endforeach
				</form>
			</div>
		</div>
	</div>
@endsection