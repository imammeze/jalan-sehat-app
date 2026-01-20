<!DOCTYPE html>
<html>
<head>
    <title>Tiket Jalan Sehat</title>
    <style>
        @page { margin: 0px; }
        
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #fff;
        }

        .ticket-box {
            width: 100%;
            height: 245pt;
            border: none; 
            box-sizing: border-box;
            position: relative;
            overflow: hidden; 
        }

        .layout-table {
            width: 100%;
            height: 100%; 
            border-collapse: collapse;
            table-layout: fixed;
        }

        .left-section {
            width: 30%;
            padding: 0;
            position: relative;
            vertical-align: middle;
            border-right: 2px dashed #000; 
            background-color: #333; 
        }

        .bg-layer {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            z-index: 0;
        }

        .overlay-layer {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background-color: rgba(0, 0, 0, 0.3); 
            z-index: 1;
        }

        .content-layer {
            position: relative;
            z-index: 2;
            text-align: center;
            padding-top: 0px; 
        }

        .logo-img { 
            width: 90px; 
            height: auto; 
            display: block; 
            margin: 0 auto;
            filter: drop-shadow(0 0 5px rgba(255,255,255,0.5));
        }

        .right-section {
            width: 70%;
            padding: 0;
            vertical-align: top;
            position: relative;
        }

        .right-inner-wrapper {
            position: relative;
            width: 100%;
            height: 100%;
            text-align: center;
        }
        
        .title-area {
            padding-top: 50px; 
        }

        h1 { margin: 0 0 10px 0; font-size: 22px; text-transform: uppercase; font-weight: 900; letter-spacing: 1px; color: #000; line-height: 1.2; }
        h2 { margin: 0 0 10px 0; font-size: 16px; font-weight: normal; color: #333; }
        .date { font-size: 14px; margin-top: 5px; color: #555; }

        .participant-name-box {
            margin-top: 25px;
            display: inline-block;
            border-bottom: 2px solid #ddd;
            padding-bottom: 5px;
        }
        .participant-name {
            font-size: 24px; 
            font-weight: 800;
            color: #000;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .participant-label-small {
            font-size: 10px;
            color: #888;
            margin-bottom: 5px;
            text-transform: uppercase;
        }

        .bottom-area {
            position: absolute;
            bottom: 20px; 
            left: 20px;
            right: 20px;
            height: 40px;
        }

        .ticket-number {
            border: 2px solid #000;
            padding: 5px 15px;
            font-size: 24px;
            font-weight: bold;
            float: left;
            background: #fff;
        }

        .powered-by {
            float: right;
            text-align: right;
            font-size: 11px;
            color: #777;
            font-style: italic;
            margin-top: 15px; 
        }
        .powered-by span {
            font-weight: bold;
            color: #f03333;
        }

        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }
    </style>
</head>
<body>
    <div class="ticket-box">
        <table class="layout-table">
            <tr>
                <td class="left-section">
                    <div class="bg-layer" style="background-image: url('{{ public_path('images/bg-brick.jpg') }}');"></div>
                    
                    <div class="overlay-layer"></div>

                    <div class="content-layer">
                        <img src="{{ public_path('images/Logo_Depan.png') }}" class="logo-img" alt="Logo">
                    </div>
                </td>

                <td class="right-section">
                    <div class="right-inner-wrapper">
                        
                        <div class="title-area">
                            <h1>KUPON JALAN SEHAT</h1>
                            <h2>Peresmian Masjid Al Haq</h2>
                            <div class="date">Sabtu, 31 Januari 2026</div>

                            <div class="participant-name-box">
                                <div class="participant-label-small">Nama Peserta</div>
                                <div class="participant-name">
                                    {{ \Illuminate\Support\Str::limit($participant->name, 25) }}
                                </div>
                            </div>
                        </div>

                        <div class="bottom-area clearfix">
                            <div class="ticket-number">
                                {{ $participant->ticket_number }}
                            </div>

                            <div class="powered-by">
                                Powered by <span>sobatberbagi.com</span>
                            </div>
                        </div>

                    </div>
                </td>
            </tr>
        </table>
    </div>

</body>
</html>