@extends('layouts.front')
@section('content')
    <div class="container">
        <div class="card mt-3">
            <div class="card-header text-center">
                <i class="align-middle fa-2x fad fa-cubes plans-color-text"></i>
                <h4 class="d-inline font-weight-light ml-2 align-middle plans-color-text">Plans</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach($plans as $plan)
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-header text-center text-dark">
                                    {{ $plan->title  }}
                                </div>
                                <div class="card-body">
                                    <style>
                                        .plan-details tr td div{
                                            text-align: center;
                                        }
                                        .plan-details tr td span:first-of-type{
                                            font-size: 13px;
                                        }
                                        .plan-details tr td span:nth-of-type(2){
                                            font-size: 15px;
                                        }
                                        .plan-details tr td{
                                            padding: 15px 5px !important;
                                        }
                                    </style>
                                    <table class="table table-borderless plan-details">
                                        <tr>
                                            <td class="p-0" style="color: #16a085;">
                                                <i class="fa-2x fad fa-download align-middle"></i>
                                                <div class="d-inline-block align-middle">
                                                    <span class="d-block">Download Limit</span>
                                                    <span>{{ $plan->download_limit }}</span>
                                                </div>
                                            </td>
                                            <td class="p-0" style="color: #2980b9;">
                                                <i class="fa-2x fad fa-calendar-alt align-middle"></i>
                                                <div class="d-inline-block align-middle">
                                                    <span class="d-block">Days Count</span>
                                                    <span>{{ $plan->download_limit }}</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-0" style="color: #27ae60;">
                                                <i class="fa-2x fad fa-money-check align-middle mr-1"></i>
                                                <div class="d-inline-block align-middle">
                                                    <span class="d-block">Plan Price</span>
                                                    <span>{{ number_format($plan->price).'$' }}</span>
                                                </div>
                                            </td>
                                            <td class="p-0" style="color: #2c3e50;">
                                                <i class="fa-2x fad fa-tags align-middle mr-1"></i>
                                                <div class="d-inline-block align-middle">
                                                    <span class="d-block">Discount</span>
                                                    <span>0%</span>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                    <a href="{{ route('front.plans.single', $plan->id) }}" class="btn btn-outline-info btn-block">Subscribe</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection