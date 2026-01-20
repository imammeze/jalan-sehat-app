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
            text-align: center;
            vertical-align: middle;
            border-right: 2px dashed #000;
            padding: 10px;
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

        .logo-img { width: 90px; height: auto; display: block; margin: 0 auto; }
        
        .title-area {
            padding-top: 50px; 
        }

        h1 { margin: 0; font-size: 22px; text-transform: uppercase; font-weight: 900; letter-spacing: 1px; color: #000; line-height: 1.2; }
        h2 { margin: 5px 0; font-size: 16px; font-weight: normal; color: #333; }
        .date { font-size: 14px; font-weight: bold; margin-top: 5px; color: #000; }

        .bottom-area {
            position: absolute;
            bottom: 15px; 
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

        .participant-label {
            border: 1px solid #000;
            padding: 5px 10px;
            font-size: 11px;
            float: right;
            text-align: left;
            min-width: 160px;
            background: #fff;
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
                    <img src="{{ public_path('images/Logo_Depan.png') }}" class="logo-img" alt="Logo">
                </td>

                <td class="right-section">
                    <div class="right-inner-wrapper">
                        
                        <div class="title-area">
                            <h1>KUPON JALAN SEHAT</h1>
                            <h2>Peresmian Masjid Al Haq</h2>
                            <div class="date">Sabtu, 31 Januari 2026</div>
                        </div>

                        <div class="bottom-area clearfix">
                            <div class="ticket-number">
                                {{ $participant->ticket_number }}
                            </div>

                            <div class="participant-label">
                                UNTUK PESERTA:<br>
                                <b style="font-size: 12px;">{{ strtoupper(\Illuminate\Support\Str::limit($participant->name, 20)) }}</b>
                            </div>
                        </div>

                    </div>
                </td>
            </tr>
        </table>
    </div>

</body>
</html>