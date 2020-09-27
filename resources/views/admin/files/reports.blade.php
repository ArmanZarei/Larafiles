@extends('layouts.admin')
@section('content')
    @include('admin.flash_message.error')
    @include('admin.flash_message.success')
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>File</th>
            <th>Description</th>
            <th>Status</th>
            <th>Operations</th>
        </tr>
        </thead>
        @if(isset($reports) && count($reports) > 0)
            @foreach($reports as $report)
                @php($status = $report->status)
                <tr>
                    <td>{{ $report->id }}</td>
                    <td><a href="{{ route('front.file.details', $report->file_id) }}">{{ $report->file->title }}</a></td>
                    <td>{{ $report->description }}</td>
                    <td class="text-center">
                        @if($status == \App\Model\FilesReports::STATUS_PENDING)
                            <span class="badge p-2 badge-warning">{{ $report->status_text }}</span>
                        @elseif($status == \App\Model\FilesReports::STATUS_IN_PROGRESS)
                            <span class="badge p-2 badge-info">{{ $report->status_text }}</span>
                        @elseif($status == \App\Model\FilesReports::STATUS_SOLVED)
                            <span class="badge p-2 badge-success">{{ $report->status_text }}</span>
                        @else
                            <span class="badge p-2 badge-dark">{{ $report->status_text }}</span>
                        @endif
                    </td>
                    <td class="text-center">
                        @if($status == \App\Model\FilesReports::STATUS_PENDING)
                            <a class="btn btn-sm btn-outline-info report-action" data-status="{{ \App\Model\FilesReports::STATUS_IN_PROGRESS }}" data-rid="{{ $report->id }}">Start Solving</a>
                        @elseif($status == \App\Model\FilesReports::STATUS_IN_PROGRESS)
                            <a class="btn btn-sm btn-outline-success report-action" data-status="{{ \App\Model\FilesReports::STATUS_SOLVED }}" data-rid="{{ $report->id }}">Solved</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        @endif
    </table>
@endsection

@section('javascript')
    <script>
        jQuery(document).ready(function ($) {
            $('.report-action').on('click', function (event) {
                event.preventDefault();
                let $this = $(this);

                const token = $("meta[name='csrf-token']").attr('content');

                const report_id = $(this).data('rid');

                let url = '{{ route("admin.files.report.change.status", ":id") }}';
                url = url.replace(':id', report_id);

                let status = $(this).attr('data-status');

                $.ajax({
                    url: url,
                    method: 'post',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': token
                    },
                    data: {
                        status: status
                    },
                    success: function (response) {
                        let elem = $this.parent().prev().children().first();

                        if (response.success) {
                            if (response.status === parseInt('{{ \App\Model\FilesReports::STATUS_IN_PROGRESS }}')) {
                                elem.html('In Progress').removeClass('badge-warning').addClass('badge-info');
                                $this.html('Solved').removeClass('btn-outline-info').addClass('btn-outline-success');
                                $this.attr('data-status', {{ \App\Model\FilesReports::STATUS_SOLVED }});
                            } else if (response.status === parseInt('{{ \App\Model\FilesReports::STATUS_SOLVED }}')) {
                                elem.html('Solved').removeClass('badge-info').addClass('badge-success');
                                $this.remove();
                            }
                        }
                    }
                });
            });
        });
    </script>
@endsection