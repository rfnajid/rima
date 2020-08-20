<html>
    @include('components.head', ['css' => "home"])
    <body>
        <main>

            @include('components.search', ['query' => ''])

            <h5 class="header">Rekomendasi Kata</h5>
            <div class="pop-button-container">
                @for ($i = 0, $colorsSize= count($colors); $i < count($recommendations); $i++)
                    <a href="{{ url('rima/' . $recommendations[$i]['kata']) }}" class="btn pop {{$colors[$i%$colorsSize]}}">
                        {{$recommendations[$i]['kata']}}
                    </a>
                @endfor
            </div>
        </main>
    </body>
</html>