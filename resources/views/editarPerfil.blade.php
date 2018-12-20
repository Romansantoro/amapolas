@extends('default')

@section('section')
  <body>
    <h2 id="tituloRegistro">Editá tu perfil</h2>

    <form class="editarPerfil" action="" method="post" enctype="multipart/form-data">
        @csrf
            <div class="formulario">
                <div class="errorJS error" id="corregirEdit"></div>
                <div class="userName2">                    <!-- INPUT DEL NOMBRE  -->
                    <div class="inputUserData">
                        <input id="name" type="text" name="name" value="{{ old('name', Auth::user()->name ) }}"  placeholder="Nombre"><span style="color:red;">*</span>
                      </div>
                </div>
                <div class="errorJS fontsize" id="erroresEdit"></div>
                <div class="error">
                    @if ($errors->has('name'))
                        <span>
                          <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="userLastName">                    <!-- INPUT DEL APELLIDO  -->
                    <div class="inputUserData">
                        <input id="last_name" type="text" name="last_name" value="{{ old('last_name', Auth::user()->last_name) }}"  placeholder="Apellido"><span style="color:red;">*</span>
                    </div>
                </div>
                <div class="errorJS fontsize" id="errorEditLN"></div>
                <div class="error">
                  @if ($errors->has('last_name'))
                      <span>
                          <strong>{{ $errors->first('last_name') }}</strong>
                      </span>
                  @endif
                </div>

                <div class="userAge">                    <!-- INPUT DEL USER AGE  -->
                    <div class="userData">
                        <div class="labelUserData">
                            <label for="age">Fecha de nacimiento:</label> <br>
                        </div>
                        <div class="inputUserData">
                            <input id="userAge" type="date" name="age" value="{{ old('age', Auth::user()->age) }}"><span style="color:red;">*</span>
                        </div>
                    </div>
                    <div class="errorJS fontsize" id="errorEditAge"></div>
                    <div class="error">
                        @if ($errors->has('age'))
                            <span>
                                <strong>{{ $errors->first('age') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="userAvatar">                    <!-- INPUT DEL AVATAR  -->
                    <div class="userData">
                        <div class="labelUserData">
                            <label for="avatar">Imagen de perfil:</label> <br>
                        </div>
                        <div class="inputUserData">
                            <input class="archivoSubir" id="userAvatar" type="file" name="avatar" value="">
                        </div>
                    </div>
                    <div class="errorJS fontsize" id="errorEditAvatar" style="display: flex; flex-direction: row;justify-content: center;"></div>
                    <div class="error">
                        @if ($errors->has('avatar'))
                            <span>
                                <strong>{{ $errors->first('avatar') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="userLastName">                    <!-- INPUT DEL ADDRESS  -->
                    <div class="inputUserData">
                        <input id="address" type="text" name="address" value="{{ old('address') }}"  placeholder="Direccion"><span style="color:red;">*</span>
                    </div>
                </div>
                <div class="errorJS fontsize" id="errorEditAdress"></div>
                <div class="error">
                  @if ($errors->has('address'))
                      <span>
                          <strong>{{ $errors->first('address') }}</strong>
                      </span>
                  @endif
                </div>


              <label for="userCountry">País de nacimiento</label>
                <div class="userCountry">                    <!-- INPUT DEL PAIS  -->
                    <div class="inputUserData">
                        <select id="userCountry" name="country">
                        </select><span style="color:red;">*</span>
                        <div id="provincia">
                        </div>

                    </div>
                </div>
                <div class="error">
                    @if ($errors->has('country'))
                        <span>
                            <strong>{{ $errors->first('country') }}</strong>
                        </span>
                    @endif
                </div>

            </div>  <!-- CIERRE DE LA CLASE FORMULARIO  -->

            <div class="">
                <button style="display:none;" id="submit" type="submit" name="send">Crear cuenta</button>
            </div>
            <div class="submit">
                <a href="index.php">Volver</a>
                <label for="submit" type="submit" name="send">Editar</label>
            </div>
    </form>

        <script src="js/javascript.js"></script>
        <script src="select.js"></script>
@endsection
