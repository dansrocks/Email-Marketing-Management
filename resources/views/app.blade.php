<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    {!! Html::style('assets/bootstrap/3.3.6/css/bootstrap.css') !!}
    {!! Html::style('assets/css/emm.css') !!}

    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">EMM</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="{{ route('campaigns.list') }}" class="dropdown-toggle" data-toggle="dropdown">Campaigns<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('campaigns.list') }}">List campaigns</a></li>
                            <li><a href="{{ route('campaign.create') }}">Add new...</a></li>
                        </ul>
                    </li>
      
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container">
        
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">Home</a></li>
            @yield('breadcrumb')
        </ol>
        
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>@foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif        

        @yield('content')
    </div>

    <!-- Scripts -->
    {!! Html::script('assets/jquery/1.12.0/jquery.min.js') !!}
    {!! Html::script('assets/bootstrap/3.3.6/js/bootstrap.min.js') !!}
</body>
</html>