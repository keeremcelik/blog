<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{URL::asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/login.css')}}" rel="stylesheet">

    <title>@yield('baslik')</title>

</head>
<body>
    @isset($message)
    {{$message}}
    @endisset
    <div class="wrapper" id="wrapper">      
        <div class="container">
            <div class="row">
                <div class="container">
                    <div class="loginBox col-lg-4 col-sm-6 col-xs-12">
                        <div class="login-header">
                            <div class="logo">
                                <h1 class="title">KRMCLK <span>v1.2</span></h1>
                                
                            </div>
                        </div>
                        <div class="login-body">  


                            <div class="form">
                                @if(isset(Auth::user()->email))
                                    <script type="text/javascript"> window.location="panel/index";</script>
                                @endif

                                @if($message = Session::get('error'))
                                      <div class="alert alert-danger alert-block">
                                        <button type="button" class="close" data-dismiss="alert">x</button>
                                        <strong>{{$message}}</strong>
                                    </div>
                                @endif

                                @if(count($errors) >0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>   {{$error}} </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                 <form class="form-signin" action="{{URL::to('/panel/checklogin')}}" method="POST">
                               {{ csrf_field() }}
                                <div class="form-label-group">
                                    <label for="inputName">Eposta Adresi</label>
                                    <input type="text" name="email" id="email" class="form-control" placeholder="Kullanıcı adı" required autofocus>
                                </div>

                                <div class="form-label-group">
                                    <label for="inputPassword">Şifre</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Şifre" required>
                                </div>
                                <button class="btn btn-login btn-block"  name="login" type="submit">Giriş</button>
                            </form>
                            </div>
                        </div>
                        <div class="login-footer">
                                              
                        </div>
                    </div>
                </div>
            </div>
        </div>      
    </div>

</body>
</html>