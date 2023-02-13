@extends('admin.index')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb rounded-pill">
		<li class="breadcrumb-item"><a href="/"><i class="bx bx-home"></i></a></li>
		<li class="breadcrumb-item"><a href="/student/list">Estudiantes</a></li>
		<li class="breadcrumb-item active" aria-current="page">Asignar Materias</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="content-header row">
	<div class="col-md-12 col-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Asignar Materias</h4>
			</div>
			<div class="card-content">
				<div class="card-body">
					{!! Form::open(['url'=>['student/assigment_store'], 'method'=>'post']) !!}
						<div class="form-body">
							<div class="row">
								<div class="col-md-12 form-group">
									<label for="subjects">Materias</label>
									<div class="position-relative has-icon-left">
										{!! Form::hidden('id',$student->id) !!}
										{!! Form::select('subjects[]',$subjects,$subjects_student,['class'=>'select2 form-control','id'=>'subjects','multiple', 'required']) !!}
									</div>
									@error('subjects')
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