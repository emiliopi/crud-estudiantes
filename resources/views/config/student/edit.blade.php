@extends('admin.index')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb rounded-pill">
		<li class="breadcrumb-item"><a href="/"><i class="bx bx-home"></i></a></li>
		<li class="breadcrumb-item"><a href="/student/list">Estudiates</a></li>
		<li class="breadcrumb-item active" aria-current="page">Editando Estudiainte: {{ $student->name }}</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="content-header row">
	<div class="col-md-12 col-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Crear usuario</h4>
			</div>
			<div class="card-content">
				<div class="card-body">
					{!! Form::open(['url'=>['student/update','id'=>$student->id], 'method'=>'put']) !!}
					<div class="form-body">
						<div class="row">
							<div class="col-md-6 form-group ">
								<label for="name">Nombres</label>
								<div class="position-relative has-icon-left">
									{!! Form::text('name',$student->name,['class'=>'form-control','id'=>'name','placeholder'=>'Nombres']) !!}
									<div class="form-control-position">
										<i class="bx bx-list-ul" id="view-icon"></i>
									</div>
								</div>
								@error('name')
								   <p class="text-danger">{{ $message }}</p>
								@enderror
							</div>
							<div class="col-md-6 form-group ">
								<label for="lastname">Apellidos</label>
								<div class="position-relative has-icon-left">
									{!! Form::text('lastname',$student->lastname,['class'=>'form-control','id'=>'lastname','placeholder'=>'Apellidos']) !!}
									<div class="form-control-position">
										<i class="bx bx-list-ul" id="view-icon"></i>
									</div>
								</div>
								@error('lastname')
								   <p class="text-danger">{{ $message }}</p>
								@enderror
							</div>
							<div class="col-md-6 form-group">
								<label for="email">Correo electrónico</label>
								<div class="position-relative has-icon-left">
									{!! Form::email('email',$student->email,['class'=>'form-control','id'=>'email','placeholder'=>'Correo electrónico']) !!}
									<div class="form-control-position">
										<i class="bx bx-edit-alt"></i>
									</div>
								</div>
								@error('email')
								   <p class="text-danger">{{ $message }}</p>
								@enderror
							</div>
							<div class="col-md-6 form-group">
								<label for="age">Edad</label>
								<div class="position-relative has-icon-left">
									{!! Form::number('age',$student->age,['class'=>'form-control','id'=>'age','placeholder'=>'Edad']) !!}
									<div class="form-control-position">
										<i class="bx bx-edit-alt"></i>
									</div>
								</div>
								@error('age')
								   <p class="text-danger">{{ $message }}</p>
								@enderror
							</div>
							<div class="col-md-6 form-group">
								<label for="phone">Telefono</label>
								<div class="position-relative has-icon-left">
									{!! Form::number('phone',$student->phone,['class'=>'form-control','id'=>'phone','placeholder'=>'Telefono']) !!}
									<div class="form-control-position">
										<i class="bx bx-edit-alt"></i>
									</div>
								</div>
								@error('phone')
								   <p class="text-danger">{{ $message }}</p>
								@enderror
							</div>
							<div class="col-md-6 form-group">
								<label for="address">Dirección</label>
								<div class="position-relative has-icon-left">
									{!! Form::text('address',$student->address,['class'=>'form-control','id'=>'address','placeholder'=>'Dirección']) !!}
									<div class="form-control-position">
										<i class="bx bx-edit-alt"></i>
									</div>
								</div>
								@error('address')
								   <p class="text-danger">{{ $message }}</p>
								@enderror
							</div>
							<div class="col-md-6 form-group">
								<label for="father">Nombre de padre</label>
								<div class="position-relative has-icon-left">
									{!! Form::text('father',$student->father,['class'=>'form-control','id'=>'father','placeholder'=>'Nombre de padre']) !!}
									<div class="form-control-position">
										<i class="bx bx-edit-alt"></i>
									</div>
								</div>
								@error('father')
								   <p class="text-danger">{{ $message }}</p>
								@enderror
							</div>
							<div class="col-md-6 form-group">
								<label for="mother">Nombre de madre</label>
								<div class="position-relative has-icon-left">
									{!! Form::text('mother',$student->mother,['class'=>'form-control','id'=>'mother','placeholder'=>'Nombre de madre']) !!}
									<div class="form-control-position">
										<i class="bx bx-edit-alt"></i>
									</div>
								</div>
								@error('mother')
								   <p class="text-danger">{{ $message }}</p>
								@enderror
							</div>
							<div class="col-12 d-flex justify-content-end ">
								<button type="submit" class="btn btn-primary">Editar</button>
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