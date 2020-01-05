<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Touch 2.0</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/all.css">
    <link rel="stylesheet" href="/css/master.css">
    <link rel="stylesheet" href="/css/register.css">
</head>
<body>
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

            <ul class="navbar-nav mr-auto">
              <li class="nav-item h5">
                <a class="nav-link active" href="#">Nosotros</a>
              </li>
              <li class="nav-item h5">
                <a class="nav-link active" href="#">Preguntas frecuentes</a>
              </li>
              <li class="nav-item h5">
                <a class="nav-link active" href="#">Testimonios</a>
              </li>
            </ul>
            {{-- <div class="register p-2">
              <a href="register.php"><button class="btn btn-outline-light my-2 my-sm-0" type="button">Registrarse</button></a>
            </div> --}}

          </div>
        </nav>

      </header>


<section class="p-2" style="background-color:rgba(0,0,0,0.0);">
    <div class="container h-100 mt-3">
        <div class="d-flex justify-content-center h-100 ">
            <div class="user_card mt-5 mb-2">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src="images/logo.jpg" class="brand_logo" alt="Logo">
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-5">

                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mt-5">
                            <div class="input-group mb-2 col-lg-6">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="nombre">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="input-group mb-2 col-lg-6">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-group mb-2 col-lg-6">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="contraseña">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="input-group mb-2 col-lg-6">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="confirma contraseña">

                            </div>
                        </div>

                        <div class="row">
                            <div class="input-group mb-2 col-lg-6">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-image"></i></span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('foto') is-invalid @enderror" id="file-upload" name="foto" required accept="image/*">
                                    <label class="custom-file-label" for="customFile">Subí tu foto</label>
                                </div>
                            </div>

                            <div class="input-group mb-2 col-lg-6">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                </div>
                            <input type="text" name="nick" class="form-control @error('nick') is-invalid @enderror" placeholder="nick" required value="{{old('nick')}}">
                            @error('nick')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                                </div>



                        </div>
                        <div class="row">
                            <div class="col-6">
                                <script>
                                    window.onload = function(){
                                        var fileUpload = document.getElementById('file-upload');
                                        fileUpload.value = null;
                                    }
                                    </script>
                                    <div class="text-center">
                                        <img class="img-fluid" src="" alt="" id="file-preview" width="100px">
                                    </div>

                            </div>
                            <script lang="javascript">

                                function readFile(input) {
                                if (input.files && input.files[0]) {
                                    var reader = new FileReader();
                                    reader.onload = function (e) {
                                        var filePreview = document.getElementById('file-preview')
                                        filePreview.src = e.target.result;
                                        console.log(e.target.result);
                                        var previewZone = document.getElementById('file-preview-zone');
                                        previewZone.appendChild(filePreview);
                                    }
                                    reader.readAsDataURL(input.files[0]);
                                }
                            }
                            var fileUpload = document.getElementById('file-upload');
                            fileUpload.onchange = function (e) {
                                readFile(e.srcElement);
                            };
                        </script>
                            <div class="input-group mb-2 col-lg-6">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-edit"></i></span>
                                </div>
                                <textarea name="perfil" id="" cols="30" rows="3" class="form-control @error('perfil') is-invalid @enderror" placeholder="perfil de usuario" required value="{{old('perfil')}}"></textarea>
                            {{-- <input type="text" name="perfil" class="form-control @error('perfil') is-invalid @enderror" placeholder="perfil de usuario" required value="{{old('perfil')}}"> --}}
                            @error('perfil')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                                </div>
                        </div>

                        <div class="mt-1 ">
                        <button type="submit" name="button" class="btn login_btn">Registrarse</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
