<!DOCTYPE html>
<html>
<style>
    h4 {
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
        <h1>{{ "BUKU LOG" }}</h1>
        <h1>{{ "LATIHAN IDUSTRI" }}</h1>
        <h1>{{ $detail->name }}</h1>
    </center>
    <div>
        <div style="margin-top: 10px;">
            <h4 style="display: inline; margin-right: 0px;">Nama:</h4>
            <p style="display: inline; margin-top: 0px; margin-bottom: 0px; margin-left: 0px;"><span class="underline"
                    style="width: 64%;">{{ $detail->name }}</span></p>
        </div>
        <div style="margin-top: 10px;">
            <h4 style="display: inline; margin-right: 0px;">No. Kad Pengenalan:</h4>
            <p style="display: inline; margin-top: 0px; margin-bottom: 0px; margin-left: 0px;"><span class="underline"
                    style="width: 64%;">{{ $detail->name }}</span></p>
        </div>
        <div style="margin-top: 10px;">
            <h4 style="display: inline; margin-right: 0px;">No. Pendaftaran:</h4>
            <p style="display: inline; margin-top: 0px; margin-bottom: 0px; margin-left: 0px;"><span class="underline"
                    style="width: 64%;">{{ $detail->name }}</span></p>
        </div>
        <div style="margin-top: 10px;">
            <h4 style="display: inline; margin-right: 0px;">Program:</h4>
            <p style="display: inline; margin-top: 0px; margin-bottom: 0px; margin-left: 0px;"><span class="underline"
                    style="width: 64%;">{{ $detail->name }}</span></p>
        </div>

    </div>


</body>

</html>
