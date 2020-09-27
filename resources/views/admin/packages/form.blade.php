<form action="" method="POST" class="col-sm-12">
    @include('admin.partials.errors')
    {{ csrf_field() }}
    <div class="form-group">
        @php($package_title = isset($package) ? $package->title : '')
        <input type="text" name="title" class="form-control" placeholder="Package Title" value="{{ old('title',$package_title) }}" autocomplete="off">
    </div>
    <div class="form-row">
        <div class="col-sm-12 col-md-4">
            @php($package_price = isset($package) ? $package->price : '')
            <input type="number" name="price" class="form-control" placeholder="Price" value="{{ old('price', $package_price) }}">
        </div>
    </div>
    <div class="form-group mt-4">
        <label for="categories">Categories :</label>
        <select name="categories[]" id="categories" class="form-control select2 col-6" multiple>
            @foreach($categories as $category)
                @php( $isSelected = (isset($package) && isset($package_categories) && in_array($category->id,$package_categories)) ? 'selected' : '')
                <option value="{{ $category->id }}" {{ $isSelected }}>{{ $category->title }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group mt-4">
        <label for="files">Files :</label>
        @if(isset($files) && count($files) > 0)
            <select class="form-control col-6 select2" name="files[]" id="files" multiple size="10">
                @foreach($files as $file)
                    @php( $isSelected = (isset($package) && isset($package_files) && in_array($file->id,$package_files)) ? 'selected' : '')
                    <option value="{{ $file->id }}" {{$isSelected}}>{{ $file->title }}</option>
                @endforeach
            </select>
        @else
            <p class="alert alert-warning">No file exist to choose. Please Create some files first</p>
        @endif
    </div>
    <button class="btn btn-primary mt-3" type="submit">Create Package</button>
</form>