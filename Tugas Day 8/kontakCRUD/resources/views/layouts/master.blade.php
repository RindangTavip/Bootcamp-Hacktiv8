<html>
    <head>
        <title>CRUD Laravel</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <style>
        .inline-80 {
            display: inline-block; 
            width: 80px;
        }
        .center {
            text-align: center;
        }
        </style>
    </head>
    <body>
    <body style="background: rgb(243, 243, 243)">
        <div id="header">
            <nav class="navbar navbar-expand-sm navbar-light bg-light shadow p-3 mb-5 bg-white rounded">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav ms-auto">
                            <a class="nav-link" aria-current="page" href="/posts">HOME</a>
                            <a class="nav-link" href="/login">LOGIN</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div class="container">
            @yield('content')
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    </body>
</html>