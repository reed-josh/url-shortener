<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>URL Shortener</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: black;
                height: 100vh;
            }
            .content {
                max-width: 500px;
                margin: 0 auto;
            }
            .errors {
                color: tomato;
                font-weight: bold;
                text-decoration: none;
            }
            .results {
                font-weight: bold;
                margin: 10px 0px;
                padding: 5px;
                border-radius: 5px;
                color: darkseagreen;
                background: #eee;
            }
        </style>
    </head>
    <body>
        <div class="content">
            <h1>URL Shortener</h1>
            <form action="/short-url" method="post" class="pure-form pure-form-aligned">
            @csrf
            <label for="long_url">URL: </label>
            <input class="pure pure-input" type="text" name="long_url" />
            <button class="pure-button pure-button-primary" type="submit">Generate Short URL</button>
            </form>
            <div class="results">@yield('sub-page')</div>
            <ul class="errors">
                @if ($errors->all())
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                @endif
            </ul>
        </div>
    </body>
</html>
