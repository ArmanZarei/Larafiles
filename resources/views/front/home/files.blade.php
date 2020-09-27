<div class="card mt-4">
    <div class="card-header">
        <i class="align-middle fa-2x fad fa-folders files-color-text"></i>
        <h4 class="d-inline font-weight-light ml-2 align-middle files-color-text">Files</h4>
    </div>
    <div class="card-body">
        @if(isset($files) && count($files) > 0)
            <ul class="list-group">
                @foreach($files as $file)
                    <li class="list-group-item p-0 border-0">
                        <a class="list-group-item-action list-group-item" href="{{ route('front.file.details', $file->id) }}">
                            {{ $file->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="alert alert-info text-center mb-0">No Records found</p>
        @endif
    </div>
</div>