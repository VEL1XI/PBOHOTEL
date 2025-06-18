<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='https://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<style>
    body {
        font-family: 'Tahoma', Arial, sans-serif;
        font-size: 13px;
        color: #222;
        background-color: #fff;
        margin: 0;
        padding: 0;
    }
    .header-title {
        font-family: 'Courier New', Courier, monospace;
        font-size: 2.5rem;
        font-weight: bold;
        letter-spacing: 2px;
        color: #222;
    }
    .header-title .gold {
        color: #d4af37;
    }
    .header-title .blue {
        color: #00008b;
    }
    .address {
        font-size: 1rem;
        color: #555;
        margin-bottom: 10px;
    }
    .main-table {
        width: 100%;
        border-radius: 18px;
        border: 2px solid #d4af37;
        overflow: hidden;
        margin-bottom: 18px;
        background: #fff;
        box-shadow: 0 4px 16px rgba(0,0,0,0.07);
    }
    .main-table th {
        background: #00008b;
        color: #fff;
        font-size: 1rem;
        padding: 8px 0;
        border: 1px solid #d4af37;
    }
    .main-table td {
        background: #fffbe6;
        color: #000;
        font-size: 1rem;
        padding: 8px 0;
        border: 1px solid #d4af37;
        text-align: center;
    }
    .info-table td {
        font-size: 1rem;
        padding: 4px 0;
    }
    .total-row td {
        font-size: 1.1rem;
        font-weight: bold;
        color: #d4af37;
        border: none;
        padding-top: 16px;
    }
    .footer-table td {
        border-top: double medium #d4af37;
        font-size: 1rem;
        color: #00008b;
        padding-top: 10px;
    }
    .signature {
        margin-top: 40px;
        text-align: right;
        font-size: 1rem;
        color: #555;
    }
    hr {
        border: none;
        border-top: 2px solid #d4af37;
        margin: 18px 0;
    }
</style>
</head>
<body>
    <hr>
    <center>
        <span class="header-title">HOTEL <span class="gold">HOLLY</span></span>
    </center>
    <div class="address" style="text-align:center;">
        Jl. Holly Raya No. 123, Indonesia<br>
        Phone: (021) 1234-5678
    </div>
    <hr>

    <table class="info-table" align="center" width="100%" cellspacing="0" cellpadding="0">
        <tr>
            <td width="50%">Nama Tamu : <b>{{ $data->user->name }}</b></td>
            <td width="50%" align="right">ID Transaksi : <b>{{$data->id}}</b></td>
        </tr>
    </table>

    <br>

    <table class="main-table" cellspacing="0" cellpadding="2">
        <thead>
            <tr>
                <th>Type Kamar</th>
                <th>Harga/Kamar</th>
                <th>Check In</th>
                <th>Check Out</th>
                <th>Jumlah Kamar</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $data->room->roomType->name }}</td>
                <td>@currency($data->room->roomType->price)</td>
                <td>{{ $data->check_in }}</td>
                <td>{{ $data->check_out }}</td>
                <td>{{ $data->many_room }}</td>
            </tr>
        </tbody>
    </table>

    <table width="100%" cellspacing="0" cellpadding="2">
        <tr class="total-row">
            <td align="right" colspan="4">Total :</td>
            <td align="center">@currency($data->payment->price)</td>
        </tr>
    </table>

    <div class="signature">
        <b>HOTEL <span class="gold">HOLLY</span></b><br>
        Jl. Holly Raya No. 123, Indonesia<br>
        Phone: (021) 1234-5678<br>
        <span style="font-size:0.95rem; color:#888;">Invoice Hotel</span>
    </div>
</body>
</html>