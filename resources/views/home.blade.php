@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Touch 2.0</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container-fluid gedf-wrapper">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card">
                                    <!-- columna izquierda datos personales -->
                                    <div class="card-body">

                                        <div class="text-center">
                                                <a href="" data-toggle="modal" data-target="#exampleModal">
                                                    <img class="img-fluid" src="storage/images/users/{{ Auth::user()->foto }}" alt="">
                                                </a>
                                                <div class="h3 mt-2">{{ Auth::user()->name }}</div>
                                        </div>
                                        <div class="h5">{{ Auth::user()->perfil }}</div>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Cambiar imagen de perfil</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                <form action="/foto" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="file" name="foto">

                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                    <button value={{ Auth::user()->id }} type="submit" class="btn btn-primary" name='id'>Aceptar</button>
                                                    </div>
                                                </form>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- seguidores y seguidos -->
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <div class="h6 text-muted">Seguidores</div>
                                            <div class="h5">52342</div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="h6 text-muted">Siguiendo</div>
                                            <div class="h5">6758</div>
                                        </li>
                                        <li class="list-group-item">Mensajes</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 gedf-main">
                                <!--- hacer una publicacion-->
                                <div class="card gedf-card">
                                    <div class="card-header">
                                        <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="posts-tab" data-toggle="tab" href="#posts" role="tab" aria-controls="posts" aria-selected="true">Hacer una Publicación</a>
                                            </li>

                                            <!-- publicar una imagen -->
                                            <li class="nav-item">
                                                <a class="nav-link" id="images-tab" data-toggle="tab" role="tab" aria-controls="images" aria-selected="false" href="#images">Subi una Imagen</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <!-- area para escribir una publicacion -->
                                    <div class="card-body">
                                        <form action="/publica" method="POST" id="publicar" enctype="multipart/form-data">
                                            @csrf
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">

                                                    <div class="form-group">
                                                        <input type="text" name="titulo" placeholder="titulo de la publicacion" size="48" class="form-control @error('titulo') is-invalid @enderror" value="{{ old('titulo') }}" required>
                                                        @error('titulo')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        <textarea class="form-control mt-2" id="message" rows="3" placeholder="¿Qué tenés ganas de contar?" form="publicar" name="publica" class="@error('publica') is-invalid @enderror" required></textarea>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="images-tab">
                                                    <div class="form-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="customFile" name="imagen">
                                                            <label class="custom-file-label" for="customFile">Carga de imágenes</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- boton para compartir -->
                                            <div class="btn-toolbar justify-content-between">
                                                <div class="btn-group">
                                                    <button type="submit" class="btn btn-primary">Compartir</button>
                                                </div>
                                            <!-- menu desplegable -->
                                                <div class="btn-group">
                                                    <button id="btnGroupDrop1" type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i class="fa fa-globe"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="btnGroupDrop1">
                                                        <a class="dropdown-item" href="#"><i class="fa fa-globe"></i> Publico</a>
                                                        <a class="dropdown-item" href="#"><i class="fa fa-users"></i> Amigos</a>
                                                        <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Solo yo</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!--publicacion-->
                                @foreach ($publicado as $publica)
                                <div class="card gedf-card mt-3">

                                    <div class="card-header ">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <!-- primer imagen de publicacion -->
                                                <div class="mr-2">
                                                    <img class="rounded-circle" width="45" src="storage/images/users/{{$publica->user->foto}}" alt="">
                                                </div>
                                                <!-- usuario y quien publico  -->
                                                <div class="ml-2">
                                                    <div class="h7 text-muted">Publicado por:</div>
                                                    <div class="h5 m-0">{{$publica->user->name}}</div>
                                                </div>
                                            </div>
                                            <div>
                                                <!-- boton para puntos de configuracion -->
                                                <div class="dropdown">
                                                    <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-h"></i>
                                                    </button>

                                                    <!-- eleccion de configuracion -->
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                                                        <div class="h6 dropdown-header">Configuracion</div>
                                                    <a class="dropdown-item" href="/siguiendo/{{$publica->user->id}}">Seguir</a>
                                                        <a class="dropdown-item" href="#">Ocultar</a>
                                                        <a class="dropdown-item" href="#">Reportar</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- tiempo que lo publico -->

                                    <div class="card-body">

                                        <div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i>publicado {{$publica->created_at->diffForHumans()}}</div>
                                        <h5 class="card-title">{{$publica->titulo}}</h5>
                                        @if (isset($publica->imagen))
                                            <img class="img-fluid" src="storage/images/publication/{{$publica->imagen}}" alt="">
                                        @endif


                                        <!-- texto publicAdo -->
                                        <p class="card-text">{{$publica->publicacion}}</p>
                                    </div>

                                    <!-- boton de mg comentar  -->
                                    @if ($publica->user_id == Auth::user()->id)
                                    <div class="card-footer">
                                    <a href="/eliminarPublica/{{$publica->id}}" class="card-link"><i class="fa fa-gittip"></i> Eliminar</a>
                                        <a href="#" class="card-link"><i class="fa fa-comment"></i> Editar</a>
                                    </div>
                                    @else
                                    <div class="card-footer">
                                        <a href="#" class="card-link"><i class="fa fa-gittip"></i> Me gusta</a>
                                        <a href="#" class="card-link"><i class="fa fa-comment"></i> Comentar</a>
                                        <a href="#" class="card-link"><i class="fa fa-mail-forward"></i> Compartir</a>
                                    </div>
                                    @endif


                                </div>
                                @endforeach
                                <div class="d-flex justify-content-center my-4">
                                    <p>{{$publicado->links()}}</p>
                                </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
