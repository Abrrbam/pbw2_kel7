<x-layout>
    <x-slot:title>
        Admin Info Kost
    </x-slot>
    <a href="kost/create"></a>

    <h1 class="text-2xl">Info Kost</h1>

    {{-- Link ke tambah kost--}}
    <a href="kost/create" class="text-xl hover:underline">Tambah Kost</a>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    No.
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama Kost
                </th>
                <th scope="col" class="px-6 py-3">
                    Daerah
                </th>
                <th scope="col" class="px-6 py-3">
                    Tipe
                </th>
                <th scope="col" class="px-6 py-3">
                    Harga
                </th>
                {{-- <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                    <span class="sr-only">Hapus</span>
                </th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($kosts as $kost)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4">
                        {{ $loop->iteration }}
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $kost->nama_kost }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $kost->nama_daerah }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $kost->tipe_kost }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $kost->harga}}
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="" class="font-medium text-blue-600 hover:underline">Details</a>
                        <a href="/kost/{{ $kost->id_kost }}/edit" class="font-medium text-yellow-400 hover:underline">Edit</a>
                        <a href="#" class="font-medium text-red-600 hover:underline">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-layout>