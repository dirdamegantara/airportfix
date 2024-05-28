<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https:cdn.tailwindcss.com"></script>
    <title>Website Bandara</title>
</head>
<body>
    <nav class="bg-blue-500">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-white font-semibold text-lg"><a href="{{route('index')}}">Data Penerbangan</a></div>
            <div>
                <a href="{{route('index')}}" class="text-white hover:text-gray-200 px-4">Tambah Data</a>
            </div>
        </div>
    </nav>
    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-5">Kedatangan</h1>
        <table class="table-auto border-collapse w-full">
            <thead>
                <tr>
                    <th class="border px-4 py-2">No</th>
                    <th class="border px-4 py-2">Nama Maskapai</th>
                    <th class="border px-4 py-2">Kode Penerbangan</th>
                    <th class="border px-4 py-2">Asal</th>
                    <th class="border px-4 py-2">Waktu Kedatangan</th>
                    <th class="border px-4 py-2">Keterangan</th>
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
               
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        //message with sweetalert

    </script>
</body>
</html>
