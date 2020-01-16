<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Touch 2.0</title>

        <!-- Fonts -->
        <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet"> -->

        <!-- Styles -->
        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="/css/all.css">
        <link rel="stylesheet" href="/css/master.css">

    </head>
    <body>
        {{-- <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

              <!-- navbar  -->

            <div class="content">
                <div class="title m-b-md text-center">
                    <img class="img-fluid" src="images/logo.jpg" alt="" width="25%">
                </div>

                <div class="links">
                    <a href="">Nosotros</a>
                    <a href="">Preguntas Frecuentes</a>
                    <a href="">Testimonios</a>
                </div>
            </div>
        </div> --}}

        <!-- comienza header  -->

        <header class="p-2" style="background-color:rgba(0,0,0,0.8);">
            <nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
              <div class="col-lg-4">
              <a class="marca navbar-brand" href="{{'/'}}"><h1>Touch 2.0</h1></a>
                <div class="d-flex justify-content-end">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                </div>
              </div>
              <div class="collapse navbar-collapse " id="navbarSupportedContent">

                <ul class="navbar-nav mr-auto ml-auto">
                  <li class="nav-item h5">
                    <a class="nav-link active" href="#nosotros">Nosotros</a>
                  </li>
                  <li class="nav-item h5">
                    <a class="nav-link active" href="#preguntasFrecuentes">Preguntas frecuentes</a>
                  </li>
                  <li class="nav-item h5">
                    <a class="nav-link active" href="#testimonios">Testimonios</a>
                  </li>
                </ul>
                <div class="register p-2">
                <a href="{{ route('register') }}"><button class="btn btn-outline-light my-2 my-sm-0" type="button">Registrarse</button></a>
                </div>

              </div>
            </nav>

          </header>
          {{-- login --}}
        <section class="p-3" style="background-color:rgba(0,0,0,0.8);">

        <div class="container h-100 mt-">
    		<div class="d-flex justify-content-center h-100">
    			<div class="user_card mt-5 mb-5">
    				<div class="d-flex justify-content-center">
    					<div class="brand_logo_container">
    						<img src="images/logo.jpg" class="brand_logo" alt="Logo">
    					</div>
    				</div>
    				<div class="d-flex justify-content-center form_container">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
    						<div class="input-group mb-3">
    							<div class="input-group-append">
    								<span class="input-group-text"><i class="fas fa-user"></i></span>
    							</div>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
    						</div>
    						<div class="input-group mb-2">
    							<div class="input-group-append">
    								<span class="input-group-text"><i class="fas fa-key"></i></span>
    							</div>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="contraseña">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
    						</div>

                            <div class="custom-control custom-checkbox">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Recuérdame') }}
                                </label>
                            </div>
    							<div class="d-flex justify-content-center mt-3 login_container">

                         <button type="submit" class="btn login_btn">
                            {{ __('Iniciar Sesión') }}
                        </button>
    				   </div>
    					</form>
    				</div>

    				<div class="mt-4">
    					<div class="d-flex justify-content-center links">
    						¿No tenés cuenta? <a href="/register" class="ml-2">Registrate</a>
    					</div>
    					<div class="d-flex justify-content-center links">
                            @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('¿Olvidaste tu contraseña?') }}
                            </a>
                            @endif
    					</div>
    				</div>
    			</div>
    		</div>
        </div>
        </section>


        {{-- seccion de testimonios --}}
        <section class="testimonios" style="background-color:LightSteelBlue">

            <div id="testimonios" class="container-fluid row pb-5">
              <div class="col-sm-12 col-md-6 col-lg-3 text-center p-3">
                  <img class="rounded-circle mt-2" src="images/angelina.jpg" width="180">
                  <h4 class="mt-4">Angelina Jolie</h4>

                  <p class= "text-dark p-2 m-3">
                     “En Touch 2.0 hay muchas personas en la misma que yo. Soy de EEUU y ahora me encuentro estudiando en Buenos Aires, gracias a esta aplicacion pude hacer  amigos y amigas para no aburrirme y salir a divertirme los fines de semana...y no descarto conocer al amor de mi vida!!”.
                  </p>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-3 text-center p-3">
                  <img class="rounded-circle mt-2" src="images/susana.jpeg" width="180">
                  <h4 class="mt-4">Susana Gimenez</h4>

                  <p class= "text-dark p-2 m-3">
                     "Al principio tenia mis prejuicios con este tipo de aplicaciones, luego una amiga me la recomendo y ahora no puedo parar ...me encanta!! Es una app que me permite conocer personas con mucha seguridad,sin tener que recibir correos fuera de lugar o malintencionados, en fin, la super recomiendo!!"
                  </p>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-3 text-center p-3">
                <img class="rounded-circle mt-2" src="images/mirtha.jpg" width="180">
                <h4 class="mt-4">Mirtha Legrand</h4>

                <p class= "text-dark p-2 m-3">
                   “Cuando dije que me retiraba pensé... tengo cuerda para rato. Así que me registré en Touch 2.0 y me reencontré con gente de mi target: Tutankamon, Pedro Picapiedra, entre otros”
                </p>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-3 text-center p-3">
                <img class="rounded-circle mt-2" src="images/guillermo.png" width="180">
                <h4 class="mt-4">Guillermo Andino</h4>

                <p class= "text-dark p-2 m-3">
                   “Encontré amistades, algo que hacia mucho tiempo no encontraba, debido a mi  exigente trabajo, tambien me permitio lograr una compañía virtual a cada lado que voy, y también algo de romance, jaja.”
                </p>
              </div>
            </div>
        </section>

        {{-- seccion de preguntasFrecuentes --}}
        <section class="" style="background-color:LightSteelBlue">

            <div id="preguntasFrecuentes" class="container-fluid row pb-5">
              <div class="col-sm-12 col-md-6 col-lg-3 text-center p-3">
                  <h4 class="mt-4">¿Qué es Touch2.0.com?</h4>
                  <p class= "text-dark p-2 m-3">
                     Touch2.0.com es un sitio especializado en citas en línea, que ayuda a personas de Latinoamérica y a gente de orígenes occidentales a encontrar su pareja ideal. Ofrecemos un servicio acogedor que combinado a una búsqueda sofisticada y a las opciones de mensajería, harán de la búsqueda de su verdadero amor una experiencia divertida y agradable.
                  </p>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-3 text-center p-3">
                  <h4 class="mt-4">¿Por qué utilizar Touch2.0.com?</h4>
                  <p class= "text-dark p-2 m-3">
                     A diferencia de otros sitios, Touch2.0.com ofrece un servicio amigable y personalizado que se combina con la más reciente tecnología. También somos conscientes de las motivaciones y aspiraciones de aquellas personas de diferentes orígenes que buscan encontrar su pareja ideal y sentimos que nuestras experiencias pueden ser de gran ayuda. Entendemos que algunas veces... ¡la persona perfecta para usted se encuentra al otro lado del mundo! Pero no importa dónde esté esa persona especial, o por qué usted desea conocerla, nosotros podemos ayudarle a encontrar a su pareja ideal."
                  </p>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-3 text-center p-3">
                <h4 class="mt-4">Beneficios para los miembros de Touch2.0:</h4>
               <p class= "text-dark p-2 m-3">
                   Busque entre miles de perfiles de atractivos hombres y mujeres de todos los orígenes que desean encontrar a alguien como usted. Su bandeja de entrada personal le permite encontrar fácilmente y de forma anónima a la pareja perfecta. Registre un perfil al instante y agregue una foto.
                </p>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-3 text-center p-3">
                <h4 class="mt-4">¿Cuánto cuesta convertirse en suscriptor?</h4>
                <p class= "text-dark p-2 m-3">
                   Absolutamente nada, es totalmente gratuito.
                </p>
              </div>
            </div>
        </section>


        {{-- nosotros --}}
        <section id="nosotros" class="pb-5 pt-5" style="background-color:DarkSlateGray">
            <div class="row container-fluid">

              <div class="col-lg-4 text-light text-justify">
                <h1 class="marca p-2">Touch 2.0</h1>
                    <p class="p-2">Probá conocer hombre y mujeres solos y solas en Touch 3.0, el mayor sitio de citas para buscar pareja y encuentros online de Argentina. En Touch 3.0 estás a un clic de encontrar solos y solas en tu ciudad para iniciar una relación seria o para vivir una aventura romántica. Touch 3.0 cuenta con un servicio de chat y buscador que te permitirán encontrar pareja y concretar citas online de acuerdo a tus intereses y gustos. Miles de mujeres y hombres de Latinoamérica han buscado pareja e iniciaron una relación a partir de nuestro sitio de citas online. Empezá ahora a conocer gente y descubrí la diversión del online dating!.</p>
              </div>
              <div class="col-lg-4 text-light text-justify">
                <h2 class="seguinos p-2 mt-5 text-center">Seguinos</h2>
                  <p class="p-2">No pierdas la oportunidad de estar conectado a Touch 3.0 desde cualquier red social. Segui a todos tus contactos desde cualquier plataforma,para que ellos tambien puedan estar comunicados con vos!!
                  Podes armar grupos en Facebook, Twitter, Linkedin y Pinterest!! Tambien es una manera de dar seguridad en ambas partes en el momento de una "cita a ciegas".</p>

                  <div class="redes text-center">
                    <a href="https://es-la.facebook.com"><i class="fab fa-facebook-square h1 p-2"></i></a>
                    <a href="https://twitter.com/login?lang=es"><i class="fab fa-twitter h1 p-2"></i></a>
                    <a href="https://www.linkedin.com"><i class="fab fa-linkedin h1 p-2"></i></a>
                    <a href="https://ar.pinterest.com"><i class="fab fa-pinterest h1 p-2"></i></a>
                  </div>

              </div>
              <div class="col-lg-4 text-light text-justify">
                <h2 class=" p-2 mt-5 text-center">Actualización permanente</h2>
                  <p class="p-2">Touch 2.0 es un equipo de profesionales que actualiza su informacion constantemente y notifica a todos sus usuarios para que puedan estar al tanto de ellas y poder disfrutar de todo lo que brinda la app. Siempre a la vanguardia en lo que respecta a las citas on line, para que puedas navegar, chatear, compartir y conocer con la maxima seguridad posible a esa persona que te espera del otro lado.</p>
                  <div class="text-center">
                    <form class="" action="#" method="post">
                      <input type="text" name="letter" value="" size="20"><br>
                      <button class="btn btn-danger mt-2" type="submit" name="button">Suscribete</button>
                    </form>
                  </div>
              </div>
            </div>
          </section>
          <footer class="container-fluid text-center pb-1 pt-3" style="background-color:black">
              <a class="text-white pt-3 m-3" href="">Nosotros</a>
              <a class="text-white pt-3 m-3" href="">Testimonios</a>
              <a class="text-white pt-3 m-3" href="">Seguridad</a>
              <a class="text-white pt-3 m-3" href="">Sugerencias</a>
              <a class="text-white pt-3 m-3" href="">Datos</a>
              <p class="footer-bottom-text mt-2">Todos los derechos reservados por ©Touch2.0</p>
          </footer>
    </body>
</html>
