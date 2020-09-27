<form action="" method="POST" class="col-sm-12">
    @include('admin.partials.errors')
    {{ csrf_field() }}
    <div class="form-group">
        @php($plan_title = isset($plan) ? $plan->title : '')
        <input type="text" name="title" class="form-control" placeholder="File Title" value="{{ old('title',$plan_title) }}" autocomplete="off">
    </div>
    <div class="form-row">
        <div class="col-sm-12 col-md-4">
            @php($plan_download_limit = isset($plan) ? $plan->download_limit : '')
            <input type="number" name="download_limit" class="form-control" placeholder="Download Limit Count" value="{{ old('download_limit', $plan_download_limit) }}">
        </div>
        <div class="col-sm-12 mt-sm-2 mt-md-0 col-md-4">
            @php($plan_price = isset($plan) ? $plan->price : '')
            <input type="number" name="price" class="form-control" placeholder="Price" value="{{ old('price', $plan_price) }}">
        </div>
        <div class="col-sm-12 mt-sm-2 mt-md-0 col-md-4">
            @php($plan_days_count = isset($plan) ? $plan->days_count : '')
            <input type="number" name="days_count" class="form-control" placeholder="Days Count" value="{{ old('days_count', $plan_days_count) }}">
        </div>
    </div>
    <button class="btn btn-primary mt-3" type="submit">Create Plan</button>
</form>