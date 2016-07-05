@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-warning">
			<p>					           
						
				{!! Form::open(array('route' => 'ventas.store', 'class' =>'form-horizontal', 'method' => 'POST' )) !!}

						<!-- Mostrar escuela -->
						<div class="form-group">
							<label for="book-title" class="col-sm-3 control-label label-warning">Apellidos Cliente</label>

							<div class="col-sm-6">
								  <select class="form-control" name="cliente_id">
								  	<!--<option value=0>Seleccionar Apellido Cliente</option>-->
								    @foreach($clientes as $cliente)
								      <option value="{{$cliente->cliente_id}}">{{$cliente->apellidos}} {{$cliente->nombres}}</option>
								    @endforeach
								  </select>
							</div>
						</div>
						
						<div class="form-group">
							<label for="book-title" class="col-sm-3 control-label label-warning">Producto</label>

							<div class="col-sm-6">
								  <select class="form-control" name="codigo">
								    <!--<option value=0>Seleccionar producto</option>-->
								  @foreach($productos as $producto)
								      <option value="{{$producto->codigo}}" >{{$producto->nombre}}</option>
									 @endforeach
								  </select>
								   <!-- 
								   @foreach($productos as $producto)
								   <input type="text" name="precio" value="{{$producto->precio}}" style="background: transparent;">
								   	 @endforeach
								   	 !-->
							</div>
						</div>


						<div class="form-group">
							<label for="cantidad" class="col-sm-3 control-label label-warning">Cantidad</label>

							<div class="col-sm-6">
								<input type="text" name="cantidad" id="book-title" class="form-control" placeholder="Cantidad" required>
							</div>
						</div>
						
						<div class="form-group">
							<label for="precio" class="col-sm-3 control-label label-warning">Precio</label>

							<div class="col-sm-6">
								<input type="text" name="pre" id="book-title" class="form-control" placeholder="Precio" required>
							</div>
						</div>
						<!-- Insertar fecha -->
						<div class="form-group">
							<label for="book-title" class="col-sm-3 control-label label-warning">Fecha</label>
                            <div class="col-sm-6">
														
					                <input type="text" name="fecha" id="datepicker" class="form-control" size="12" placeholder="dd/mm/aa" required />
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