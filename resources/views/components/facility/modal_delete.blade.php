<div class="modal fade" id="deleteFacilityModal" tabindex="-1" aria-labelledby="deleteFacilityModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteFacilityModalLabel">Hapus Fasilitas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="deleteFacilityForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <p>Apakah Anda yakin ingin menghapus fasilitas ini?</p>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>
