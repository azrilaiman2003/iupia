<!DOCTYPE html>
<html>
<style>
    h3 {
        margin-right: 200px;
        margin-left: 50px;
    }

    p {
        margin-left: 50px;
        margin-top: -20px;
    }

    .underline {
        border-bottom: 1px solid black;
        display: inline-block;
        padding-bottom: 0px;
        width: 100%;
    }

</style>

<head>
    <title>Logbook PDF</title>
</head>

<body>
    <center>
        <h1>{{ 'LAPORAN ' }}{{ $categoryLabel }}{{ ' LATIHAN INDUSTRI' }}</h1>
    </center>
    <div>
        <h3 style="display: inline; margin-right: 0px;">Tarikh:</h3> <p style="display: inline; margin-top: 0px; margin-bottom: 0px; margin-left: 0px;"><span class="underline" style="width: 15%; margin-right: 200px;">{{ $logbook->date }}</span></p>
        <h3 style="display: inline; margin-right: 0px;">Hari:</h3> <p style="display: inline; margin-top: 0px; margin-bottom: 0px; margin-left: 0px;"><span class="underline" style="width: 15%;">{{ $logbook->hari }}</span></p>
        <h3 style="display: inline; margin-right: 0px;">Tempat/Lokasi:</h3> <p style="display: inline; margin-top: 0px; margin-bottom: 0px; margin-left: 0px;"><span class="underline" style="width: 64%;">{{ $logbook->location }}</span></p>
        <h3>Tajuk Kerja/Projek: <span style="text-decoration: underline;">{{ $logbook->title }}</span></h3>
        <h3>Peralatan / Perisian yang digunakan : <span style="text-decoration: underline;">{{ $logbook->field1 }}</span>
        </h3>
        <h3 style="display: inline; margin-right: -50px;">Pengujian yang dijalankan</h3>
        <p style="display: inline;">(sekiranya ada): </p>
        <h3><span style="text-decoration: underline;">{{ $logbook->field2 }}</span></h3>
        <h3 style="display: inline; margin-right: -50px;">Langkah - Langkah Keselamatan</h3>
        <p style="display: inline;">(sekiranya ada):</p>
        <h3><span style="text-decoration: underline;">{{ $logbook->field3 }}</span></h3>
        <h3>Perincian Kerja/Projek : </h3>
        <p>(Langkah kerja, pengiraan, carta / jadual dan gambar rajah yang bersesuaian perlu disertakan)</p>
        <p><span class="underline" style="margin-top: 17px; margin-bottom: 17px;">{{ $logbook->field4 }}</span></p>
        <p><span class="underline" style="margin-top: 17px; margin-bottom: 17px;"></span></p>
        <p><span class="underline" style="margin-top: 17px; margin-bottom: 17px;"></span></p>
        <p><span class="underline" style="margin-top: 17px; margin-bottom: 17px;"></span></p>
        <p><span class="underline" style="margin-top: 17px; margin-bottom: 17px;"></span></p>
        <p><span class="underline" style="margin-top: 17px; margin-bottom: 17px;"></span></p>
        <p><span class="underline" style="margin-top: 17px; margin-bottom: 17px;"></span></p>

    </div>
</body>

</html>
