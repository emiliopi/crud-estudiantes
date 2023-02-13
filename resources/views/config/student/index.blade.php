@extends('admin.index')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb rounded-pill">
        <li class="breadcrumb-item"><a href="/"><i class="bx bx-home"></i></a></li>
		<li class="breadcrumb-item active" aria-current="page">Estudiantes</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="row">
	<div class="col-12 col-sm-12">
		<div class="content-body">
			<div class="row">
				<div class="col-md-10">
					<section class="search-bar-wrapper">
						<div class="search-bar">
							{!! Form::open(['url'=>['student/find'], 'method'=>'get']) !!}
							<fieldset class="search-input form-group position-relative">
								{!! Form::text('search', request()->input('search'), ['class'=>'form-control rounded-right form-control-lg shadow pl-2', 'placeholder'=>'Buscar','autofocus','autocomplete'=>'off']) !!}
								<button class="btn btn-primary search-btn rounded" type="submit">
									<span class="d-none d-sm-block">Buscar</span>
									<i class="bx bx-search d-block d-sm-none"></i>
								</button>
							</fieldset>
							{!! Form::close() !!}
						</div>
					</section>
				</div>
				<div class="col-md-2">
					@if(auth()->user()->rol->create)
						<a href="/student/create" class="btn btn-outline-primary btn-lg btn-block">Crear</a>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
<section id="table-success">
	<div class="card">
		<!-- datatable start -->
		<div class="table-responsive">
			<table id="table-extended-success" class="table mb-0">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Correo</th>
						<th>Edad</th>
						<th>Telefono</th>
						<th>Direccion</th>
						<th>Padre</th>
						<th>Madre</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach($students as $student)
					<tr style="height: 0px">
						<td class="text-bold-600">{{ $student->name }}</td>
						<td class="text-bold-600">{{ $student->lastname }}</td>
						<td class="text-bold-600">{{ $student->email }}</td>
						<td class="text-bold-600">{{ $student->age }}</td>
						<td class="text-bold-600">{{ $student->phone }}</td>
						<td class="text-bold-600">{{ $student->address }}</td>
						<td class="text-bold-600">{{ $student->father }}</td>
						<td class="text-bold-600">{{ $student->mother }}</td>
						<td>{!! $student->actions() !!}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<!-- datatable ends -->
	</div>
	{{ $students->appends(request()->input())->links() }}
</section>
@endsection
@section('css_vendor')
<link rel="stylesheet" type="text/css" href="{{ mix('/css/vendor/swiper.min.css') }}">
@endsection

@section('css_page')
<link rel="stylesheet" type="text/css" href="{{ mix('/css/page/search.css') }}">
<link rel="stylesheet" type="text/css" href="{{ mix('/css/page/swiper.css') }}">
@endsection

@section('js_page')
<script src="{{ mix('/js/page/swiper.min.js') }}"></script>
@endsection

@section('js_custom')
<script src="{{ mix('/js/custom/page-search.js') }}"></script>
<script src="/acciones/student.js"></script>
@endsection