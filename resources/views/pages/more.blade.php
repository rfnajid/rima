<html>
    @include('components.head', [
        'css' => 'rima',
        'title' => ucfirst($rima['type'].' dari kata '. $kata),
        'description' => ucfirst($rima['type'].' dari kata '. $kata). ' beserta pengertiannya dari kamus KBBI'
    ])

    <body>
        <main>

            @include('components.search', ['query' => $kata])


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
                    <div>
                        <a href="{{ url('rima/' . $kata) }}" class="card-link">Lihat Rima Lainnya</a>
                    </div>
                </div>
            </div>

            @include('components.arti', ['kamus' => $kamus])

        </main>
    </body>
</html>