<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>PokeKing</title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                height: 100vh;
                margin: 0;
            }

            td {
                vertical-align: middle!important;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .title {
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                font-size: 84px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref">
            <div class="content">
                <div class="title m-b-md">
                    PokeKing
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Base Experience</th>
                                <th>Height</th>
                                <th>Weight</th>
                            </tr>
                        </thead>
                        @foreach($pokemons as $pokemon)
                            <tr>
                                <td><img src="{{ $pokemon->informations['sprites']['front_default'] }}" alt="{{ $pokemon->informations['name'] }}"/></td>
                                <td>{{ $pokemon->informations['name'] }}</td>
                                <td>{{ $pokemon->informations['base_experience'] }}</td>
                                <td>{{ $pokemon->informations['height'] }}</td>
                                <td>{{ $pokemon->informations['weight'] }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                {{ $pokemons->links() }}
            </div>
        </div>
    </body>
</html>
