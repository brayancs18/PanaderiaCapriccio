@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-info">
				<div class="panel-heading">
					Nueva Empresa
				</div>

				<div class="panel-body">

					<!-- Display Validation Errors -->
					@include('common.errors')

					{!! Form::open(array('route' => 'empresas.index', 'class' => 'form-horizontal', 'class'=>'navbar-form navbar-left pull-right',  'method' => 'GET', 'role'=>'searc' )) !!}
					
					  <div class="form-group">
					    {!! Form::text('nombre_empresa',null,['class'=>'form-control', 'placeholder'=>'Nombre de empresa']   ) !!}
					  </div>
					  <button type="submit" class="btn btn-danger">Buscar</button>
					{!! Form::close() !!}

					<!-- New Task Form -->
					<a class="btn btn-info" href="/PanaderiaCapriccio/public/empresas/create" role="button">Registrar Empresa</a>				
				</div>
			</div>

			<!-- Current escuelas -->
			@if (count($empresas) > 0)
				<div class="panel panel-info">
					<div class="panel-heading">
						Reporte Empresas
					</div>

					<div class="panel-body">
						<table class="table table-striped empresa-table">
							<thead>
								<th>Id</th>
								<th>Nombre Empresa</th>
						
							</thead>
							<tbody>
								@foreach ($empresas as $empresa)
									<tr>
										
										<td class="table-text">
											<div>{{ $empresa->empresa_id }}</div>
									    </td>
									    <td class="table-text">
											<div>{{ $empresa->nombre_empresa }}</div>
									    </td>
										

										<!-- Task Delete Button -->
										<td>
											<form action="/PanaderiaCapriccio/public/empresas/{{ $empresa->empresa_id  }}" method="POST">
												{{ csrf_field() }}
												{{ method_field('DELETE') }}

												<button type="submit" id="delete-empresas-{{ $empresa->empresa_id  }}" class="btn btn-danger">
													<i class="fa fa-btn fa-trash"></i>Delete
												</button>
											</form>
										</td>

										<td>
											<form action="/PanaderiaCapriccio/public/empresas/{{ $empresa->empresa_id  }}" method="GET">
												<button type="submit" id="mostrar-{{ $empresa->empresa_id  }}" class="btn btn-info">
													<i class="btn-info"></i>Mostrar
												</button>
											</form>
										</td>

										<!-- Task Delete Button -->
										<td>
											<form action="empresas/{{ $empresa->empresa_id  }}/edit" method="GET">
												<button type="submit" id="mostrar-{{ $empresa->empresa_id  }}" class="btn btn-info">
													<i class="btn-info"></i>Editar
												</button>
											</form>
										</td>
									</tr>
								@endforeach

								{!!$empresas->render()!!}
							</tbody>
						</table>
					</div>
				</div>
			@endif
		</div>
	</div>
@endsection
