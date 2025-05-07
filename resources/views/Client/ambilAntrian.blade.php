<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Queue - Cetak Tiket</title>
    <style>
        .queue-card {
            background-color: red;
            color: white;
            border-radius: 12px;
            padding: 40px 20px;
            text-align: center;
            font-size: 1.25rem;
            font-weight: 500;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .queue-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            text-decoration: none;
        }

        .queue-link {
            text-decoration: none;
            color: inherit;
        }
    </style>
</head>

<body style="background-color:rgb(203, 203, 203)">
    @include('sweetalert::alert')
    <div class="container mt-5">
        <div class="row justify-content-start">
            @foreach ($tujuan as $item)
                <div class="col-md-4 mb-4">
                    <a href="{{ route('ambilAntrian', $item->name) }}" class="queue-link">
                        <div class="queue-card">{{ $item->name }}</div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
