<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Queue - Cetak Tiket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <style>
        body {
            background: linear-gradient(135deg, #f0f2f5, #d9e2ec);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .queue-card {
            background-color: #d9534f;
            /* Bootstrap danger red */
            color: white;
            border-radius: 16px;
            padding: 50px 30px;
            text-align: center;
            font-size: 1.5rem;
            font-weight: 700;
            box-shadow: 0 6px 15px rgba(217, 83, 79, 0.4);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            cursor: pointer;
            user-select: none;
        }

        .queue-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 25px rgba(217, 83, 79, 0.6);
            text-decoration: none;
            color: white;
        }

        .queue-link {
            text-decoration: none;
            color: inherit;
        }

        .queue-icon {
            font-size: 2rem;
        }

        @media (max-width: 768px) {
            .queue-card {
                font-size: 1.25rem;
                padding: 40px 20px;
            }
        }
    </style>
</head>

<body>
    @include('sweetalert::alert')
    <div class="container mt-5">
        <h2 class="text-center mb-4 fw-bold text-secondary">Pilih Tujuan Antrian</h2>
        <div class="row justify-content-start">
            @foreach ($tujuan as $item)
                <div class="col-md-4 mb-4">
                    <a href="{{ route('ambilAntrian', $item->name) }}" class="queue-link">
                        <div class="queue-card">
                            <i class="bi bi-ticket-perforated queue-icon"></i>
                            {{ $item->name }}
                        </div>
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
