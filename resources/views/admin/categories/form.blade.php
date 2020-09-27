<form action="" method="POST" class="col-sm-12">
    @include('admin.partials.errors')
    {{ csrf_field() }}
    <div class="form-group">
        @php($category_title = isset($category) ? $category->title : '')
        <input type="text" name="title" class="form-control col-md-6" placeholder="Category Title" value="{{ old('title',$category_title) }}" autocomplete="off">
    </div>
    <button class="btn btn-primary" type="submit">Create Package</button>
</form>