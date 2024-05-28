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
    <form method="POST" action="{{route('storedata_pegawai')}}">
        @csrf
        <div class="w-3/4 mx-auto bg-white rounded-lg overflow-hidden shadow-lg p-8">
            <div class="bg-gray-800 rounded-lg text-center py-4">
                <h2 class="text-xl front-bold text-white">Tambah Data Pegawai</h2>
            </div>
            <div class="p-6">
                <div class="mb-4">
                    <p class="text-gray-600 font-semibold">ID Pegawai</p>
                    <input type="text" id="id_pegawai" name="id_pegawai" class="border border-gray-300 rounded-md py-2 px-3 w-full @error('id_pegawai') is-invalid @enderror" value="{{old('id_pegawai')}}">
                </div>
                {{--Alert --}}
                @error('id_pegawai')
                    <div class="bg-orange-100 border-1-4 border-orange-500 text-orange-700 p-4" role="alert">
                        <p class="font-bold">{{$message}}</p>
                    </div>
                @enderror
                {{--end alert--}}
                <div class="mb-4">
                    <p class="text-gray-600 font-semibold">Nama Lengkap</p>
                    <input type="text" id="nama_lengkap" name="nama_lengkap" class="border border-gray-300 rounded-md py-2 px-3 w-full @error('nama_lengkap') is-invalid @enderror" value="{{old('nama_lengkap')}}">
                </div>
                {{--Alert --}}
                @error('nama_lengkap')
                    <div class="bg-orange-100 border-1-4 border-orange-500 text-orange-700 p-4" role="alert">
                        <p class="font-bold">{{$message}}</p>
                    </div>
                @enderror
                {{--end alert--}}
                <div class="mb-4">
                    <p class="text-gray-600 font-semibold">Alamat</p>
                    <input type="text" id="alamat" name="alamat" class="border border-gray-300 rounded-md py-2 px-3 w-full @error('alamat') is-invalid @enderror" value="{{old('alamat')}}">
                </div>
                {{--Alert --}}
                @error('alamat')
                    <div class="bg-orange-100 border-1-4 border-orange-500 text-orange-700 p-4" role="alert">
                        <p class="font-bold">{{$message}}</p>
                    </div>
                @enderror
                {{--end alert--}}
                <div class="mb-4">
                    <p class="text-gray-600 font-semibold">Jenis Kelamin</p>
                    <div class="flex flex-row items-center">
                        <div class="flex items-center mr-4">
                            <input type="radio" id="jenis_kelamin_l" name="jenis_kelamin" value="Laki-Laki" class="mr-2 @error('jenis_kelamin') is-invalid @enderror" {{old('jenis_kelamin') == 'Laki-Laki' ? 'checked' : '' }}>
                            <label class="text-gray-600 font-semibold" for="jenis_kelamin_l">Laki-Laki</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="jenis_kelamin_p" name="jenis_kelamin" value="Perempuan" class="@error('jenis_kelamin') is-invalid @enderror" {{old('jenis_kelamin') == 'Perempuan' ? 'checked' : '' }}>
                            <label class="text-gray-600 font-semibold" for="jenis_kelamin_p">Perempuan</label>
                        </div>
                    </div>
                </div>
                {{--Alert --}}
                @error('jenis_kelamin')
                    <div class="bg-orange-100 border-1-4 border-orange-500 text-orange-700 p-4" role="alert">
                        <p class="font-bold">{{$message}}</p>
                    </div>
                @enderror
                {{--end alert--}}
                <div class="mb-4">
                    <p class="text-gray-600 font-semibold">Tanggal Lahir</p>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="border border-gray-300 rounded-md py-2 px-3 w-full @error('tanggal_lahir') is-invalid @enderror" value="{{old('tanggal_lahir')}}">
                </div>
                {{--Alert --}}
                @error('tanggal_lahir')
                    <div class="bg-orange-100 border-1-4 border-orange-500 text-orange-700 p-4" role="alert">
                        <p class="font-bold">{{$message}}</p>
                    </div>
                @enderror
                {{--end alert--}}
                <div class="mb-4">
                    <p class="text-gray-600 font-semibold">No. Telp</p>
                    <input type="text" id="no_telp" name="no_telp" class="border border-gray-300 rounded-md py-2 px-3 w-full @error('no_telp') is-invalid @enderror" value="{{old('no_telp')}}">
                </div>
                {{--Alert --}}
                @error('no_telp')
                    <div class="bg-orange-100 border-1-4 border-orange-500 text-orange-700 p-4" role="alert">
                        <p class="font-bold">{{$message}}</p>
                    </div>
                @enderror
                {{--end alert--}}
                <div class="mb-4">
                    <p class="text-gray-600 font-semibold">Divisi</p>
                    <input type="text" id="divisi" name="divisi" class="border border-gray-300 rounded-md py-2 px-3 w-full @error('divisi') is-invalid @enderror" value="{{old('divisi')}}">
                </div>
                {{--Alert --}}
                @error('divisi')
                    <div class="bg-orange-100 border-1-4 border-orange-500 text-orange-700 p-4" role="alert">
                        <p class="font-bold">{{$message}}</p>
                    </div>
                @enderror
                {{--end alert--}}
                <div class="mb-4">
                    <p class="text-gray-600 font-semibold">Jabatan</p>
                    <input type="text" id="jabatan" name="jabatan" class="border border-gray-300 rounded-md py-2 px-3 w-full @error('jabatan') is-invalid @enderror" value="{{old('jabatan')}}">
                </div>
                {{--Alert --}}
                @error('jabatan')
                    <div class="bg-orange-100 border-1-4 border-orange-500 text-orange-700 p-4" role="alert">
                        <p class="font-bold">{{$message}}</p>
                    </div>
                @enderror
                {{--end alert--}}
                <div class="mb-4">
                    <p class="text-gray-600 font-semibold">Gaji</p>
                    <input type="number" id="gaji" name="gaji" class="border border-gray-300 rounded-md py-2 px-3 w-full @error('gaji') is-invalid @enderror" value="{{old('gaji')}}">
                </div>
                {{--Alert --}}
                @error('gaji')
                    <div class="bg-orange-100 border-1-4 border-orange-500 text-orange-700 p-4" role="alert">
                        <p class="font-bold">{{$message}}</p>
                    </div>
                @enderror
                {{--end alert--}}
                <div class="mb-4">
                    <p class="text-gray-600 font-semibold">Diterima Sejak</p>
                    <input type="date" id="diterima_sejak" name="diterima_sejak" class="border border-gray-300 rounded-md py-2 px-3 w-full @error('diterima_sejak') is-invalid @enderror" value="{{old('diterima_sejak')}}">
                </div>
                {{--Alert --}}
                @error('diterima_sejak')
                    <div class="bg-orange-100 border-1-4 border-orange-500 text-orange-700 p-4" role="alert">
                        <p class="font-bold">{{$message}}</p>
                    </div>
                @enderror
                {{--end alert--}}
                <div class="mb-4">
                    <p class="text-gray-600 font-semibold">Lama Bekerja</p>
                    <input type="number" id="lama_bekerja" name="lama_bekerja" class="border border-gray-300 rounded-md py-2 px-3 w-full @error('lama_bekerja') is-invalid @enderror" value="{{old('lama_bekerja')}}">
                </div>
                {{--Alert --}}
                @error('lama_bekerja')
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