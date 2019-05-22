@extends('layout.layout')
@section('content')
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="panel-heading">
                        <h3 class="panel-title">{!! trans('messages.class_schedule') !!}</h3>
                    </div>
                    <div class="panel panel-default" id="panel-lead-list">
                        <br>
                        <div class="panel-body" id="landing-subject-list">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th style="text-align: center;" colspan="21">{!! trans('messages.class_schedule') !!}</th>
                                    </tr>
                                    <tr>
                                        <th>{!! trans('messages.day_time') !!}</th>
                                        <th>{!! trans('messages.time.1') !!}</th>
                                        <th>{!! trans('messages.time.2') !!}</th>
                                        <th>{!! trans('messages.time.3') !!}</th>
                                        <th>{!! trans('messages.time.4') !!}</th>
                                        <th>{!! trans('messages.time.5') !!}</th>
                                        <th>{!! trans('messages.time.6') !!}</th>
                                        <th>{!! trans('messages.time.7') !!}</th>
                                        <th>{!! trans('messages.time.8') !!}</th>
                                        <th>{!! trans('messages.time.9') !!}</th>
                                        <th>{!! trans('messages.time.10') !!}</th>
                                        <th>{!! trans('messages.time.11') !!}</th>
                                        <th>{!! trans('messages.time.12') !!}</th>
                                        <th>{!! trans('messages.time.13') !!}</th>
                                        <th>{!! trans('messages.time.14') !!}</th>
                                        <th>{!! trans('messages.time.15') !!}</th>
                                        <th>{!! trans('messages.time.16') !!}</th>
                                        <th>{!! trans('messages.time.17') !!}</th>
                                        <th>{!! trans('messages.time.18') !!}</th>
                                        <th>{!! trans('messages.time.19') !!}</th>
                                        <th>{!! trans('messages.time.20') !!}</th>
                                        <th>{!! trans('messages.time.21') !!}</th>
                                    </tr>
                                    <tr>
                                        <td>{!! trans('messages.day.Monday') !!}</td>
                                    </tr>
                                    <tr>
                                        <td>{!! trans('messages.day.Tuesday') !!}</td>
                                    </tr>
                                    <tr>
                                        <td>{!! trans('messages.day.Wednesday') !!}</td>
                                    </tr>
                                    <tr>
                                        <td>{!! trans('messages.day.Thursday') !!}</td>
                                    </tr>
                                    <tr>
                                        <td>{!! trans('messages.day.Friday') !!}</td>
                                    </tr>
                                    <tr>
                                        <td>{!! trans('messages.day.Saturday') !!}</td>
                                    </tr>
                                    <tr>
                                        <td>{!! trans('messages.day.Sunday') !!}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection