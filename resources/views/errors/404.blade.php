<html>
    @include('components.head', ['css' => "404"])
    <body>
        <main>
            <i class="far fa-frown fa-7x"></i>
            <h1>404</h1>
            <h2>Halaman Tidak Ditemukan</h2>
            <a class="btn" href="{{url('')}}"><i class="fa fa-home fa-2x"></i></a>
        </main>
    </body>
</html>