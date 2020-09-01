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


            @if ($kamus)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $kamus['kata']}}</h5>
                    <div class="card-text">{!! $kamus['arti']!!}</div>
                    <div>
                        <a href="https://kbbi.kemdikbud.go.id/entri/{{$kamus['kata']}}" class="card-link">KBBI</a>
                    </div>
                </div>
            </div>
            @endif

        </main>
    </body>
</html>