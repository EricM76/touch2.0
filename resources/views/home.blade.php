@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" style="background-color:Ivory;box-shadow: 10px 10px 5px 5px black ;">
                <div class="card-header text-light h4 text-right" style="background-color:DarkSalmon;text-shadow: 0.1em 0.1em black">...estás a solo un <strong>touch</strong>  de encontrar a la persona que deseas...</div>

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
                                                    <img class="img-fluid" src="storage/images/users/{{ Auth::user()->foto }}" alt="foto">
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
                                            <div class="h5">
                                                @foreach ($seguidores as $id)
                                                @foreach ($usuarios as $usuario)
                                                    @if ($usuario->id == $id)
                                                        <img src="storage/images/users/{{$usuario->foto}}" alt="" width="30px">
                                                        {{$usuario->name}}
                                                        <br>
                                                    @endif
                                                @endforeach
                                                @endforeach
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="h6 text-muted">Siguiendo a</div>
                                            <div class="h5">
                                                @foreach ($siguiendo as $id)
                                                @foreach ($usuarios as $usuario)
                                                    @if ($usuario->id == $id)
                                                        <img src="storage/images/users/{{$usuario->foto}}" alt="" width="30px">
                                                        {{$usuario->name}}
                                                        <br>
                                                    @endif
                                                @endforeach
                                                @endforeach
                                            </div>
                                        </li>
                                        <li class="list-group-item">Mensajes</li>
                                    </ul>
                                </div>

                                <div id="carouselExampleSlidesOnly" class="carousel slide my-2" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="/images/banner2a.png" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="/images/banner2b.png" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="/images/banner2c.png" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="/images/banner2d.png" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="/images/banner2e.png" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="/images/banner2f.png" class="d-block w-100" alt="...">
                                        </div>
                                    </div>
                                </div>
                                <img class="my-4" width="100%" src="/images/banner3b.png" alt="">
                            </div>
                             <!--- hacer una publicacion-->

                            <div class="col-md-6 gedf-main">
                                <div class="p-2 mt-2" style="background-color:darkred">
                                    <h4 class="m-2 text-light"><i class="fa fa-paperclip"></i> PUBLICACIONES</h4>
                                </div>
                                <div class="card gedf-card">
                                    <div class="card-header">
                                        <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                                            <li class="nav-item" >
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
                                                        <input type="text" name="titulo" placeholder="titulo de la publicacion" size="48" class="form-control @error('titulo') is-invalid @enderror" value="{{ old('titulo') }}" >
                                                        @error('titulo')
                                                            <span class="invalid-feedback" role="alert">
                                                                <p>{{ $message }}</p>
                                                            </span>
                                                        @enderror
                                                        <textarea class="form-control mt-2 @error('comentarios') is-invalid @enderror" id="comentarios" rows="3" placeholder="¿Qué tenés ganas de contar?" form="publicar" name="comentarios">{{ old('comentarios') }}</textarea>
                                                        @error('comentarios')
                                                            <span class="invalid-feedback" role="alert">
                                                                <p>{{ $message }}</p>
                                                            </span>
                                                        @enderror
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

                                                        <script>
                                                            window.onload = function(){
                                                                var alcance = document.getElementById('alcance');
                                                            }

                                                        </script>
                                                        <a id="publico" class="dropdown-item" href="#" onclick="event.preventDefault();alcance.setAttribute('value','publico');console.log(alcance);"><i class="fa fa-globe"></i> Publico</a>
                                                        <a id="amigos" class="dropdown-item" href="#" onclick="event.preventDefault();alcance.setAttribute('value','amigos');console.log(alcance);"><i class="fa fa-users"></i> Seguidores</a>
                                                        <a id="solo" class="dropdown-item" href="#" onclick="event.preventDefault();alcance.setAttribute('value','solo');console.log(alcance);"><i class="fas fa-user"></i> Solo yo</a>
                                                        <input id="alcance" type="text" name="alcance" hidden>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!--muro publico-->

                                <div class="p-2 mt-2" style="background-color:darkred">
                                    <h4 class="m-2 text-light"><i class="fa fa-globe"></i> MURO PÚBLICO</h4>
                                </div>

                                @foreach ($publico as $publica)
                                <div class="card gedf-card mt-3" style="box-shadow: 2px 2px 2px 2px grey;">

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
                                    <a href="/eliminarPublica/{{$publica->id}}" class="card-link"><i class="fas fa-times-circle"></i> Eliminar</a>
                                        <a href="#" class="card-link"><i class="fas fa-edit"></i> Editar</a>
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
                                    <a href="">ver más publicaciones</a>
                                </div>


                                {{-- muro de amigos --}}

                                <div class="p-2 mt-2" style="background-color:darkred">
                                    <h4 class="m-2 text-light"><i class="fa fa-users"></i> MURO DE AMIGOS</h4>
                                </div>

                                @foreach ($siguiendo as $id)
                                @foreach ($amigos as $publica)
                                @if ($publica->user_id == $id)

                                <div class="card gedf-card mt-3" style="box-shadow: 2px 2px 2px 2px grey;">

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
                                    <a href="/eliminarPublica/{{$publica->id}}" class="card-link"><i class="fas fa-times-circle"></i> Eliminar</a>
                                        <a href="#" class="card-link"><i class="fas fa-edit"></i> Editar</a>
                                    </div>
                                    @else
                                    <div class="card-footer">
                                        <a href="#" class="card-link"><i class="fa fa-gittip"></i> Me gusta</a>
                                        <a href="#" class="card-link"><i class="fa fa-comment"></i> Comentar</a>
                                        <a href="#" class="card-link"><i class="fa fa-mail-forward"></i> Compartir</a>
                                    </div>
                                    @endif


                                </div>
                                @endif
                                @endforeach
                                @endforeach

                                <div class="d-flex justify-content-center my-4">
                                    <a href="">ver más publicaciones</a>
                                </div>


                                {{-- muro personal --}}

                                <div class="p-2 mt-2" style="background-color:darkred">
                                    <h4 class="m-2 text-light"><i class="fa fa-users"></i> MURO PERSONAL</h4>
                                </div>

                                @foreach ($solo as $publica)
                                @if ($publica->user_id == Auth::user()->id)

                                <div class="card gedf-card mt-3" style="box-shadow: 2px 2px 2px 2px grey;">

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
                                    <a href="/eliminarPublica/{{$publica->id}}" class="card-link"><i class="fas fa-times-circle"></i> Eliminar</a>
                                        <a href="#" class="card-link"><i class="fas fa-edit"></i> Editar</a>
                                    </div>
                                    @else
                                    <div class="card-footer">
                                        <a href="#" class="card-link"><i class="fa fa-gittip"></i> Me gusta</a>
                                        <a href="#" class="card-link"><i class="fa fa-comment"></i> Comentar</a>
                                        <a href="#" class="card-link"><i class="fa fa-mail-forward"></i> Compartir</a>
                                    </div>
                                    @endif


                                </div>
                                @endif
                                @endforeach
                                <div class="d-flex justify-content-center my-4">
                                    <a href="">ver más publicaciones</a>
                                </div>

                </div>
                <div class="col-3">
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="/images/banner1a.png" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="/images/banner1b.png" class="d-block w-100" alt="...">
                            </div>
                        </div>
                    </div>
                    <img class="my-4" width="100%" src="/images/banner3a.png" alt="">
                    <img class="my-4" width="100%" src="/images/banner3c.png" alt="">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
