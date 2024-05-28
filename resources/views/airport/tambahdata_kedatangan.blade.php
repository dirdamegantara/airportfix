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
    <form method="POST" action="{{route('storedata_kedatangan')}}">
        @csrf
        <div class="w-3/4 mx-auto bg-white rounded-lg overflow-hidden shadow-lg p-8">
            <div class="bg-gray-800 rounded-lg text-center py-4">
                <h2 class="text-xl front-bold text-white">Tambah Data Kedatangan</h2>
            </div>
            <div class="p-6">
                <div class="mb-4">
                    <p class="text-gray-600 font-semibold">Nama Maskapai:</p>
                    <input type="text" id="nama_maskapai" name="nama_maskapai" class="border border-gray-300 rounded-md py-2 px-3 w-full @error('nama_maskapai') is-invalid @enderror" value="{{old('nama_maskapai')}}">
                </div>
                {{--Alert --}}
                @error('nama_maskapai')
                    <div class="bg-orange-100 border-1-4 border-orange-500 text-orange-700 p-4" role="alert">
                        <p class="font-bold">{{$message}}</p>
                    </div>
                @enderror
                {{--end alert--}}
                <div class="mb-4">
                    <p class="text-gray-600 font-semibold">Kode Penerbangan</p>
                    <input type="text" id="kode_penerbangan" name="kode_penerbangan" class="border border-gray-300 rounded-md py-2 px-3 w-full @error('kode_penerbangan') is-invalid @enderror" value="{{old('kode_penerbangan')}}">
                </div>
                {{--Alert --}}
                @error('kode_penerbangan')
                    <div class="bg-orange-100 border-1-4 border-orange-500 text-orange-700 p-4" role="alert">
                        <p class="font-bold">{{$message}}</p>
                    </div>
                @enderror
                {{--end alert--}}
                <div class="mb-4">
                    <p class="text-gray-600 font-semibold">Asal</p>
                    <input type="text" id="asal" name="asal" class="border border-gray-300 rounded-md py-2 px-3 w-full @error('asal') is-invalid @enderror" value="{{old('asal')}}">
                </div>
                {{--Alert --}}
                @error('asal')
                    <div class="bg-orange-100 border-1-4 border-orange-500 text-orange-700 p-4" role="alert">
                        <p class="font-bold">{{$message}}</p>
                    </div>
                @enderror
                {{--end alert--}}
                <div class="mb-4">
                    <p class="text-gray-600 font-semibold">Waktu Kedatangan</p>
                    <input type="time" id="waktu_kedatangan" name="waktu_kedatangan" class="border border-gray-300 rounded-md py-2 px-3 w-full @error('waktu_kedatangan') is-invalid @enderror" value="{{old('waktu_kedatangan')}}">
                </div>
                {{--Alert --}}
                @error('waktu_kedatangan')
                    <div class="bg-orange-100 border-1-4 border-orange-500 text-orange-700 p-4" role="alert">
                        <p class="font-bold">{{$message}}</p>
                    </div>
                @enderror
                {{--end alert--}}
                <div class="mb-4">
                    <p class="text-gray-600 font-semibold">Keterangan</p>
                    <input type="text" id="keterangan" name="keterangan" class="border border-gray-300 rounded-md py-2 px-3 w-full @error('keterangan') is-invalid @enderror" value="{{old('keterangan')}}">
                </div>
                {{--Alert --}}
                @error('keterangan')
                    <div class="bg-orange-100 border-1-4 border-orange-500 text-orange-700 p-4" role="alert">
                        <p class="font-bold">{{$message}}</p>
                    </div>
                @enderror
                {{--end alert--}}
                <div class="mb-4">
                    <p class="text-gray-600 font-semibold">Jumlah Penumpang</p>
                    <input type="number" id="jumlah_penumpang" name="jumlah_penumpang" class="border border-gray-300 rounded-md py-2 px-3 w-full @error('jumlah_penumpang') is-invalid @enderror" value="{{old('jumlah_penumpang')}}">
                </div>
                {{--Alert --}}
                @error('jumlah_penumpang')
                    <div class="bg-orange-100 border-1-4 border-orange-500 text-orange-700 p-4" role="alert">
                        <p class="font-bold">{{$message}}</p>
                    </div>
                @enderror
                {{--end alert--}}
                <div class="mb-4">
                    <p class="text-gray-600 font-semibold">Jenis Pesawat</p>
                    <input type="text" id="jenis_pesawat" name="jenis_pesawat" class="border border-gray-300 rounded-md py-2 px-3 w-full @error('jenis_pesawat') is-invalid @enderror" value="{{old('jenis_pesawat')}}">
                </div>
                {{--Alert --}}
                @error('jenis_pesawat')
                    <div class="bg-orange-100 border-1-4 border-orange-500 text-orange-700 p-4" role="alert">
                        <p class="font-bold">{{$message}}</p>
                    </div>
                @enderror
                {{--end alert--}}
                <div class="mb-4">
                    <p class="text-gray-600 font-semibold">Model Pesawat</p>
                    <input type="text" id="model_pesawat" name="model_pesawat" class="border border-gray-300 rounded-md py-2 px-3 w-full @error('model_pesawat') is-invalid @enderror" value="{{old('model_pesawat')}}">
                </div>
                {{--Alert --}}
                @error('model_pesawat')
                    <div class="bg-orange-100 border-1-4 border-orange-500 text-orange-700 p-4" role="alert">
                        <p class="font-bold">{{$message}}</p>
                    </div>
                @enderror
                {{--end alert--}}
                <div class="mb-4">
                    <p class="text-gray-600 font-semibold">Kode Registrasi</p>
                    <input type="text" id="kode_registrasi" name="kode_registrasi" class="border border-gray-300 rounded-md py-2 px-3 w-full @error('kode_registrasi') is-invalid @enderror" value="{{old('kode_registrasi')}}">
                </div>
                {{--Alert --}}
                @error('kode_registrasi')
                    <div class="bg-orange-100 border-1-4 border-orange-500 text-orange-700 p-4" role="alert">
                        <p class="font-bold">{{$message}}</p>
                    </div>
                @enderror
                {{--end alert--}}
                <div class="mb-4">
                    <p class="text-gray-600 font-semibold">Origin</p>
                    <input type="text" id="origin" name="origin" class="border border-gray-300 rounded-md py-2 px-3 w-full @error('origin') is-invalid @enderror" value="{{old('origin')}}">
                </div>
                {{--Alert --}}
                @error('origin')
                    <div class="bg-orange-100 border-1-4 border-orange-500 text-orange-700 p-4" role="alert">
                        <p class="font-bold">{{$message}}</p>
                    </div>
                @enderror
                {{--end alert--}}
                <div>
                    <button type="submit" class="bg-yellow-500 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded">Tambah</button>
                </div>
    </form>
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
