<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Website Bandara</title>
    <style>
        body {
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .flight-schedule {
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .flight-table th, .flight-table td {
            font-family: 'Courier New', Courier, monospace;
            text-align: center;
        }
    </style>
</head>
<body class="text-gray-900">
    <nav class="bg-blue-800 bg-opacity-75">
        <div class="container mx-auto flex justify-between items-center py-4">
            <div class="text-white font-bold text-xl px-8">
                <h1>Website Bandara</h1>
            </div>
            <div class="text-white text-l px-8">
                <a href="{{ route('index') }}">Jadwal Penerbangan</a>
                @auth
                    @if(Auth::user()->AdminLevel >= 1)
                        <a href="{{ route('pegawai') }}" class="text-white hover:text-gray-200 px-4">Pegawai</a>
                    @endif
                    @if(Auth::user()->AdminLevel >= 2)
                        <a href="{{ route('userlist') }}" class="text-white hover:text-gray-200 px-4">Users</a>
                    @endif
                @endauth
            </div>
                <div class="flex items-center space-x-4">
                    @auth
                        <!-- Profile dropdown -->
                        <div class="relative">
                            <button onclick="toggleDropdown()" class="text-white font-bold hover:text-gray-200 px-8 focus:outline-none">
                                {{ Auth::user()->name }}
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                                </svg>
                            </button>
                            <div id="dropdown" class="hidden absolute right-0 mt-2 w-48 bg-blue-500 rounded-md shadow-lg py-2 z-20">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-white hover:bg-blue-600">Logout</button>
                                </form>
                            </div>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <div class="container mx-auto mt-8 p-8 flight-schedule rounded-lg">
        <h1 class="text-4xl font-extrabold mb-5 text-center">Kedatangan</h1>
        <table class="table-auto border-collapse w-full flight-table">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border px-4 py-2">No</th>
                    <th class="border px-4 py-2">Nama Maskapai</th>
                    <th class="border px-4 py-2">Kode Penerbangan</th>
                    <th class="border px-4 py-2">Asal</th>
                    <th class="border px-4 py-2">Waktu Kedatangan</th>
                    <th class="border px-4 py-2">Keterangan</th>
                    @auth
                    @if(Auth::user()->AdminLevel >= 1)
                        <th class="border px-4 py-2">Aksi</th>
                    @endif
                    @endauth
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach ($kedatangan as $row)
                    <tr class="hover:bg-gray-100">
                        <td class="border px-4 py-2">{{ $row->id }}</td>
                        <td class="border px-4 py-2">{{ $row->nama_maskapai }}</td>
                        <td class="border px-4 py-2">{{ $row->kode_penerbangan }}</td>
                        <td class="border px-4 py-2">{{ $row->asal }}</td>
                        <td class="border px-4 py-2">{{ $row->waktu_kedatangan }}</td>
                        <td class="border px-4 py-2">{{ $row->keterangan }}</td>
                        @auth
                        @if(Auth::user()->AdminLevel >= 1)
                        
                            <td class="border px-4 py-2">
                                <a href="{{route('tampildata_kedatangan',$row->id)}}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-block mb-1">Detail</a>
                                <a href="{{route('editdata_kedatangan',$row->id)}}" class="bg-yellow-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-block mb-1">Edit</a>
                                <form onsubmit="return confirmDeletion(event, this);" action="{{route('hapusdata_kedatangan',$row->id)}}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded inline-block mb-1">Hapus</button>
                                </form>
                            </td>
                        
                        @endif
                        @endauth
                    </tr>
                @endforeach
            </tbody>
        </table>
        @auth
        @if(Auth::user()->AdminLevel >= 1)
            <div class="flex justify-center mt-5">
                <a href="{{ route('tambahdata_kedatangan') }}" class="bg-emerald-500 hover:bg-emerald-700 text-white font-bold py-2 px-4 rounded">Tambah Data Kedatangan</a>
            </div>
        @endif
        @endauth
        <div class="mt-4">
            {{ $kedatangan->links() }}
        </div>
    </div>

    <div class="container mx-auto mt-8 p-8 flight-schedule rounded-lg">
        <h1 class="text-4xl font-extrabold mb-5 text-center">Keberangkatan</h1>
        <table class="table-auto border-collapse w-full flight-table">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border px-4 py-2">No</th>
                    <th class="border px-4 py-2">Nama Maskapai</th>
                    <th class="border px-4 py-2">Kode Penerbangan</th>
                    <th class="border px-4 py-2">Tujuan</th>
                    <th class="border px-4 py-2">Waktu Keberangkatan</th>
                    <th class="border px-4 py-2">Keterangan</th>
                    @auth
                    @if(Auth::user()->AdminLevel >= 1)
                    <th class="border px-4 py-2">Aksi</th>
                    @endif
                    @endauth

                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach ($keberangkatan as $row2)
                    <tr class="hover:bg-gray-100">
                        <td class="border px-4 py-2">{{ $row2->id }}</td>
                        <td class="border px-4 py-2">{{ $row2->nama_maskapai }}</td>
                        <td class="border px-4 py-2">{{ $row2->kode_penerbangan }}</td>
                        <td class="border px-4 py-2">{{ $row2->tujuan }}</td>
                        <td class="border px-4 py-2">{{ $row2->waktu_keberangkatan }}</td>
                        <td class="border px-4 py-2">{{ $row2->keterangan }}</td>
                        @auth
                        @if(Auth::user()->AdminLevel >= 1)
                            <td class="border px-4 py-2">
                                <a href="{{route('tampildata_keberangkatan',$row2->id)}}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-block mb-1">Detail</a>
                                <a href="{{route('editdata_keberangkatan',$row2->id)}}" class="bg-yellow-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-block mb-1">Edit</a>
                                <form onsubmit="return confirmDeletion(event, this);" action="{{route('hapusdata_keberangkatan',$row2->id)}}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded inline-block mb-1">Hapus</button>
                                </form>
                            </td>
                        @endif
                        @endauth
                    </tr>
                @endforeach
            </tbody>
        </table>
        @auth
        @if(Auth::user()->AdminLevel >= 1)
            <div class="flex justify-center mt-5">
                <a href="{{ route('tambahdata_keberangkatan') }}" class="bg-emerald-500 hover:bg-emerald-700 text-white font-bold py-2 px-4 rounded">Tambah Data Keberangkatan</a>
            </div>
        @endif
        @endauth
        <div class="mt-4">
            {{ $keberangkatan->links() }}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function toggleDropdown() {
            document.getElementById('dropdown').classList.toggle('hidden');
        }
        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('button')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (!openDropdown.classList.contains('hidden')) {
                        openDropdown.classList.add('hidden');
                    }
                }
            }
        }
    </script>
    <script>
    function confirmDeletion(event, form) {
        event.preventDefault(); // Prevent the form from submitting

        Swal.fire({
            title: 'Yakin menghapus data?',
            text: "Data yang dihapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus data!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit(); // If the user confirms, submit the form
            }
        });
    }
</script>

@if(session('success'))
<script>
    Swal.fire({
        title: 'Sukses!',
        text: "{{ session('success') }}",
        icon: 'success',
        confirmButtonText: 'OK'
    });
</script>
@endif
</body>
</html>
