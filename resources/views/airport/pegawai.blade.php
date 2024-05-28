<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Pegawai</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

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

<div class="w-4/5 container mx-auto py-8">
    <h1 class="text-3xl font-semibold mb-4">Daftar Pegawai</h1>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded-lg">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-2">ID Pegawai</th>
                    <th class="px-4 py-2">Nama Lengkap</th>
                    <th class="px-4 py-2">Divisi</th>
                    <th class="px-4 py-2">Jabatan</th>
                    <th class="px-4 py-2">Gaji</th>
                    <th class="px-4 py-2">Diterima Sejak</th>
                    <th class="px-4 py-2">Lama Bekerja<br>(Hari)</th>
                    @auth
                    @if(Auth::user()->AdminLevel >= 1)
                        <th class="border px-4 py-2">Aksi</th>
                    @endif
                    @endauth
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($pegawai as $pegawai)
                <tr>
                    <td class="px-4 py-2">{{ $pegawai->id_pegawai }}</td>
                    <td class="px-4 py-2">{{ $pegawai->nama_lengkap }}</td>
                    <td class="px-4 py-2">{{ $pegawai->divisi }}</td>
                    <td class="px-4 py-2">{{ $pegawai->jabatan }}</td>
                    <td class="px-4 py-2">{{ $pegawai->gaji }}</td>
                    <td class="px-4 py-2">{{ $pegawai->diterima_sejak }}</td>
                    <td class="px-4 py-2">{{ $pegawai->lama_bekerja }}</td>
                    @auth
                        @if(Auth::user()->AdminLevel >= 1)
                            <td class="border px-4 py-2">
                                <a href="{{route('tampildata_pegawai',$pegawai->id)}}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-block mb-1">Detail</a>
                                <a href="{{route('editdata_pegawai',$pegawai->id)}}" class="bg-yellow-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-block mb-1">Edit</a>
                                <form onsubmit="return confirmDeletion(event, this);" action="{{route('hapusdata_pegawai',$pegawai->id)}}" method="POST" style="display:inline;">
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
        <div class="flex justify-center mt-5">
            <a href="{{route('tambahdata_pegawai')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block mb-1">Tambah Data Pegawai</a>
        </div>
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
