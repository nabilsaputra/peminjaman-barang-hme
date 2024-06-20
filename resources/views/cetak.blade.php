<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PemBar | Print</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body{
            background-image: url(/images/hme2.png);
            background-repeat: no-repeat;
        }
        .table{
            /* background-color:rgba(71, 178, 228, 0.5); */
            background-color: #fff;
            border: 1px solid #000;
            width: 600px;
            
        }
    
        thead{
            background-color: #D6EEEE;
        }
        
        .table{
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>
    <h1 class="text-center m-5">Transaction List</h1>
    <div class="tabel">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Item</th>
                    <th>Rent Date</th>
                    <th>Return Date</th>
                    <th>Actual Return Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cetaks as $item)
                    <tr class="{{ $item->actual_return_date == null ? '' : ($item->return_date < $item->actual_return_date ? 'text-bg-danger' : 'text-bg-success')}}">
                        <td>{{$loop->iteration}}</td>
                        <td>{{ optional($item->user)->username }}</td>
                        <td>{{ optional($item->item)->item_name }}</td>
                        <td>{{$item->rent_date}}</td>
                        <td>{{$item->return_date}}</td>
                        <td>{{$item->actual_return_date}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>