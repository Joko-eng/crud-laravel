<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pemrograman Web Lanjut</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min
.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body style="background: rgb(0, 255, 179)">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Data Produk UMKM GOMBENGSARI</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href=" {{route('produks.create') }}" class="btn btn-md btn-success mb-3">TAMBAH</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Kode</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Stok</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($produks as $produk)
                                <td>{{ $produk->kode }}</td>
                                <td>{{ $produk->nama }}</td>
                                <td>{{ $produk->stok }}</td>
                                
                                <td>
                                    <img src="{{asset('storage/images/'. $produk->image)}}" alt="Gambar" style="max-width: 200px; max-height:200px;" >
                            </td>
                                
                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');" action="{{ route('produks.destroy', $produk->id) }}" method="POST">
                                        <a href="{{ route('produks.edit', $produk->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                        @csrf
                                        @method('DELETE') <!-- Tambahkan ini jika Anda menggunakan metode DELETE dalam rute Anda -->
                                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                    </form>
                                </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4">Tidak ada data produk.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>

    </script>
    <script>
        //message with toastr
        @if(session()->has('success'))
        toastr.success('{{ session('success') }}', 'BERHASIL!'); 
        @elseif(session()->has('error'))
        toastr.error('{{ session('error') }}', 'GAGAL!'); 
        @endif
        </script>
</body>

</html>