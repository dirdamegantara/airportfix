<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Website Bandara</title>
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

    <div class="container mx-auto">
        <div class="w-3/4 mx-auto bg-white rounded-lg overflow-hidden shadow-lg p-8">
            <div class="bg-gray-800 rounded-lg text-center py-4">
                <h2 class="text-xl front-bold text-white">Data Kedatangan</h2>
            </div>
            <div class="p-6">
                <div class="mb-4">
                    <p class="text-gray-600 font-semibold">ID:</p>
                    <p class="text-lg">{{$kedatangan->id}}</p>
                </div>
                <div class="mb-4">
                    <p class="text-gray-600 font-semibold">Nama Maskapai:</p>
                    <p class="text-lg">{{$kedatangan->nama_maskapai}}</p>
                </div>
                <div class="mb-4">
                    <p class="text-gray-600 font-semibold">Kode Penerbangan</p>
                    <p class="text-lg">{{$kedatangan->kode_penerbangan}}</p>
                </div>
                <div class="mb-4">
                    <p class="text-gray-600 font-semibold">Asal</p>
                    <p class="text-lg">{{$kedatangan->asal}}</p>
                </div>
                <div class="mb-4">
                    <p class="text-gray-600 font-semibold">Waktu Kedatangan</p>
                    <p class="text-lg">{{$kedatangan->waktu_kedatangan}}</p>
                </div>
                <div class="mb-4">
                    <p class="text-gray-600 font-semibold">Keterangan</p>
                    <p class="text-lg">{{$kedatangan->keterangan}}</p>
                </div>
                <div class="mb-4">
                    <p class="text-gray-600 font-semibold">Jumlah Penumpang</p>
                    <p class="text-lg">{{$kedatangan->jumlah_penumpang}}</p>
                </div>
                <div class="mb-4">
                    <p class="text-gray-600 font-semibold">Jenis Pesawat</p>
                    <p class="text-lg">{{$kedatangan->jenis_pesawat}}</p>
                </div>
                <div class="mb-4">
                    <p class="text-gray-600 font-semibold">Model Pesawat</p>
                    <p class="text-lg">{{$kedatangan->model_pesawat}}</p>
                </div>
                <div class="mb-4">
                    <p class="text-gray-600 font-semibold">Kode Registrasi</p>
                    <p class="text-lg">{{$kedatangan->kode_registrasi}}</p>
                </div>
                <div class="mb-4">
                    <p class="text-gray-600 font-semibold">Origin</p>
                    <p class="text-lg">{{$kedatangan->origin}}</p>
                </div>
                <div class="mb-4">
                    <a href="{{route('airport.index')}}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-block mb-1">Kembali</a>
                    <a href="{{route('editdata_kedatangan',$kedatangan->id)}}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-block mb-1">Ubah</a>
                </div>
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
    
</body>
</html>
