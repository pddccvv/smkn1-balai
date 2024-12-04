<div class="row">
    @if ($reverse)
        <div class="col">
            <div class="row">
                <p>{{ $description }}</p>
            </div>
            <div class="row">
                <video class="card-img-top" controls>
                    <source src="{{ asset('assets/videos/video-' . $video . '.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
        <div class="col">
            <img src="{{ $image }}" class="img-thumbnail" alt="...">
            <span>{{ $title }}</span>
        </div>
    @else
        <div class="col">
            <img src="{{ $image }}" class="img-thumbnail" alt="...">
            <span>{{ $title }}</span>
        </div>
        <div class="col">
            <div class="row">
                <p>{{ $description }}</p>
            </div>
            <div class="row">
                <video class="card-img-top" controls>
                    <source src="{{ asset('assets/videos/video-' . $video . '.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    @endif
</div>
<hr class="text-danger">
