@extends('admin.index')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb rounded-pill">
		<li class="breadcrumb-item"><a href="/"><i class="bx bx-home"></i></a></li>
		<li class="breadcrumb-item"><a href="/subject/list">Materias</a></li>
		<li class="breadcrumb-item active" aria-current="page">Creando Materia</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="content-header row">
	<div class="col-md-12 col-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Crear materia</h4>
			</div>
			<div class="card-content">
				<div class="card-body">
					{!! Form::open(['url'=>['subject/create'], 'method'=>'post']) !!}
						<div class="form-body">
							<div class="row">
								<div class="col-md-12 form-group ">
									<label for="name">Materia</label>
									<div class="position-relative has-icon-left">
										{!! Form::text('name',null,['class'=>'form-control','id'=>'name','placeholder'=>'Materia']) !!}
										<div class="form-control-position">
											<i class="bx bx-list-ul" id="view-icon"></i>
										</div>
									</div>
									@error('name')
                                       <p class="text-danger">{{ $message }}</p>
                                    @enderror
								</div>
								<div class="col-12 d-flex justify-content-end ">
									<button type="submit" class="btn btn-primary">Guardar</button>
								</div>
							</div>
						</div>
					{!! Form::close() !!}	
				</div>
			</div>
		</div>
	</div>
</div>
@endsection