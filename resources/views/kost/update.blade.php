<x-layout>
    <x-slot:title>
        Form Edit Kost
        </x-slot>

        <form action="/kost/{{ $kost->id_kost}}" method="post" enctype="multipart/form-data" class="max-w-sm mx-auto">
            @method('put')
            @csrf
            <h1 class="text-3xl">Edit Info Kost</h1>
            <div class="mb-5">
                {{-- nama_kost, nama_daerah, kontak, alamat, tipe_kost, deskripsi, harga --}}
                <label for="namaKost" class="block mb-2 text-sm font-medium text-gray-900">Nama Kost</label>
                <input type="text" id="namaKost" name="nama_kost" value="{{ $kost->nama_kost }}"
                    class=" @error('nama_kost') is-invalid @enderror 
        bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                {{-- Validation --}}
                @error('nama_kost')
                <p class="mt-2 text-sm text-red-600 "><span class="font-medium">{{ $message }}</span></p>
                @enderror


            </div>
            <div class="mb-5">
                <label for="namaDaerah" class="block mb-2 text-sm font-medium text-gray-900">Pilih Daerah</label>
                <select id="namaDaerah" name="nama_daerah"
                    class=" @error('nama_daerah') is-invalid @enderror
        bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @error('nama_kost')
                    <p class="mt-2 text-sm text-red-600 "><span class="font-medium">{{ $message }}</span></p>
                    @enderror
                    <option value="" disabled>Pilih daerah</option>
                    <option value="Sukapura" {{ $kost->nama_daerah == 'Sukapura' ? 'selected' : ''}}>Sukapura</option>
                    <option value="Sukabirus" {{ $kost->nama_daerah == 'Sukabirus' ? 'selected' : ''}}>Sukabirus
                    </option>
                    <option value="PBB" {{ $kost->nama_daerah == 'PBB' ? 'selected' : ''}}>PBB</option>
                    <option value="PGA" {{ $kost->nama_daerah == 'PGA' ? 'selected' : ''}}>PGA</option>
                    <option value="Ciganitri" {{ $kost->nama_daerah == 'Ciganitri' ? 'selected' : ''}}>Ciganitri
                    </option>
                    <option value="Mangga Dua" {{ $kost->nama_daerah == 'Mangga Dua' ? 'selected' : ''}}>Mangga Dua
                    </option>
                </select>
            </div>
            <div class="mb-5">
                <label for="kontak" class="block mb-2 text-sm font-medium text-gray-900 ">Nomor Pemilik Kost</label>
                <input type="text" id="kontak" name="kontak" value="{{ $kost->kontak }}"
                    class=" @error('kontak') is-invalid @enderror
        bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required />
                @error('kontak')
                <p class="mt-2 text-sm text-red-600 "><span class="font-medium">{{ $message }}</span></p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900">Alamat Kost</label>
                <input type="text" id="alamat" name="alamat" value="{{ $kost->alamat }}"
                    class=" @error('alamat') is-invalid @enderror
        bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                @error('alamat')
                <p class="mt-2 text-sm text-red-600 "><span class="font-medium">{{ $message }}</span></p>
                @enderror
            </div>
            <div class="mb-5">
                <fieldset class="flex items-start justify-around">
                    <legend class="sr-only">Tipe Kost</legend>
                    <div class="flex items-start mb-4">
                        <input id="tipe-kost-1" type="radio" name="tipe_kost" value="Umum"
                            class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300" {{ $kost->tipe_kost ==
                        'Umum' ? 'checked' : ''}}>
                        <label for="tipe-kost-1" class="block ms-2  text-sm font-medium text-gray-900">
                            Umum
                        </label>
                    </div>

                    <div class="flex items-start mb-4">
                        <input id="tipe-kost-2" type="radio" name="tipe_kost" value="Putra"
                            class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300" {{ $kost->tipe_kost ==
                        'Putra' ? 'checked' : ''}}>
                        <label for="tipe-kost-2" class="block ms-2 text-sm font-medium text-gray-900">
                            Putra
                        </label>
                    </div>

                    <div class="flex items-start mb-4">
                        <input id="tipe-kost-3" type="radio" name="tipe_kost" value="Putri"
                            class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300" {{ $kost->tipe_kost ==
                        'Putri' ? 'checked' : ''}}>
                        <label for="tipe-kost-3" class="block ms-2 text-sm font-medium text-gray-900">
                            Putri
                        </label>
                    </div>
                </fieldset>
            </div>
            <div class="mb-5">
                <label for="harga" class="block mb-2 text-sm font-medium text-gray-900">Harga</label>
                <input type="text" id="harga" name="harga" value="{{ $kost->harga }}"
                    class="@error('harga') is-invalid @enderror
        bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                @error('harga')
                <p class="mt-2 text-sm text-red-600 "><span class="font-medium">{{ $message }}</span></p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900 ">Deskripsi Kost</label>
                <textarea id="deskripsi" rows="4" name="deskripsi"
                    class=" @error('deskripsi') is-invalid @enderror
        block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Berikan deskripsi untuk kostnya...">{{ $kost->deskripsi}}</textarea>
                @error('deskripsi')
                <p class="mt-2 text-sm text-red-600 "><span class="font-medium">{{ $message }}</span></p>
                @enderror
            </div>

            <div class="mb-5">
                <label class="block mb-2 text-sm font-medium text-gray-900" for="foto">Upload foto</label>
                @if ($kost->foto)
                <img class="h-auto max-w-xs" src="{{ asset('storage/' . $kost->foto)}}">
                @endif
                <input type="hidden" name="fotoLama" value="{{ $kost->foto }}">

                <input type="file" name="foto" id="foto" value="{{ $kost->foto }}"
                class=" @error('foto') is-invalid @enderror
        block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50">
                @error('foto')
                <p class="mt-2 text-sm text-red-600 "><span class="font-medium">{{ $message }}</span></p>
                @enderror
            </div>

            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
        </form>

</x-layout>