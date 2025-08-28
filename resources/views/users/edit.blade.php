  @extends('layouts.app')
    @section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Borang Kemaskini Inventory</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('users.update',$user->id) }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" value="{{ $user->name }}" name="name" class="form-control" placeholder="Contoh: Laptop" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kuantiti</label>
                    <input type="number" value="{{ $user->email }}" name="qty" class="form-control" placeholder="Contoh: 10" required>
                </div>
 
 

                <div class="text-end">
                    <button type="submit" class="btn btn-warning">Edit Inventory</button>
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
