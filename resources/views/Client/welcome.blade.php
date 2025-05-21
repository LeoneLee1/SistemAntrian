<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Queue</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        body {
            background: linear-gradient(to right, #e0eafc, #cfdef3);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: scale(1.03);
        }

        .card-title {
            font-weight: bold;
            color: #343a40;
        }

        .queue-number {
            font-size: 4rem;
            font-weight: bold;
            color: #007bff;
            transition: all 0.3s ease-in-out;
        }

        .card h4 {
            color: #6c757d;
        }

        .loader {
            display: none;
            width: 20px;
            height: 20px;
            border: 3px solid #f3f3f3;
            border-top: 3px solid #007bff;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: auto;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4 text-center fw-bold">Live Queue Monitor</h2>
        <div class="row" id="queue-container">
            @foreach ($tujuan as $item)
                <div class="col-md-4 mb-4">
                    <div class="card p-3 text-center">
                        <div class="card-body">
                            <h5 class="card-title mb-3">NOMOR ANTRIAN</h5>
                            <div id="nomor_antri_{{ $item->id }}" class="queue-number">
                                {{ $item->nomor ? $item->kode . $item->nomor : '--' }}
                            </div>
                            <div class="loader" id="loader_{{ $item->id }}"></div>
                            <h4 class="mt-4">{{ $item->name }}</h4>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            async function refreshItems() {
                try {
                    const response = await fetch('/load-data?_=' + new Date().getTime());
                    if (!response.ok) throw new Error('Network error');
                    const data = await response.json();

                    data.forEach(item => {
                        const el = document.getElementById(`nomor_antri_${item.tujuans_id}`);
                        const loader = document.getElementById(`loader_${item.tujuans_id}`);

                        if (el && loader) {
                            loader.style.display = 'inline-block';
                            setTimeout(() => {
                                el.innerHTML =
                                    `<div class="queue-number">${item.kode}${item.nomor}</div>`;
                                loader.style.display = 'none';
                                el.classList.add("animate__animated", "animate__fadeIn");
                                setTimeout(() => el.classList.remove("animate__animated",
                                    "animate__fadeIn"), 1000);
                            }, 500);
                        }
                    });
                } catch (error) {
                    console.error('Gagal mengambil data:', error);
                }
            }

            refreshItems();
            setInterval(refreshItems, 4000);
        });
    </script>

    <!-- Animate.css for smooth transitions (optional) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</body>

</html>
