<html>
    @include('components.head', [
        'css' => 'rima',
        'title' => 'Pencarian Rima dari kata '. $kata,
        'description' => 'Rima dari kata '.$kata.'paling lengkap beserta macam-macamnya'
    ])

    <body>
        <main>

            @include('components.search', ['query' => $kata])

            <div class="row">
                @foreach ($rimas as $rima)
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{$rima['type']}}</h5>
                            <div class="pop-button-container">
                                @for ($i = 0, $colorsSize = count($colors) ; $i < count($rima['data']); $i++)
                                    <a target="_blank" href="{{ url('rima/' . $rima['data'][$i]['kata']) }}" class="btn pop {{$colors[$i%$colorsSize]}}">
                                        {{$rima['data'][$i]['kata']}}
                                    </a>
                                @endfor
                                @if (count($rima['data'])==0)
                                <div class="not-found">
                                    <i class="far fa-frown fa-7x"></i>
                                    <h5>Rima tidak ditemukan</h5>
                                </div>
                                @endif
                            </div>
                            @if (count($rima['data'])==21)
                            <div>
                                <a href="{{ url('rima/' . $kata. '/'. $rima['slug']) }}" class="card-link">Lebih Banyak Lagi</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            @include('components.arti', ['kamus' => $kamus])

        </main>

        @include('components/footer')

    </body>
</html>