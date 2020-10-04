@if ($kamus)
<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{ $kamus['kata']}}</h5>
        <div class="card-text">{!! $kamus['arti']!!}</div>
        @if ($kamus['sumber']=='kbbi')
        <div>
            <a href="https://kbbi.kemdikbud.go.id/entri/{{$kamus['kata']}}" class="card-link">KBBI</a>
        </div>
        @else
        <div>
            <a class="card-link">Kategori : {{ ucwords($kamus['sumber']) }}</a>
        </div>
        @endif
    </div>
</div>
@endif