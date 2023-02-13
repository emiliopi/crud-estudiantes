@extends('admin.index')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb rounded-pill">
		<li class="breadcrumb-item"><a href="/"><i class="bx bx-home"></i></a></li>
		<li class="breadcrumb-item"><a href="/usuario">Usuarios</a></li>
		<li class="breadcrumb-item active" aria-current="page">Editando Usuario: {{ $user->name }}</li>
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
					{!! Form::open(['url'=>['usuario/update','id'=>$user->id], 'method'=>'put']) !!}
						<div class="form-body">
							<div class="row">
								<div class="col-md-6 form-group ">
									<label for="name">Nombre</label>
									{!! Form::hidden('id',$user->id) !!}
									<div class="position-relative has-icon-left">
										{!! Form::text('name',$user->name,['class'=>'form-control','id'=>'name','placeholder'=>'Nombre completo']) !!}
										<div class="form-control-position">
											<i class="bx bx-list-ul" id="view-icon"></i>
										</div>
									</div>
									@error('name')
                                       <p class="text-danger">{{ $message }}</p>
                                    @enderror
								</div>
								<div class="col-md-6 form-group">
									<label for="email">Correo electrónico</label>
									<div class="position-relative has-icon-left">
										{!! Form::email('email',$user->email,['class'=>'form-control','id'=>'email','placeholder'=>'Correo electrónico']) !!}
										<div class="form-control-position">
											<i class="bx bx-edit-alt"></i>
										</div>
									</div>
									@error('email')
                                       <p class="text-danger">{{ $message }}</p>
                                    @enderror
								</div>
								<div class="col-md-6 form-group">
									<label for="rol">Rol principal</label>
									<div class="position-relative has-icon-left">
										{!! Form::select('rol',$roles,$user->id_rol,['class'=>'form-control','id'=>'rol','id'=>'basicSelect']) !!}
										<div class="form-control-position">
											<i class="bx bx-user-circle"></i>
										</div>
									</div>
									@error('descripcion')
                                       <p class="text-danger">{{ $message }}</p>
                                    @enderror
								</div>
								<div class="col-md-12 form-group">
									<label for="roles">Roles</label>
									<div class="position-relative has-icon-left">
										{!! Form::select('roles[]',$roles,$lista,['class'=>'select2 form-control','id'=>'roles','multiple']) !!}
									</div>
									@error('roles')
                                       <p class="text-danger">{{ $message }}</p>
                                    @enderror
								</div>
								<div class="col-12 d-flex justify-content-end ">
									<button type="submit" class="btn btn-primary">Actualizar</button>
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