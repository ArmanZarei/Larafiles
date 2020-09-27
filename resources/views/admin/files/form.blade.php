<form action="" method="POST" class="col-sm-12" enctype="multipart/form-data">
    @include('admin.partials.errors')
    {{ csrf_field() }}
    <div class="form-group">
        @php($file_title = isset($file) ? $file->title : '')
        <input type="text" name="title" class="form-control" placeholder="File Title" value="{{ old('title',$file_title) }}">
    </div>
    <div class="form-group">
        @php($file_description = isset($file) ? $file->description : '')
        <textarea name="description" class="form-control" cols="30" rows="10">{{ old('description', $file_description) }}</textarea>
    </div>
    <div class="form-group">
        <input type="file" name="file">
    </div>
    <button class="btn btn-primary mt-2" type="submit">Create File</button>
</form>