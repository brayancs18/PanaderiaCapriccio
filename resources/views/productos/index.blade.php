@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-warning">
				<div class="panel-heading">
					<b>Nuevo Producto</b>
				</div>

				<div class="panel-body ">

					<!-- Display Validation Errors -->
					@include('common.errors')

					{!! Form::open(array('route' => 'productos.index', 'class' => 'form-horizontal', 'class'=>'navbar-form navbar-left pull-right',  'method' => 'GET', 'role'=>'searc' )) !!}
					
					  <div class="form-group">
					    {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'Nombre Producto']   ) !!}
					  </div>
					  <button type="submit" class="btn btn-success"><img src="/PanaderiaCapriccio/iconos/worldwide.png" width="20" height="20">Buscar</button>
					{!! Form::close() !!}

					<!-- New Task Form -->
					<a class="btn btn-warning" href="/PanaderiaCapriccio/public/productos/create" role="button"><img src="/PanaderiaCapriccio/iconos/add.png" width="20" height="20">Registrar Producto</a>				
				</div>
			</div>

			<!-- Current escuelas -->
			@if (count($productos) > 0)
				<div class="panel panel-warning">
					<div class="panel-heading">
						<b>Reporte Productos</b>
					</div>

					<div class="panel-body label-warning">
						<table class="table table-striped producto-table">
							<thead>
								<th>Codigo producto</th>
								<th>Nombre</th>
								<th>Precio</th>
								<th>Stock</th>
						
							</thead>
							<tbody>
								@foreach ($productos as $producto)
									<tr>
										
										<td class="table-text">
											<div>{{ $producto->codigo }}</div>
									    </td>
									    <td class="table-text">
											<div>{{ $producto->nombre }}</div>
									    </td>
									    <td class="table-text">
											<div>{{ $producto->precio }}</div>
									    </td>
									    <td class="table-text">
											<div>{{ $producto->stock }}</div>
									    </td>
										

										<!-- Task Delete Button -->
										<td>
											<form action="/PanaderiaCapriccio/public/productos/{{ $producto->codigo  }}" method="POST">
												{{ csrf_field() }}
												{{ method_field('DELETE') }}

												<button type="submit" id="delete-productos-{{ $producto->codigo  }}" class="btn btn-danger">
													<img src="/PanaderiaCapriccio/iconos/delete.png" width="20" height="20">Delete
												</button>
											</form>
										</td>

										<td>
											<form action="/PanaderiaCapriccio/public/productos/{{ $producto->codigo  }}" method="GET">
												<button type="submit" id="mostrar-{{ $producto->codigo  }}" class="btn btn-primary">
													<img src="/PanaderiaCapriccio/iconos/eye.png" width="20" height="20">Mostrar
												</button>
											</form>
										</td>

										<!-- Task Delete Button -->
										<td>
											<form action="productos/{{ $producto->codigo  }}/edit" method="GET">
												<button type="submit" id="mostrar-{{ $producto->codigo  }}" class="btn btn-success">
													<img src="/PanaderiaCapriccio/iconos/settings.png" width="20" height="20">Editar
												</button>
											</form>
										</td>
									</tr>
								@endforeach

								{!!$productos->render()!!}
							</tbody>
						</table>
					</div>
				</div>
			@endif
		</div>
	</div>
@endsection
