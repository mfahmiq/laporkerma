<x-layouts>
    <div class="main-part">
        @foreach ($jenis_kermas as $jenis)
            <div class="cpanel cpanel-{{ $loop->index == 0 ? 'green' : ($loop->index == 1 ? 'blue' : 'orange') }}">
                <div class="icon-part">
                    @if ($loop->index == 0)
                        <i class="fa-regular fa-handshake"></i><br>
                        <small>Memorandum Of Understanding</small><br>
                        <small>(MoU)</small>
                    @elseif ($loop->index == 1)
                        <i class="fa-regular fa-note-sticky"></i><br>
                        <small>Memorandum Of Agreement</small><br>
                        <small>(MoA)</small>
                    @else
                        <i class="fa fa-tasks" aria-hidden="true"></i><br>
                        <small>Implementing Arrangement</small><br>
                        <small>(IA)</small>
                    @endif
                    <p>{{ $jenis->kermas_count }}</p> <!-- Jumlah kermas dibatasi berdasarkan instansi -->
                </div>
                <div class="card-content-part">
                    <!-- Tambahkan link ke halaman index dengan query parameter jenis_kerma_id -->
                    <a href="{{ url('kerma') }}?jenis_kerma_id={{ $jenis->id }}">More Details</a>
                </div>
            </div>
        @endforeach
    </div>
</x-layouts>
