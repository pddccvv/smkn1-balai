<div class="modal fade" id="modalAddVideo" tabindex="-1" aria-labelledby="modalAddVideoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="uploadVideoForm" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAddVideoLabel">Upload Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="videos" class="form-label">Choose Videos</label>
                        <input type="file" class="form-control" id="videos" name="videos[]" accept="video/*"
                            multiple required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>
