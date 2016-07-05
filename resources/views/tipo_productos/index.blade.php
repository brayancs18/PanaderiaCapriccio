@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-info">
				<div class="panel-heading">
					Nuevo tipo de producto
				</div>

				<div class="panel-body">

					<!-- Display Validation Errors -->
					@include('common.errors')

					{!! Form::open(array('route' => 'tipo_productos.index', 'class' => 'form-horizontal', 'class'=>'navbar-form navbar-left pull-right',  'method' => 'GET', 'role'=>'searc' )) !!}
					
					  <div class="form-group">
					    {!! Form::text('nombre_producto',null,['class'=>'form-control', 'placeholder'=>'Nombre de tipo de producto']   ) !!}
					  </div>
					  <button type="submit" class="btn btn-danger">Buscar</button>
					{!! Form::close() !!}

					<!-- New Task Form -->
					<a class="btn btn-info" href="/PanaderiaCapriccio/public/tipo_productos/create" role="button">Registrar</a>				
				</div>
			</div>

			<!-- Current escuelas -->
			@if (count($tipo_productos) > 0)
				<div class="panel panel-info">
					<div class="panel-heading">
						Reporte tipo Productos
					</div>

					<div class="panel-body">
						<table class="table table-striped tipo_productos-table">
							<thead>
								<th>Id</th>
								<th>Tipo de Producto</th>
						
							</thead>
							<tbody>
								@foreach ($tipo_productos as $tipo_producto)
									<tr>
										
										<td class="table-text">
											<div>{{ $tipo_producto->tipo_producto_id }}</div>
									    </td>
									    <td class="table-text">
											<div>{{ $tipo_producto->nombre_producto }}</div>
									    </td>
										

										<!-- Task Delete Button -->
										<td>
											<form action="/PanaderiaCapriccio/public/tipo_productos/{{ $tipo_producto->tipo_producto_id  }}" method="POST">
												{{ csrf_field() }}
												{{ method_field('DELETE') }}

												<button type="submit" id="delete-tipo_productos-{{ $tipo_producto->tipo_producto_id  }}" class="btn btn-danger">
													<i class="fa fa-btn fa-trash"></i>Delete
												</button>
											</form>
										</td>

										<td>
											<form action="/PanaderiaCapriccio/public/tipo_productos/{{ $tipo_producto->tipo_producto_id  }}" method="GET">
												<button type="submit" id="mostrar-{{ $tipo_producto->tipo_producto_id  }}" class="btn btn-info">
													<i class="btn-info"></i>Mostrar
												</button>
											</form>
										</td>

										<!-- Task Delete Button -->
										<td>
											<form action="tipo_productos/{{ $tipo_producto->tipo_producto_id  }}/edit" method="GET">
												<button type="submit" id="mostrar-{{ $tipo_producto->tipo_producto_id  }}" class="btn btn-info">
													<i class="btn-info"></i>Editar
												</button>
											</form>
										</td>
									</tr>
								@endforeach

								{!!$tipo_productos->render()!!}
							</tbody>
						</table>
					</div>
				</div>
			@endif
		</div>
	</div>
@endsection
