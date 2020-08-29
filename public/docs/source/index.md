---
title: RIMA API

language_tabs:
- bash
- javascript
- php
- python

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Selamat datang di dokumentasi RIMA API.
[Get Postman Collection](http://rima.rfnaj.id/docs/collection.json)

<!-- END_INFO -->

#API Kamus


API untuk mendapatkan arti kata
<!-- START_ff8848aff17618fd83d37ab2111ad117 -->
## Get List Kata

Get list kata sesuai kamus

> Example request:

```bash
curl -X GET -G "https://rima.rfnaj.id/api/v1/kamus?size=3&page=1"
```

```javascript
const url = new URL("https://rima.rfnaj.id/api/v1/kamus");

    let params = {
            "size": "3",
            "page": "1",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("https://rima.rfnaj.id/api/v1/kamus", [
    'query' => [
            "size" => "3",
            "page" => "1",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'https://rima.rfnaj.id/api/v1/kamus'
params = {
	'size': '3',
	'page': '1'
}
headers = {

}
response = requests.request('GET', url, headers=headers, params=params)
response.json()
```


> Example response (200):

```json
[
    {
        "id": 1,
        "kata": "a",
        "arti": "&lt;b&gt;&lt;sup&gt;1&lt;\/sup&gt;A, a&lt;\/b&gt; &lt;i&gt;n&lt;\/i&gt; &lt;b&gt;1&lt;\/b&gt; huruf pertama abjad Indonesia; &lt;b&gt;2&lt;\/b&gt; nama huruf &lt;i&gt;a&lt;\/i&gt;; &lt;b&gt;3&lt;\/b&gt; penanda pertama dl urutan (mutu, nilai, dsb)"
    },
    {
        "id": 2,
        "kata": "a",
        "arti": "&lt;b&gt;&lt;sup&gt;3&lt;\/sup&gt;a-&lt;\/b&gt; &lt;i&gt;bentuk terikat&lt;\/i&gt; &lt;b&gt;1&lt;\/b&gt; kekurangan : &lt;i&gt;anemia;&lt;\/i&gt; &lt;b&gt;2&lt;\/b&gt; tidak atau bukan: &lt;i&gt;aseksual;&lt;\/i&gt; &lt;b&gt;3&lt;\/b&gt; tanpa: &lt;i&gt;anonim;&lt;\/i&gt;"
    },
    {
        "id": 3,
        "kata": "ab",
        "arti": "&lt;b&gt;&lt;sup&gt;1&lt;\/sup&gt;ab&lt;\/b&gt; &lt;i&gt;n&lt;\/i&gt; wadah kecil dr timah untuk candu; hap"
    }
]
```
> Example response (500):

```json
null
```

### HTTP Request
`GET /api/v1/kamus`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    size |  optional  | jumlah kata yang mau ditampilkan. Gunakan 'all' untuk menampilkan semua data.
    page |  optional  | pagination.

### Pagination
Pagination menggunakan Web Linking (RFC 8288), data pagination disimpan di Header Link, yang berisi : first, prev, next, & last.
Total item dapat dilihat di Header X-Total-Count

<!-- END_ff8848aff17618fd83d37ab2111ad117 -->

<!-- START_aad272394f61c5b10e02794161a1e185 -->
## Get Kata

Get detail kata

> Example request:

```bash
curl -X GET -G "https://rima.rfnaj.id/api/v1/kamus/kata"
```

```javascript
const url = new URL("https://rima.rfnaj.id/api/v1/kamus/kata");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("https://rima.rfnaj.id/api/v1/kamus/kata", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'https://rima.rfnaj.id/api/v1/kamus/kata'
headers = {

}
response = requests.request('GET', url, headers=headers)
response.json()
```


> Example response (200):

```json
{
    "id": 14360,
    "kata": "kata",
    "arti": "&lt;b&gt;&lt;sup&gt;1&lt;\/sup&gt;ka·ta&lt;\/b&gt; &lt;i&gt;n&lt;\/i&gt; &lt;b&gt;1&lt;\/b&gt; unsur bahasa yg diucapkan atau dituliskan yg merupakan perwujudan kesatuan perasaan dan pikiran yg dapat digunakan dl berbahasa; &lt;b&gt;2&lt;\/b&gt; ujar; bicara; &lt;b&gt;3&lt;\/b&gt; &lt;i&gt;Ling&lt;\/i&gt; &lt;b&gt;a&lt;\/b&gt; morfem atau kombinasi morfem yg oleh bahasawan dianggap sbg satuan terkecil yg dapat diujarkan sbg bentuk yg bebas; &lt;b&gt;b&lt;\/b&gt; satuan bahasa yg dapat berdiri sendiri, terjadi dr morfem tunggal (msl &lt;i&gt;batu, rumah, datang&lt;\/i&gt;) atau gabungan morfem (msl &lt;i&gt;pejuang, pancasila, mahakuasa&lt;\/i&gt;);&lt;br&gt;--&lt;i&gt; berjawab, gayung bersambut, pb&lt;\/i&gt; balas kecaman dng cepat dan tepat; --&lt;i&gt; dahulu bertepati, -- kemudian kata bercari, pb&lt;\/i&gt; janji harus ditepati dan hanya boleh diubah setelah diperoleh kebulatan kata pula;&lt;i&gt; elok -- dl mufakat, buruk -- di luar mufakat, pb&lt;\/i&gt; apa yg hendak dikerjakan sebaiknya dibicarakan dulu dng teman sejawat atau kaum keluarga, dsb;&lt;br&gt;--&lt;b&gt; adat&lt;\/b&gt; ujar-ujar (kata-kata kias, peribahasa, dsb); yg bertalian dng adat; --&lt;b&gt; asli&lt;\/b&gt; &lt;i&gt;Ling&lt;\/i&gt; kata yg berkembang dr perbendaharaan asli suatu bahasa dan bukan kata pinjaman; --&lt;b&gt; bantu bilangan&lt;\/b&gt; &lt;i&gt;Ling&lt;\/i&gt; kata penggolong; --&lt;b&gt; benda&lt;\/b&gt; nomina; --&lt;b&gt; bentukan&lt;\/b&gt; kata turunan; --&lt;b&gt; berimbuhan&lt;\/b&gt; kata yg sudah mendapat imbuhan atau afiks (prefiks, infiks, sufiks, atau konfiks); --&lt;b&gt; bilangan&lt;\/b&gt; numeralia;&lt;b&gt; -- bersusun&lt;\/b&gt; &lt;i&gt;Ling&lt;\/i&gt; kata yg terdiri atas satu morfem bebas dan satu morfem terikat atau lebih; --&lt;b&gt; bertimbal&lt;\/b&gt; &lt;i&gt;Ling&lt;\/i&gt; kata dng dua makna yg berlawanan; --&lt;b&gt; dasar&lt;\/b&gt; &lt;i&gt;Ling&lt;\/i&gt; kata-kata yg menjadi dasar bentukan kata yg lebih besar, msl &lt;i&gt;jual&lt;\/i&gt; menjadi dasar bentuk &lt;i&gt;jualan&lt;\/i&gt; kata &lt;i&gt;jualan&lt;\/i&gt; menjadi dasar bentukan kata &lt;i&gt;berjualan&lt;\/i&gt;; --&lt;b&gt; deiktis&lt;\/b&gt; &lt;i&gt;Ling&lt;\/i&gt; kata yg menunjukkan tempat, waktu atau partisipan dl ujaran dr sudut pandangan pembicara; --&lt;b&gt; depan&lt;\/b&gt; preposisi; --&lt;b&gt; fonologis&lt;\/b&gt; &lt;i&gt;Ling&lt;\/i&gt; satuan bahasa yg bebas yg mempunyai ciri-ciri fonologis tetap, msl dl bahasa Latin bercirikan tekanan yg tetap, yg secara umum dibatasi oleh kesenyapan potensial; --&lt;b&gt; ganti&lt;\/b&gt; pronomina; --&lt;b&gt; ganti milik&lt;\/b&gt; pronomina posesif; --&lt;b&gt; ganti orang&lt;\/b&gt; pronomina persona; --&lt;b&gt; ganti taktentu&lt;\/b&gt; pronomina tidak tentu; --&lt;b&gt; generik&lt;\/b&gt; &lt;i&gt;Ling&lt;\/i&gt; kata yg maknanya mencakup semua anggota dr suatu kelas tertentu; --&lt;b&gt; gramatikal&lt;\/b&gt; &lt;i&gt;Ling&lt;\/i&gt; satuan gramatikal yg ada di antara morfem dan frasa yg mempunyai ciri keutuhan intern dan diapit oleh jeda potensial dan yg terjadi dr morfem atau gabungan morfem; --&lt;b&gt; hati&lt;\/b&gt; perasaan yg timbul di dl hati; gerak hati; --&lt;b&gt; hubung&lt;\/b&gt; konjungsi; --&lt;b&gt; jadian&lt;\/b&gt; kata turunan; kata berimbuhan; --&lt;b&gt; keadaan&lt;\/b&gt; adjektiva; --&lt;b&gt; kepala&lt;\/b&gt; kata yg diterangkan dl kamus atau ensiklopedia (biasanya dicetak dng huruf tebal); bentuk dasar dr subentri; entri pokok; lema; --&lt;b&gt; kerja&lt;\/b&gt; verba; --&lt;b&gt; kerja bantu&lt;\/b&gt; verba bantu; --&lt;b&gt; keterangan&lt;\/b&gt; adverbia;&lt;b&gt; -- klise&lt;\/b&gt; kata yg sering digunakan sehingga kehilangan keaslian maknanya; --&lt;b&gt; kunci&lt;\/b&gt; &lt;b&gt;1&lt;\/b&gt; kata atau ungkapan yg mewakili konsep atau gagasan yg menandai suatu zaman atau suatu kelompok; &lt;b&gt;2&lt;\/b&gt; kata atau ungkapan yg mewakili konsep yg telah disebutkan: --&lt;i&gt; kunci kalimat itu adalah “pembangunan”&lt;\/i&gt;; --&lt;b&gt; leksikal&lt;\/b&gt; &lt;i&gt;Ling&lt;\/i&gt; satuan bahasa yg dianggap satuan terkecil dan menjadi unsur dr leksikon suatu bahasa, dan umumnya diterangkan dl kamus sbg entri; --&lt;b&gt; majemuk&lt;\/b&gt; &lt;i&gt;Ling&lt;\/i&gt; gabungan morfem dasar yg seluruhnya berstatus sbg kata yg mempunyai pola fonologis, gramatikal, dan semantis yg khusus menurut kaidah bahasa yg bersangkutan; --&lt;b&gt; morfemis&lt;\/b&gt; &lt;i&gt;Ling&lt;\/i&gt; satuan terkecil yg mempunyai posisi tertentu dl kalimat; --&lt;b&gt; mubazir&lt;\/b&gt; kata yg berlebihan dl kalimat, jika dihilangkan tidak akan mengubah makna kalimat; --&lt;b&gt; nama&lt;\/b&gt; nomina; --&lt;b&gt; nama abstrak&lt;\/b&gt; nomina abstrak; --&lt;b&gt; nonreferensial&lt;\/b&gt; kata yg tidak mempunyai acuan di luar bahasa: &lt;i&gt;konjungsi termasuk golongan -- nonreferensial&lt;\/i&gt;; --&lt;b&gt; ortografis&lt;\/b&gt; &lt;i&gt;Ling&lt;\/i&gt; satuan terkecil yg oleh bahasawan dianggap sbg bentuk bebas dan dituliskan dng diapit oleh spasi (mungkin bentuk ini bukan kata dipandang dr sudut lain); --&lt;b&gt; pembimbing&lt;\/b&gt; kata yg dicantumkan pd sudut atas (kanan dan kiri) yg menyatakan lema pertama dan lema terakhir pd satu halaman kamus; --&lt;b&gt; pendahuluan&lt;\/b&gt; keterangan (uraian dsb) sbg pengantar suatu karya tulis yg tertera di bagian depan suatu karangan (buku dsb, umumnya ditulis oleh pengarang); prakata; --&lt;b&gt; pengantar&lt;\/b&gt; kata pendahuluan; --&lt;b&gt; penggolong&lt;\/b&gt; kata untuk menggolongkan nomina, biasanya mengikuti bilangan; --&lt;b&gt; penghubung&lt;\/b&gt; konjungsi; --&lt;b&gt; pinjaman&lt;\/b&gt; &lt;i&gt;Ling&lt;\/i&gt; kata yg dipinjam dari bahasa lain dan kemudian disesuaikan dng kaidah bahasa sendiri; --&lt;b&gt; pungutan&lt;\/b&gt; kata serapan; --&lt;b&gt; pustaka&lt;\/b&gt; kata yg hanya dipakai dl gaya kesusastraan, msl kata &lt;i&gt;gerangan, sudilah kiranya, seraya&lt;\/i&gt;; --&lt;b&gt; putus&lt;\/b&gt; pernyataan yg berisi kepastian; keputusan; --&lt;b&gt; sambung&lt;\/b&gt; konjungsi; --&lt;b&gt; sambutan&lt;\/b&gt; pidato dsb yg diucapkan dl suatu acara perayaan, pesta, dsb; --&lt;b&gt; sandang&lt;\/b&gt; artikel; --&lt;b&gt; sapaan&lt;\/b&gt; kata yg digunakan untuk menyapa seseorang (msl kata Anda, Saudara, Tuan, Nyonya, Ibu, Bapak, Kakak, dan Adik); --&lt;b&gt; sepakat&lt;\/b&gt; kata mufakat; persetujuan; --&lt;b&gt; serapan&lt;\/b&gt; kata yg diserap dr bahasa lain; --&lt;b&gt; seru&lt;\/b&gt; &lt;i&gt;Ling&lt;\/i&gt; kata atau frasa yg dipakai untuk mengawali seruan; --&lt;b&gt; sifat&lt;\/b&gt; adjektiva; --&lt;b&gt; tambahan&lt;\/b&gt; adverbia; --&lt;b&gt; tanya&lt;\/b&gt; &lt;i&gt;Ling&lt;\/i&gt; kata yg dipakai sbg penanda pertanyaan dl kalimat tanya; --&lt;b&gt; transisi&lt;\/b&gt; kata penghubung antaralinea; --&lt;b&gt; tugas&lt;\/b&gt; &lt;i&gt;Ling&lt;\/i&gt; kata yg terutama menyatakan hubungan gramatikal yg tidak dapat bergabung dng afiks, dan tidak mengandung makna leksikal; --&lt;b&gt; turunan&lt;\/b&gt; &lt;i&gt;Ling&lt;\/i&gt; kata yg terbentuk sbg hasil proses afiksasi, reduplikasi, atau penggabungan; --&lt;b&gt; ulang&lt;\/b&gt; &lt;i&gt;Ling&lt;\/i&gt; kata yg terjadi sbg hasil reduplikasi, spt &lt;i&gt;rumah-rumah, tetamu, dag-dig-dug;&lt;\/i&gt; --&lt;b&gt; wantahan&lt;\/b&gt; kata yg diserap dr bahasa asing dan digunakan dl bentuk aslinya, msl &lt;i&gt;de facto, de jure;&lt;br&gt;&lt;\/i&gt;&lt;b&gt;ber·ka·ta&lt;\/b&gt; &lt;i&gt;v&lt;\/i&gt; melahirkan isi hati dng kata-kata; berbicara: &lt;i&gt;siapa yg ~ demikian?;&lt;br&gt;&lt;\/i&gt;~&lt;i&gt; siang melihat-lihat, ~ malam mendengar-dengar, pb&lt;\/i&gt; jika hendak membicarakan sesuatu, harus selalu berhati-hati;&lt;br&gt;~&lt;b&gt; dua&lt;\/b&gt; mengeluarkan perkataan yg berlainan sama sekali dng maksud yg sebenarnya: &lt;i&gt;sukar benar menangkap maksud dan kemauan orang yg ~ dua itu krn antara yg dikatakan dan yg dimaksudkan sebenarnya berbeda;&lt;br&gt;&lt;\/i&gt;&lt;b&gt;ber·ka·ta-ka·ta&lt;\/b&gt; &lt;i&gt;v&lt;\/i&gt; bercakap-cakap (berbicara dsb): &lt;i&gt;harapanku janganlah Saudara ~ tt hal itu lagi;&lt;br&gt;&lt;\/i&gt;&lt;b&gt;me·nga·ta&lt;\/b&gt; &lt;i&gt;v&lt;\/i&gt; mengatakan; menyebut;&lt;br&gt;&lt;b&gt;me·nga·tai&lt;\/b&gt; &lt;i&gt;v&lt;\/i&gt; &lt;b&gt;1&lt;\/b&gt; menegur dan memarahi dsb; &lt;b&gt;2&lt;\/b&gt; mempercakapkan (membicarakan) kejelekan seseorang; menjelek-jelekkan; &lt;b&gt;3&lt;\/b&gt; mengumpat; mengumpat-umpat;&lt;br&gt;&lt;b&gt;me·nga·ta-nga·tai&lt;\/b&gt; &lt;i&gt;v&lt;\/i&gt; mengatai;&lt;br&gt;&lt;b&gt;me·nga·ta·kan&lt;\/b&gt; &lt;i&gt;v&lt;\/i&gt; &lt;b&gt;1&lt;\/b&gt; menyebutkan; menuturkan: &lt;i&gt;dia tidak ~ begitu;&lt;\/i&gt; &lt;b&gt;2&lt;\/b&gt; menceritakan; memberitahukan: &lt;i&gt;jangan ~ kpd Ibu bahwa saya tidak pergi ke sekolah;&lt;br&gt;&lt;\/i&gt;&lt;b&gt;ter·ka·ta·kan&lt;\/b&gt; &lt;i&gt;v&lt;\/i&gt; dapat dikatakan; terceritakan; terlukiskan: &lt;i&gt;tidak ~ duka hatinya setelah menerima berita duka itu;&lt;br&gt;&lt;\/i&gt;&lt;b&gt;per·ka·ta·an&lt;\/b&gt; &lt;i&gt;n&lt;\/i&gt; &lt;b&gt;1&lt;\/b&gt; sesuatu yg dikatakan: ~&lt;i&gt; orang itu sangat menyinggung perasaanku;&lt;\/i&gt; &lt;b&gt;2&lt;\/b&gt; kata; kumpulan kata: &lt;i&gt;ia senang sekali memakai ~ asing dl berbicara;&lt;\/i&gt; &lt;b&gt;3&lt;\/b&gt; &lt;i&gt;ark Sas&lt;\/i&gt; cerita; kisah: &lt;i&gt;adapun ~ mengenai hal itu terlalu lanjut ceritanya&lt;\/i&gt;;&lt;br&gt;&lt;b&gt;mem·per·ka·ta·kan&lt;\/b&gt; &lt;i&gt;v&lt;\/i&gt; menguraikan sesuatu dng perkataan; membicarakan; merundingkan: &lt;i&gt;semua orang akan ~ cela orang itu yg tidak terhapuskan&lt;br&gt;&lt;b&gt;&lt;sup&gt;2&lt;\/sup&gt;ka·ta-&lt;\/b&gt; &lt;i&gt;bentuk terikat&lt;\/i&gt; &lt;b&gt;1&lt;\/b&gt; turun; menurun: &lt;i&gt;katabolisme&lt;\/i&gt;; &lt;b&gt;2&lt;\/b&gt; bawah: &lt;i&gt;katakomba"
}
```

### HTTP Request
`GET /api/v1/kamus/{word}`

<!-- END_aad272394f61c5b10e02794161a1e185 -->

<!-- START_0d7aadd72603227ec6d9f04f4100ee09 -->
## Search Kata

API untuk mencari kata

> Example request:

```bash
curl -X GET -G "https://rima.rfnaj.id/api/v1/kamus/search/dia?size=3&page=1"
```

```javascript
const url = new URL("https://rima.rfnaj.id/api/v1/kamus/search/dia");

    let params = {
            "size": "3",
            "page": "1",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("https://rima.rfnaj.id/api/v1/kamus/search/dia", [
    'query' => [
            "size" => "3",
            "page" => "1",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'https://rima.rfnaj.id/api/v1/kamus/search/dia'
params = {
	'size': '3',
	'page': '1'
}
headers = {

}
response = requests.request('GET', url, headers=headers, params=params)
response.json()
```


> Example response (200):

```json
[
    {
        "kata": "dia"
    },
    {
        "kata": "dia"
    },
    {
        "kata": "diabetes"
    }
]
```
> Example response (500):

```json
null
```

### HTTP Request
`GET /api/v1/kamus/search/{query}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    size |  optional  | jumlah kata yang mau ditampilkan. Gunakan 'all' untuk menampilkan semua data.
    page |  optional  | pagination.

### Pagination
Pagination menggunakan Web Linking (RFC 8288), data pagination disimpan di Header Link, yang berisi : first, prev, next, & last.
Total item dapat dilihat di Header X-Total-Count

<!-- END_0d7aadd72603227ec6d9f04f4100ee09 -->

#API Rima


API untuk mendapatkan rima
<!-- START_4946e81e1d3d510534b4b714c68aa743 -->
## Get Rima Akhir

Pencarian rima/kata berdasarkan sukukata terakhir

> Example request:

```bash
curl -X GET -G "https://rima.rfnaj.id/api/v1/rima/akhir/kata?size=3&page=1"
```

```javascript
const url = new URL("https://rima.rfnaj.id/api/v1/rima/akhir/kata");

    let params = {
            "size": "3",
            "page": "1",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("https://rima.rfnaj.id/api/v1/rima/akhir/kata", [
    'query' => [
            "size" => "3",
            "page" => "1",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'https://rima.rfnaj.id/api/v1/rima/akhir/kata'
params = {
	'size': '3',
	'page': '1'
}
headers = {

}
response = requests.request('GET', url, headers=headers, params=params)
response.json()
```


> Example response (200):

```json
[
    {
        "kata": "adicita"
    },
    {
        "kata": "agrowisata"
    },
    {
        "kata": "akta"
    }
]
```
> Example response (500):

```json
null
```

### HTTP Request
`GET /api/v1/rima/akhir/{word}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    size |  optional  | jumlah kata yang mau ditampilkan. Gunakan 'all' untuk menampilkan semua data.
    page |  optional  | pagination.

### Pagination
Pagination menggunakan Web Linking (RFC 8288), data pagination disimpan di Header Link, yang berisi : first, prev, next, & last.
Total item dapat dilihat di Header X-Total-Count

<!-- END_4946e81e1d3d510534b4b714c68aa743 -->

<!-- START_b920a7b59c99d29009228083f16b8363 -->
## Get Rima Akhir Ganda

Pencarian rima/kata berdasarkan dua suku kata terakhir

> Example request:

```bash
curl -X GET -G "https://rima.rfnaj.id/api/v1/rima/akhir-ganda/kata?size=3&page=1"
```

```javascript
const url = new URL("https://rima.rfnaj.id/api/v1/rima/akhir-ganda/kata");

    let params = {
            "size": "3",
            "page": "1",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("https://rima.rfnaj.id/api/v1/rima/akhir-ganda/kata", [
    'query' => [
            "size" => "3",
            "page" => "1",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'https://rima.rfnaj.id/api/v1/rima/akhir-ganda/kata'
params = {
	'size': '3',
	'page': '1'
}
headers = {

}
response = requests.request('GET', url, headers=headers, params=params)
response.json()
```


> Example response (200):

```json
[
    {
        "kata": "karkata"
    },
    {
        "kata": "kosakata"
    },
    {
        "kata": "minikata"
    }
]
```
> Example response (500):

```json
null
```

### HTTP Request
`GET /api/v1/rima/akhir-ganda/{word}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    size |  optional  | jumlah kata yang mau ditampilkan. Gunakan 'all' untuk menampilkan semua data.
    page |  optional  | pagination.

### Pagination
Pagination menggunakan Web Linking (RFC 8288), data pagination disimpan di Header Link, yang berisi : first, prev, next, & last.
Total item dapat dilihat di Header X-Total-Count

<!-- END_b920a7b59c99d29009228083f16b8363 -->

<!-- START_5dfbd90812f0bf46d05c5347658850ea -->
## Get Rima Awal

Pencarian rima/kata berdasarkan sukukata awal

> Example request:

```bash
curl -X GET -G "https://rima.rfnaj.id/api/v1/rima/awal/kata?size=3&page=1"
```

```javascript
const url = new URL("https://rima.rfnaj.id/api/v1/rima/awal/kata");

    let params = {
            "size": "3",
            "page": "1",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("https://rima.rfnaj.id/api/v1/rima/awal/kata", [
    'query' => [
            "size" => "3",
            "page" => "1",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'https://rima.rfnaj.id/api/v1/rima/awal/kata'
params = {
	'size': '3',
	'page': '1'
}
headers = {

}
response = requests.request('GET', url, headers=headers, params=params)
response.json()
```


> Example response (200):

```json
[
    {
        "kata": "ka"
    },
    {
        "kata": "kaabah"
    },
    {
        "kata": "kaba"
    }
]
```
> Example response (500):

```json
null
```

### HTTP Request
`GET /api/v1/rima/awal/{word}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    size |  optional  | jumlah kata yang mau ditampilkan. Gunakan 'all' untuk menampilkan semua data.
    page |  optional  | pagination.

### Pagination
Pagination menggunakan Web Linking (RFC 8288), data pagination disimpan di Header Link, yang berisi : first, prev, next, & last.
Total item dapat dilihat di Header X-Total-Count

<!-- END_5dfbd90812f0bf46d05c5347658850ea -->

<!-- START_11a4d6f46e17cfcf26f1a2a5752e503e -->
## Get Rima Awal Ganda

Pencarian rima/kata berdasarkan dua sukukata awal

> Example request:

```bash
curl -X GET -G "https://rima.rfnaj.id/api/v1/rima/awal-ganda/kata?size=3&page=1"
```

```javascript
const url = new URL("https://rima.rfnaj.id/api/v1/rima/awal-ganda/kata");

    let params = {
            "size": "3",
            "page": "1",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("https://rima.rfnaj.id/api/v1/rima/awal-ganda/kata", [
    'query' => [
            "size" => "3",
            "page" => "1",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'https://rima.rfnaj.id/api/v1/rima/awal-ganda/kata'
params = {
	'size': '3',
	'page': '1'
}
headers = {

}
response = requests.request('GET', url, headers=headers, params=params)
response.json()
```


> Example response (200):

```json
[
    {
        "kata": "katabolisme"
    },
    {
        "kata": "katafalk"
    },
    {
        "kata": "katafora"
    }
]
```
> Example response (500):

```json
null
```

### HTTP Request
`GET /api/v1/rima/awal-ganda/{word}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    size |  optional  | jumlah kata yang mau ditampilkan. Gunakan 'all' untuk menampilkan semua data.
    page |  optional  | pagination.

### Pagination
Pagination menggunakan Web Linking (RFC 8288), data pagination disimpan di Header Link, yang berisi : first, prev, next, & last.
Total item dapat dilihat di Header X-Total-Count

<!-- END_11a4d6f46e17cfcf26f1a2a5752e503e -->

<!-- START_8b1a8eda8277276a00fa55ac7776f5e6 -->
## Get Rima Konsonan

Pencarian rima/kata yang mirip berdasarkan konsonan

> Example request:

```bash
curl -X GET -G "https://rima.rfnaj.id/api/v1/rima/konsonan/kata?size=3&page=1"
```

```javascript
const url = new URL("https://rima.rfnaj.id/api/v1/rima/konsonan/kata");

    let params = {
            "size": "3",
            "page": "1",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("https://rima.rfnaj.id/api/v1/rima/konsonan/kata", [
    'query' => [
            "size" => "3",
            "page" => "1",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'https://rima.rfnaj.id/api/v1/rima/konsonan/kata'
params = {
	'size': '3',
	'page': '1'
}
headers = {

}
response = requests.request('GET', url, headers=headers, params=params)
response.json()
```


> Example response (200):

```json
[
    {
        "kata": "akta"
    },
    {
        "kata": "akte"
    },
    {
        "kata": "akut"
    }
]
```
> Example response (500):

```json
null
```

### HTTP Request
`GET /api/v1/rima/konsonan/{word}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    size |  optional  | jumlah kata yang mau ditampilkan. Gunakan 'all' untuk menampilkan semua data.
    page |  optional  | pagination.

### Pagination
Pagination menggunakan Web Linking (RFC 8288), data pagination disimpan di Header Link, yang berisi : first, prev, next, & last.
Total item dapat dilihat di Header X-Total-Count

<!-- END_8b1a8eda8277276a00fa55ac7776f5e6 -->

<!-- START_fc4a9a6a6f5fdead5f4858d47e175ae4 -->
## Get Rima Vokal

Pencarian rima/kata yang mirip berdasarkan Vokal

> Example request:

```bash
curl -X GET -G "https://rima.rfnaj.id/api/v1/rima/vokal/kata?size=3&page=1"
```

```javascript
const url = new URL("https://rima.rfnaj.id/api/v1/rima/vokal/kata");

    let params = {
            "size": "3",
            "page": "1",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("https://rima.rfnaj.id/api/v1/rima/vokal/kata", [
    'query' => [
            "size" => "3",
            "page" => "1",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'https://rima.rfnaj.id/api/v1/rima/vokal/kata'
params = {
	'size': '3',
	'page': '1'
}
headers = {

}
response = requests.request('GET', url, headers=headers, params=params)
response.json()
```


> Example response (200):

```json
[
    {
        "kata": "aba"
    },
    {
        "kata": "abad"
    },
    {
        "kata": "abah"
    }
]
```
> Example response (500):

```json
null
```

### HTTP Request
`GET /api/v1/rima/vokal/{word}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    size |  optional  | jumlah kata yang mau ditampilkan. Gunakan 'all' untuk menampilkan semua data.
    page |  optional  | pagination.

### Pagination
Pagination menggunakan Web Linking (RFC 8288), data pagination disimpan di Header Link, yang berisi : first, prev, next, & last.
Total item dapat dilihat di Header X-Total-Count

<!-- END_fc4a9a6a6f5fdead5f4858d47e175ae4 -->


