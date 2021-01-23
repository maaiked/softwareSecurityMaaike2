<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


        <title>Software Security</title>

    </head>
    <body class="container" style="background-color: #31c48d">
        <div class="min-h-screen" style="margin: 2em">
            <div>
                <h1 style="font-family: 'SimSun'">
                    Welkom op mijn Software Security project!
                </h1>
                <p>
                    Deze webpagina werd ontwikkeld voor het vak 'Software Security' van Erasmus Hogeschool Brussel.
                    <br>Gemaakt door Maaike Dupont.
                </p>

                @auth
                    <a href="{{ url('/dashboard') }}" class="btn btn-dark" role="button">Home</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-dark" role="button">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-secondary" role="button">Register</a>
                @endauth
            </div>
        </div>
    </body>
</html>
