<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        h2, h4, .total{
            text-align: center;
        }
    </style>
</head>

<body>

    <h2>{{$title}}</h2>
    <h4>{{$date}}</h4>

    <table>
        <tr>
            <th></th>
            <th>Debet</th>
            <th>Kredit</th>
        </tr>
        <tr>
            <th>Inventory</th>
            <td></td>
            <td>Rp 10.000.000</td>
        </tr>
        <tr>
            <th>Stockin</th>
            <td></td>
            <td>Rp 10.000.000</td>
        </tr>
        <tr>
            <th>Penjualan</th>
            <td>Rp 100.000.000</td>
            <td></td>
        </tr>
        <tr>
            <th>Total laba</th>
            <th colspan="2" class="total">Rp 80.000.000</th>            
        </tr>
    </table>

</body>

</html>