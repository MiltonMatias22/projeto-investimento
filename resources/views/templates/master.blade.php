<!doctype html>
<html lang="pt-br">
    <head>
        <title>Investimento</title>
        <meta charset="UTF-8">
        @yield('css-content')
        <link rel="stylesheet" href="{{asset('css/stylesheet.css')}}"/>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">    

    </head>
    <body>

        @include('templates.menu-lateral')
        
        <section id="content-view">
            @yield('content-view')
        </section>
        
        @yield('script-content')

    </body>
</html>