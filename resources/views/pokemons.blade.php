<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>PokeKing</title>

        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    </head>
    <body>
        <div id="app">
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
                    <pokeking></pokeking>
                </div>
            </div>
        </div>
        <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>
