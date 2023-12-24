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

    .title {
        margin-left: 50px;
    }

    .box {
        border: 1px solid black;
        padding: 5px;
        display: inline-block;
        margin-left: 50px;
        width: 600px;
        height: 500px;
        margin-top: 10px;
    }
</style>

<head>
    <title>Logbook PDF</title>
</head>

<body>
    <center>
        <h1>{{ 'LAPORAN ' }}{{ $categoryLabel }}{{ ' LI' }}</h1>
    </center>
    <div>
        <h3 style="display: inline; margin-right: 0px; margin-bottom: 10px;">Tarikh:</h3>
        <p style="display: inline; margin-top: 0px; margin-bottom: 0px; margin-left: 0px;"><span class="underline"
                style="width: 15%; margin-right: 200px;">{{ $logbook->date }}</span></p>
        <h3 style="display: inline; margin-right: 0px;">Hari:</h3>
        <p style="display: inline; margin-top: 0px; margin-bottom: 0px; margin-left: 0px;"><span class="underline"
                style="width: 15%;">{{ $logbook->hari }}</span></p>
        <div style="margin-top: 10px;">
            <h3 style="display: inline; margin-right: 0px;">Tempat/Lokasi:</h3>
            <p style="display: inline; margin-top: 0px; margin-bottom: 0px; margin-left: 0px;"><span class="underline"
                    style="width: 64%;">{{ $logbook->location }}</span></p>
        </div>
        <div style="margin-top: 10px;">
            <h3 style="display: inline; margin-right: 0px;">Tajuk Kerja/Projek:</h3>
        </div>
        <div class="title">
            <p style="display: inline; margin-top: 0px; margin-bottom: 0px; margin-left: 0px;">
                <span class="underline"
                    style="width: 89%; margin-top: 10px; margin-bottom: 17px">{{ $logbook->title }}</span>
                <span class="underline" style="width: 89%; margin-top: 17px; margin-bottom: 17px;"></span>
            </p>
        </div>
        <div style="margin-top: 10px;">
            <h3 style="display: inline; margin-right: 0px;">Peralatan / Perisian / Dokumen yang digunakan :</h3>
        </div>
        <div class="title">
            <p style="display: inline; margin-top: 0px; margin-bottom: 0px; margin-left: 0px;">
                <span class="underline"
                    style="width: 89%; margin-top: 10px; margin-bottom: 17px">{{ $logbook->field1 }}</span>
                <span class="underline" style="width: 89%; margin-top: 17px; margin-bottom: 17px;"></span>
                <span class="underline" style="width: 89%; margin-top: 17px; margin-bottom: 17px;"></span>
            </p>
        </div>
        <div style="margin-top: 10px;">
            <h3 style="display: inline; margin-right: -50px;">Pengujian yang dijalankan</h3>
            <p style="display: inline;">(sekiranya ada): </p>
        </div>
        <div class="title">
            <p style="display: inline; margin-top: 0px; margin-bottom: 0px; margin-left: 0px;">
                <span class="underline"
                    style="width: 89%; margin-top: 10px; margin-bottom: 17px">{{ $logbook->field2 }}</span>
                <span class="underline" style="width: 89%; margin-top: 17px; margin-bottom: 17px;"></span>
                <span class="underline" style="width: 89%; margin-top: 17px; margin-bottom: 17px;"></span>
            </p>
        </div>
        <div style="margin-top: 10px;">
            <h3 style="display: inline; margin-right: 0px;">Langkah - Langkah Keselamatan</h3>
            <p style="display: inline; margin-left: 0px;">(sekiranya ada):</p>
        </div>
        <div class="title">
            <p style="display: inline; margin-top: 0px; margin-bottom: 0px; margin-left: 0px;">
                <span class="underline"
                    style="width: 89%; margin-top: 10px; margin-bottom: 17px">{{ $logbook->field2 }}</span>
                <span class="underline" style="width: 89%; margin-top: 17px; margin-bottom: 17px;"></span>
                <span class="underline" style="width: 89%; margin-top: 17px; margin-bottom: 17px;"></span>
                <span class="underline" style="width: 89%; margin-top: 17px; margin-bottom: 17px;"></span>
            </p>
        </div>
        <h3>Perincian Kerja/Projek : </h3>
        <p>(Langkah kerja, pengiraan, carta / jadual dan gambar rajah yang bersesuaian perlu disertakan)</p>
        <p><span class="underline" style="margin-top: 17px; margin-bottom: 17px;">{{ $logbook->field4 }}</span></p>
        <p><span class="underline" style="margin-top: 17px; margin-bottom: 17px;"></span></p>
        <p><span class="underline" style="margin-top: 17px; margin-bottom: 17px;"></span></p>
        <p><span class="underline" style="margin-top: 17px; margin-bottom: 17px;"></span></p>
        <p><span class="underline" style="margin-top: 17px; margin-bottom: 17px;"></span></p>
        <p><span class="underline" style="margin-top: 17px; margin-bottom: 17px;"></span></p>

        <div style="margin-top: 10px;">
            <h3 style="display: inline; margin-right: 0px;">Lampiran Perincian Kerja/Projek</h3>
            <p style="display: inline; margin-left: 0px;">(sekiranya ada):</p>
        </div>
        <div class="box">
            {{-- <p style="display: inline; margin-top: 0px; margin-bottom: 0px; margin-left: 0px;">
                <span class="underline" style="width: 89%; margin-top: 10px; margin-bottom: 17px">{{ $logbook->title }}</span>
                <span class="underline" style="width: 89%; margin-top: 17px; margin-bottom: 17px;"></span>
            </p> --}}
        </div>
        <div style="margin-top: 10px;">
            <h3 style="display: inline; margin-right: 0px;">Disemak Oleh</h3>
            {{-- <p style="display: inline; margin-left: 0px;">(Tandatangan Pelajar):</p> --}}
        </div>
        <div style="margin-top: 10px;">
            <h3 style=" margin-right: 0px;">......................................</h3>
            <p>Tandatangan, Nama & Cop Penyelia Syarikat</p>
        </div>
        <div style="margin-top: 10px;">
            <h3 style="display: inline; margin-right: 0px;">Tarikh:</h3>
        </div>

    </div>


</body>

</html>
