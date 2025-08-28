  @extends('layouts.app')
    @section('content')
      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <div class="container mt-5">
      <div class="d-flex justify-content-between align-items-center mb-3">
          <h2>Senarai Pengguna</h2>
          <a href="{{route('user.create')}}" class="btn btn-primary">+ Tambah Pengguna</a>
      </div>

      @if(session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

              <table class="table table-bordered table-hover">
                  <thead class="table-dark text-center">
                      <tr>
                          <th>ID</th>
                          <th>Nama </th>
                          <th>Email</th>
                          <th>Tarikh Daftar</th>
                          <th width="15%">Tindakan</th>
                      </tr>
                  </thead>
                  <tbody>
                      @forelse ($users as $key=>$item)
                          <tr>
                              <td class="text-center">{{ ++$key }}</td>
                              <td>{{ $item->name }}</td> 
                              <td>{{ $item->email }}</td>
                              <td>{{ $item->created_at->format('d/m/Y') }}</td>
                              <td class="text-center">
                                <a href="{{ route('user.show', $item->id) }}" class="btn btn-sm btn-info">Show</a>
              <a href="{{ route('user.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
              <!-- Trigger Modal -->
              <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $item->id }}">
                Padam
              </button>
            </td>
                          </tr>
                          <!-- Modal Popup -->
          <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                  <h5 class="modal-title">Padam Rekod</h5>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                  Adakah anda pasti mahu padam <strong>{{ $item->name }}</strong>?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                  <form action="{{ route('user.destroy', $item->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Ya, Padam</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
                      @empty
                          <tr>
                              <td colspan="9" class="text-center text-muted">Tiada rekod ditemui</td>
                          </tr>
                      @endforelse
                  </tbody>
              </table>

            
          </div>
      </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection
