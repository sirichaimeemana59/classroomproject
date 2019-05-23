@extends('layout.layout')
@section('content')
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="panel-heading">
                        <h3 class="panel-title">{!! trans('messages.subjects.list_subjects') !!}</h3>
                    </div>
                    <div class="panel panel-default" id="panel-lead-list">
                        <div class="panel-body" id="landing-subject-list">
                            {!! Form::model($subject,array('url' => array('teacher/edit_subject/form'),'class'=>'form-horizontal','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
                            <div class="form-group row">
                                <input type="hidden" name="id" value="{!! $subject->id_subject !!}">
                                <lable class="col-sm-2 control-label">{!! trans('messages.subjects.subject_th') !!}</lable>
                                <div class="col-sm-4">
                                    {!! Form::text('name_subject_th',null,array('class'=>'form-control','placeholder'=>trans('messages.subjects.subject_th'),'required')) !!}
                                </div>

                                <lable class="col-sm-2 control-label">{!! trans('messages.subjects.subject_th') !!}</lable>
                                <div class="col-sm-4">
                                    {!! Form::text('name_subject_en',null,array('class'=>'form-control','placeholder'=>trans('messages.subjects.subject_th'),'required')) !!}
                                </div>
                            </div>

                            <?php
                            $time_start = array(
                                0 => "08:30",
                                1 => "09:20",
                                2 => "10:15",
                                3 => "11:05",
                                4 => "11:55",
                                5 => "12:45",
                                6 => "13:35",
                                7 => "14:30",
                                8 => "15:20",
                                9 => "16:10",
                                10 => "17:00",
                                11 => "18:10"
                            );

                            $time_stop = array(
                                0 => "08:30",
                                1 => "09:20",
                                2 => "10:15",
                                3 => "11:05",
                                4 => "11:55",
                                5 => "12:45",
                                6 => "13:35",
                                7 => "14:30",
                                8 => "15:20",
                                9 => "16:10",
                                10 => "17:00",
                                11 => "18:10"
                            );

                            $day = array(
                                0 => trans('messages.day.Monday'),
                                1 => trans('messages.day.Tuesday'),
                                2 => trans('messages.day.Wednesday'),
                                3 => trans('messages.day.Thursday'),
                                4 => trans('messages.day.Friday'),
                                5 => trans('messages.day.Saturday'),
                                6 => trans('messages.day.Sunday')
                            );

                            ?>
                            <div class="form-group row">
                                <lable class="col-sm-2 control-label">{!! trans('messages.subjects.amount') !!}</lable>
                                <div class="col-sm-10">
                                    {!! Form::number('amount',null,array('class'=>'form-control','max'=>50,'min'=>1),'required') !!}
                                </div>
                            </div>

                            <div class="form-group row">

                                <lable class="col-sm-2 control-label">{!! trans('messages.day_time') !!}</lable>
                                <div class="col-sm-10">

                                        <div class="table">
                                            <table class="table-responsive">
                                                <tr>
                                                    <th>{!! trans('messages.day_') !!}</th>
                                                    <th>{!! trans('messages.Class_Start') !!}</th>
                                                    <th>{!! trans('messages.Class_Finish') !!}</th>
                                                    <th>{!! trans('messages.action') !!}</th>
                                                </tr>
                                                <tr>
                                                    <td>{!! Form::select('day',$day,$subject->day,array('class'=>'form-control')) !!}</td>
                                                    <td>{!! Form::select('time_start',$time_start,$subject->time_start,array('class'=>'form-control')) !!}</td>
                                                    <td>{!! Form::select('time_stop',$time_stop,$subject->time_stop,array('class'=>'form-control')) !!}</td>
                                                </tr>
                                    @if(count($subject->join_subjects_transection) != 0)
                                                @foreach($subject->join_subjects_transection as $key => $row)

                                                    <tr>
                                                        <input type="hidden" name="data[0][id_subjects_transection]" value="{!! $row->id !!}">
                                                        <input type="hidden" name="data[0][code_subject]" value="{!! $row->id_subject !!}">
                                                        <td>{!! Form::select('data[0][day_class]',$day,$row->day,array('class'=>'form-control')) !!}</td>
                                                        <td>{!! Form::select('data[0][time_start]',$time_start,$row->time_start,array('class'=>'form-control')) !!}</td>
                                                        <td>{!! Form::select('data[0][time_stop]',$time_stop,$row->time_stop,array('class'=>'form-control')) !!}</td>
                                                        <td><a class="btn btn-danger delete-subject-transection" data-id="{!! $row->id !!}"><i class="mdi mdi-delete-sweep"></i></a></td>
                                                    </tr>
                                                @endforeach
                                    @endif
                                            </table>
                                        </div>
                                </div>
                            </div>

                            <div class="form-group row float-center" style="text-align: center; ">
                                <div class="col-sm-12">
                                    <button class="btn-info btn-primary" type="submit">Save</button>
                                    <button class="btn-info btn-warning" type="reset">Reset</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
@section('script')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        $(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.delete-subject-transection').on('click',function(){
                //alert('aa');
                var id = $(this).data('id');
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete)=> {
                    if (willDelete) {
                        setTimeout(function() {
                            $.post("/teacher/delete/subject_transection", {
                                id: id
                            }, function(e) {
                                swal("Poof! Your imaginary file has been deleted!", {
                                    icon: "success",
                                }).then(function(){
                                    window.location.href ='/teacher/edit_subject/'+id
                                });
                            });
                        }, 50);
                    } else {
                        swal("Your imaginary file is safe!");
                    }
                });
            });
        });
    </script>
@endsection