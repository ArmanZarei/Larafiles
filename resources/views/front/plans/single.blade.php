@extends('layouts.front')
@section('content')
    <div class="container">
        <div class="card mt-3">
            <div class="card-header text-center">
                <i class="align-middle fa-2x fad fa-cube plans-color-text"></i>
                <h4 class="d-inline font-weight-light ml-2 align-middle plans-color-text">{{ $plan->title }}</h4>
            </div>
            <div class="card-body">
                <style>
                    .plan-detail-single tr td:first-of-type{
                        background: #f6f6f6;
                    }
                    .plan-detail-single tr td:nth-of-type(2){
                        text-align: center;
                    }
                </style>
                <table class="table table-bordered col-sm-12 col-md-8 col-lg-6 offset-md-2 offset-lg-3 plan-detail-single">
                    <tbody>
                        <tr>
                            <td>Title</td>
                            <td>{{ $plan->title }}</td>
                        </tr>
                        <tr>
                            <td>Download Limit</td>
                            <td>{{ $plan->download_limit }}</td>
                        </tr>
                        <tr>
                            <td>Days Count</td>
                            <td>{{ $plan->days_count }}</td>
                        </tr>
                        <tr>
                            <td>Price</td>
                            <td>{{ number_format($plan->price) }}</td>
                        </tr>
                    </tbody>
                </table>
                <form action="{{ route('front.plans.subscribe', $plan->id) }}" method="post" class="text-center">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-outline-info">Buy Plan</button>
                </form>
            </div>
        </div>
    </div>
@endsection