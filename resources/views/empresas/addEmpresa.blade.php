@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-info">					           
						
				{!! Form::open(array('route' => 'empresas.store', 'class' => 'form-horizontal', 'method' => 'POST' )) !!}
						<!-- Task Title -->
						<div class="form-group">
							<label for="nombre_empresa" class="col-sm-3 control-label">Nombre de la Empresa</label>

							<div class="col-sm-6">
								<input type="text" name="nombre_empresa" id="nombre_empresa" class="form-control" placeholder="Nombre de la empresa">
							</div>
						</div>
						
						
						<!-- Add Task Button -->
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6">
								<button type="submit" class="btn btn-info">
									<i class="fa fa-btn fa-plus"></i>Agregar empresa
								</button>
							</div>
						</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@endsection