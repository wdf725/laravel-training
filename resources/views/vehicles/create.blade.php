  @extends('layouts.app')
    @section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Borang Tambah Vehicle</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('vehicle.store') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label class="form-label">Nama Vehicle</label>
                    <input type="text" name="name" class="form-control" placeholder="Contoh: Laptop" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kuantiti</label>
                    <input type="number" name="qty" class="form-control" placeholder="Contoh: 10" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga (RM)</label>
                    <input type="number" step="0.01" name="price" class="form-control" placeholder="Contoh: 1500.00" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <textarea name="description" class="form-control" rows="3" placeholder="Maklumat tambahan..."></textarea>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="{{ route('vehicle.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
