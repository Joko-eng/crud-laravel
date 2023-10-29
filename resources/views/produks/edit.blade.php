<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: rgb(65, 26, 238)">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('produks.update', $produks->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- Menggunakan 'kode' sebagai nama input -->
                            <div class="form-group">
                                <label class="font-weight-bold">kode</label>
                                <input type="text" class="form-control @error('kode') is-invalid @enderror" name="kode" value="{{ old('kode', $produks->kode) }}" placeholder="kode produk">
                                <!-- error message untuk 'kode' -->
                                @error('kode')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <!-- Menggunakan 'nama' sebagai nama input -->
                            <div class="form-group">
                                <label class="font-weight-bold">nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama', $produks->nama) }}" placeholder="nama">
                                <!-- error message untuk 'nama' -->
                                @error('nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <!-- Menggunakan 'stok' sebagai nama input -->
                            <div class="form-group">
                                <label class="font-weight-bold">stok</label>
                                <input type="text" class="form-control @error('stok') is-invalid @enderror" name="stok" value="{{ old('stok', $produks->stok) }}" placeholder="stok">
                                <!-- error message untuk 'stok' -->
                                @error('stok')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
</body>
</html>