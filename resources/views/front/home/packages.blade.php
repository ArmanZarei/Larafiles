<div class="card mt-4">
    <div class="card-header">
        <i class="align-middle fa-2x fad fa-archive packages-color-text"></i>
        <h4 class="d-inline font-weight-light ml-2 align-middle packages-color-text">Packages</h4>
    </div>
    <div class="card-body">
        @if(isset($packages) && count($packages) > 0)
            <ul class="list-group">
                @foreach($packages as $package)
                    <li class="list-group-item p-0 border-0"><a class="list-group-item-action list-group-item" href="{{ route('front.package.details', $package->id) }}">{{ $package->title }}</a></li>
                @endforeach
            </ul>
        @else
            <p class="alert alert-info text-center mb-0">No Records found</p>
        @endif
    </div>
</div>