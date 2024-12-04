<div class="form-group">
    <label for="major_id">Jurusan</label>
    <select class="form-control" name="major_id" id="major_id">
        @foreach ($majors as $major)
            <option value="{{ $major->id }}">{{ $major->name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="year">Tahun</label>
    <input type="text" class="form-control" name="year" id="year" required>
</div>
<div class="form-group">
    <label for="file">Upload PDF</label>
    <input type="file" class="form-control" name="file" id="file" accept="application/pdf" required>
</div>
<button id="addGraduation" class="btn btn-primary">Tambah Pengumuman</button>
