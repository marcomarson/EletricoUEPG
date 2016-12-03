<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="http://portal.uepg.br/favicon.ico"/>
    <title>Controle de Lâmpadas - UEPG</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <link href="{{ URL::asset('css/sb-admin.css') }}" rel="stylesheet">
</head>
<body id="app-layout">

    <div id="wrapper">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header text-center">

                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Controle de Lâmpadas - UEPG
                    </a>
                      <a class="navbar-brand" href="{{ url('/') }}">
                          Rede Elétrica 01/02
                      </a>
                      <a class="navbar-brand" href="{{ url('/') }}">
                          Rede Elétrica 02/02
                      </a>
                      <a class="navbar-brand" href="{{ url('/') }}">
                          Pétalas 01/02
                      </a>
                      <a class="navbar-brand" href="{{ url('/') }}">
                          Pétalas 02/02
                      </a>
                </div>
                <ul class="nav navbar-right top-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-edit"></i> Menu <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ url('/petala') }}"><i class="fa fa-btn fa-edit"></i>Registrar pétala</a>
                            </li>
                            <li>
                                <a href="{{ url('/poste') }}"><i class="fa fa-btn fa-edit"></i>Registrar Poste</a>
                            </li>
                            <li>
                                <a href="{{ url('/lampada') }}"><i class="fa fa-btn fa-edit"></i>Registrar Lâmpada</a>
                            </li>
                            <li>
                                <a href="{{ url('/relatorios') }}"><i class="fa fa-fw fa-bar-chart-o"></i>Relatórios</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                @include("footer")
            </div>

        </nav>

        @yield('content')
    </div>


        <!-- JavaScripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

        <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
        </script>

</body>
</html>
