<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Queue</title>
</head>

<body style="background-color:rgb(203, 203, 203)">
    <div class="container mt-4">
        <div class="row justify-content-start">
            @foreach ($tujuan as $item)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <h4 class="card-title mb-4">NOMOR ANTRIAN</h4>
                                <div id="nomor_antri_{{ $item->id }}">
                                    <h1>{{ $item->nomor ? $item->kode . $item->nomor : '--' }}</h1>
                                </div>
                                <h4 class="mt-4">{{ $item->name }}</h4>
                            </div>
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
                        if (el) {
                            el.innerHTML = `<h1>${item.kode}${item.nomor}</h1>`;
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

</body>

</html>
