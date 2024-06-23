@extends('layouts.user')

@push('css')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endpush

@section('contents')
<div class="card-body">
    <h3 style="color: skyblue; font-size: 24px; font-weight: 700; padding: ">Daftar Peminjaman</h3>
    
    <!-- Search Input -->
    <input type="text" id="searchInput" class="form-control mb-3" style="width: 25%" placeholder="Search by Book Title">

    <div class="table-responsive">
        <table class="table table-bordered" id="peminjamanTable">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Buku</th>
                    <th scope="col">Pengajuan</th>
                    <th scope="col">Tanggal Peminjaman</th>
                    <th scope="col">Tanggal Pengembalian</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $pinjam)
                    <tr>
                        <td>{{ $pinjam->id }}</td>
                        @if ($pinjam->bukus === null)    
                            <td>null</td>
                        @else
                            <td>{{ $pinjam->bukus->judul }}</td>
                        @endif
                        <td>{{ $pinjam->pengajuan }}</td>
                        <td>{{ $pinjam->tangal_peminjaman }}</td>
                        <td>{{ $pinjam->tanggal_pengembalian }}</td>
                        <td>{{ $pinjam->status }}</td>
                        <td> 
                            @if($pinjam->status === 'pengajuan')
                                <form action="{{ route('peminjaman.batal', $pinjam->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Batalkan Peminjaman</button>
                                </form>
                            @elseif($pinjam->status === 'disetujui')
                                <form action="{{ route('peminjaman.kembali', $pinjam->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Kembalikan Buku</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">
                            <div class="alert alert-danger">
                                Data Peminjaman belum Tersedia.
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Sort table by ID in descending order
        sortTableByIdDescending();

        // Search functionality
        const searchInput = document.getElementById('searchInput');
        searchInput.addEventListener('input', filterTable);

        function sortTableByIdDescending() {
            const table = document.getElementById('peminjamanTable').getElementsByTagName('tbody')[0];
            const rows = Array.from(table.rows);

            rows.sort((a, b) => {
                const idA = parseInt(a.cells[0].textContent);
                const idB = parseInt(b.cells[0].textContent);
                return idB - idA; // For descending order
            });

            rows.forEach(row => table.appendChild(row));
        }

        function filterTable() {
            const filter = searchInput.value.toLowerCase();
            const table = document.getElementById('peminjamanTable');
            const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');

            Array.from(rows).forEach(row => {
                const titleCell = row.cells[1];
                const title = titleCell.textContent.toLowerCase();
                row.style.display = title.indexOf(filter) > -1 ? '' : 'none';
            });
        }
    });
</script>
@endpush
