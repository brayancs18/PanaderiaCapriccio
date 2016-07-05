@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-warning">
			<p>					           
						
				{!! Form::model($venta, ['route' => ['ventas.update', $venta->venta_id ], 'method'=>'PUT','class' => 'form-horizontal']) !!}
						
						<div class="form-group">
							<label for="book-title" class="col-sm-3 control-label label-warning">Cliente</label>

							<div class="col-sm-6">
								  <select class="form-control" name="cliente_id">
								    @foreach($clientes as $cliente)
								      <option value="{{$cliente->cliente_id}}">{{$cliente->apellidos}}</option>
								    @endforeach
								  </select>
							</div>
						</div>
						<div class="form-group">
							<label for="book-title" class="col-sm-3 control-label label-warning">Producto</label>

							<div class="col-sm-6">
								  <select class="form-control" name="codigo">
								    @foreach($productos as $producto)
								      <option value="{{$producto->codigo}}">{{$producto->nombre}}</option>
								    @endforeach
								  </select>
							</div>
						</div>
						<div class="form-group">
							<label for="book-title" class="col-sm-3 control-label label-warning">Cantidad</label>

							<div class="col-sm-6">
								<input type="text" name="cantidad" id="book-title" class="form-control" value="{{ $venta->cantidad }}">
							</div>
						</div>
						<div class="form-group">
							<label for="book-title" class="col-sm-3 control-label label-warning" >Precio</label>

							<div class="col-sm-6">
								<input type="text" name="precio" id="book-title" class="form-control" value="{{ $venta->precio }}">
							</div>
						</div>
						
						<div class="form-group">
							<label for="book-title" class="col-sm-3 control-label label-warning" >Total</label>
                            <div class="col-sm-6">

							<input type="text" name="total" id="book-title" class="form-control" value="{{ $venta->total }}" disabled="disabled">
							</div>
						</div>
					
					    <!-- Insertar fecha -->
						
						
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