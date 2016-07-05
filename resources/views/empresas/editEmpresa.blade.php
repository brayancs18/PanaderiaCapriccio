@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-info">					           
						
				
				{!! Form::model($empresa, ['route' => ['empresas.update', $empresa->empresa_id ], 'method'=>'PUT','class' => 'form-horizontal']) !!}
						
						<!-- Task Title -->
						<div class="form-group">
							<label for="book-title" class="col-sm-3 control-label">Nombre de la empresa</label>

							<div class="col-sm-6">
								<input type="text" name="nombre_empresa" id="book-title" class="form-control" value="{{ $empresa->nombre_empresa }}">
							</div>							
						</div>
						
						<!-- Fin de Mostrar empresa -->
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6">
								<button type="submit" class="btn btn-info">
									<i class="fa fa-btn fa-plus"></i>Guardar	
								</button>
							</div>
						</div>					

				{!! Form::close() !!}

			</div>
		</div>
	</div>
@endsection