<div class="modal fade" id="modalEditVideo" tabindex="-1" aria-labelledby="modalEditVideoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editVideoForm" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditVideoLabel">Edit Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="editVideoId">
                    <div class="mb-3">
                        <label for="new_video" class="form-label">Replace Video (optional)</label>
                        <input type="file" class="form-control" id="new_video" name="video" accept="video/*">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
