@extends('layouts.front')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-9">
                <div class="card mt-4">
                    <div class="card-header">
                        <i class="align-middle fa-2x fad fa-folder files-color-text"></i>
                        <h4 class="d-inline font-weight-light ml-2 align-middle files-color-text">{{ $file->title }}</h4>
                        <span class="border p-1 border-dark rounded float-right text-dark">File Size : {{ $file->size_formatted }}</span>
                        <span class="border p-1 border-secondary rounded float-right text-secondary mr-2">File Type : {{ $file->file_type_text }}</span>
                    </div>
                    <div class="card-body">
                        <p>{{ $file->description }}</p>
                    </div>
                    <div class="card-footer text-muted">
                        <i class="fal fa-calendar-alt text-dark"></i>
                        {{ $file->created_at }}
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3">
                <div class="card mt-4">
                    <div class="card-header">
                        <i class="align-middle fa-2x fad fa-download text-success"></i>
                        <h5 class="d-inline font-weight-light ml-2 align-middle text-success">Download</h5>
                    </div>
                    <div class="card-body">
                        @if(\App\Utility\User::is_user_subscribed($current_user_id))
                            <a href="{{ route('front.file.download', $file->id) }}" class="btn btn-outline-success btn-block">Download</a>
                        @else
                            <a href="{{ route('front.plans.list') }}" class="btn btn-outline-info btn-block">Buy Subscribe</a>
                        @endif
                    </div>
                </div>
                @if(\App\Utility\User::is_user_subscribed($current_user_id))
                    <div class="card mt-4">
                        <div class="card-header">
                            <i class="align-middle fa-2x fal fa-exclamation-triangle text-danger"></i>
                            <h5 class="d-inline font-weight-light ml-2 align-middle text-danger">Report Problem</h5>
                        </div>
                        <div class="card-body">
                            <a href="" class="btn btn-outline-danger btn-block" id="report_file" data-fid="{{ $file->id }}">Report Problem</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        jQuery(document).ready(function ($) {
            $("#report_file").on('click', function (event) {
                event.preventDefault();

                const file_id = $(this).data('fid');

                let url = '{{ route("front.file.report", ":id") }}';
                url = url.replace(':id', file_id);

                const token = $("meta[name='csrf-token']").attr('content');


                swal("Report Description:", {
                    content: "input",
                }).then((value) => {
                    $.ajax({
                        url: url,
                        method: 'post',
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': token
                        },
                        data: {
                            description: value
                        },
                        success: function (response) {
                            swal({
                                title: "Success!",
                                text: "Your report was successfully sent.",
                                icon: "success",
                                button: "Ok",
                            });
                        }
                    });
                });

            })
        });
    </script>
@endsection