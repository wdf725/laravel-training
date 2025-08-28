  @extends('layouts.app')
    @section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Papar Pengguna</h4>
        </div>
        <div class="card-body">
                
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" value="{{ $user->name }}" name="name" class="form-control" placeholder="Contoh: Laptop" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" value="{{ $user->email }}"name="email" class="form-control" placeholder="Contoh: 10" readonly>
                </div>
 
                <div class="text-end">
                    <!-- <button type="submit" class="btn btn-success">Simpan</button> -->
                    <a href="{{ route('user.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
        </div>
    </div>
</div>
@endsection
