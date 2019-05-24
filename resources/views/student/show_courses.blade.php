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
                        <table cellspacing="0" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>{!! trans('messages.number') !!}</th>
                                <th>{!! trans('messages.subjects.subject_th') !!}</th>
                                <th>{!! trans('messages.subjects.time_start') !!}</th>
                                <th>{!! trans('messages.subjects.time_stop') !!}</th>
                                <th>{!! trans('messages.teacher.list_teacher') !!}</th>
                                <th>{!! trans('messages.status') !!}</th>
                                <th>{!! trans('messages.action') !!}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($register_courses_))
                                @foreach($register_courses_ as $key => $row)
                                    <tr>
                                        <td>{!! $key+1 !!}</td>
                                        <td> {!! $row->join_subject->{'name_subject_'.Session::get('locale')} !!}</td>
                                        <td>{!! $row->join_subject->time_start !!}</td>
                                        <td>{!! $row->join_subject->time_stop !!}</td>
                                        <td>{!! $row->join_subject->join_teacher->name_teacher !!}   {!! $row->join_subject->join_teacher->lastname_teacher !!}</td>
                                        <td>@if($row->status == 1){!! trans('messages.approved') !!} @else {!! trans('messages.no_approved') !!} @endif</td>
                                        <td>
                                            <button class="btn btn-danger mt-2 mt-xl-0 text-right delete-courses" data-id="{!! $row->id_courses !!}" @if($row->status == 1) disabled @endif><i class="mdi mdi-delete-sweep"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td>{!! trans('messages.no-data') !!}</td>
                                </tr>

                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="panel-heading">
                        <h3 class="panel-title">{!! trans('messages.class_schedule') !!}</h3>
                    </div>
                    <div class="panel panel-default" id="panel-lead-list">
                        <br>
                        <?php
                        $timeArr = array(
                            0 => array( "start" => "08:30", "stop" => "09:20"),
                            1 => array( "start" => "09:20", "stop" => "10:10"),
                            2 => array( "start" => "10:15", "stop" => "11:05"),
                            3 => array( "start" => "11:05", "stop" => "11:55"),
                            4 => array( "start" => "11:55", "stop" => "12:45"),
                            5 => array( "start" => "12:45", "stop" => "13:35"),
                            6 => array( "start" => "13:35", "stop" => "14:30"),
                            7 => array( "start" => "14:30", "stop" => "15:20"),
                            8 => array( "start" => "15:20", "stop" => "16:10"),
                            9 => array( "start" => "16:10", "stop" => "17:00"),
                            10 => array( "start" => "17:00", "stop" => "17:50"),
                            11 => array( "start" => "18:10", "stop" => "19:50")
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
                        <div class="panel-body" id="landing-subject-list">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th style="text-align: center;" colspan="21">{!! trans('messages.class_schedule') !!}</th>
                                    </tr>
                                    <tr>
                                        <th>{!! trans('messages.day_time') !!}</th>
                                    @foreach( $timeArr as $data )
                                        <th>{!! $data['start'] !!} - {!! $data['stop'] !!}</th>
                                    @endforeach
                                    </tr>

                                    @foreach($register_courses as $key => $row)
                                            <?php

                                        $time['start'][]='';
                                        $time['stop'][]='';
                                        $time['colspan'][]='';
                                        $time['t'][]='';
                                        $time['col'][]='';
                                        $time['color'][]='';
                                        $time['time'][]='';
                                        $time['subject'][]='';


                                            $cut_time_start = explode(":",$row->join_subject->time_start);
                                            $cut_time_stop = explode(":",$row->join_subject->time_stop);

                                                $data_array = array(
                                                  'time'=>$row->join_subject->time_start."-".$row->join_subject->time_stop,
                                                  'subject'=>  $row->join_subject->{'name_subject_'.Session::get('locale')},
                                                  't'=>$row->join_subject->day,
                                                  'colspan' => ($row->join_subject->time_start-$row->join_subject->time_stop)-1,
                                                  'col'=>$row->join_subject->time_start-1,
                                                  'color'=>'grey',
                                                  'start'=>$row->join_subject->time_start,
                                                  'stop'=>$row->join_subject->time_stop,
                                                  'teacher'=>$row->join_subject->join_teacher['name_teacher']." ".$row->join_subject->join_teacher['lastname_teacher'],
                                                );


                                        $sum_data = array();

                                        if($row->join_subject->code_subject){
                                            $count_ = count($row->join_subject->join_subjects_transection);
                                            for ($i=0 ;$i<$count_;$i++){
                                                $data_array_tran = array(
                                                    'time'=>$row->join_subject->join_subjects_transection[$i]['time_start']."-".$row->join_subject->join_subjects_transection[$i]['time_stop'],
                                                    'subject'=>  $row->join_subject->{'name_subject_'.Session::get('locale')},
                                                    't'=>$row->join_subject->join_subjects_transection[$i]['day'],
                                                    'colspan' => ($row->join_subject->join_subjects_transection[$i]['time_start']-$row->join_subject->join_subjects_transection[$i]['time_stop'])-1,
                                                    'col'=>($row->join_subject->join_subjects_transection[$i]['time_start']-1),
                                                    'color'=>'grey',
                                                    'start'=>$row->join_subject->join_subjects_transection[$i]['time_start'],
                                                    'stop'=>$row->join_subject->join_subjects_transection[$i]['time_stop'],
                                                    'teacher'=>$row->join_subject->join_teacher['name_teacher']." ".$row->join_subject->join_teacher['lastname_teacher'],
                                                );
                                            }
                                            $data_new_[]=$data_array_tran;

                                            array_push($sum_data,$data_new_);
                                        }

                                              $data_array_subject['time_start']=$time['start'];
                                              $data_array_subject['time_stop']=$time['stop'];
                                              $data_array_subject['t']=$time['t'];
                                              $data_array_subject['colspan']=$time['colspan'];
                                              $data_array_subject['col']=$time['col'];
                                              $data_array_subject['color']=$time['color'];
                                              $data_array_subject['time']=$time['time'];
                                              $data_array_subject['subject']=$time['subject'];

                                        $data_new[] = $data_array;

                                        array_push($sum_data,$data_new);


                                        ?>
                                        @endforeach
                                    {{--{!! print_r($sum_data) !!}--}}
                                    {{--{!! count($sum_data) !!}--}}
                                    <?php $count_data =  count($sum_data) ?>
                                    @foreach ($day as $di => $day_)
                                        <tr>
                                            <td>{!! $day_ !!}</td>
                                            <?php $t=3;?>

                                        @foreach($sum_data as $datai => $data_)

                                                {{--@foreach($timeArr as $i => $arr)--}}
                                            @for($i=0;$i<$count_data;$i++)
                                                    @if($data_[$i]['t']==$di)
                                                        @if($data_[$i]['start']>1)
                                                            <td colspan="{!! abs($data_[$i]['col']) !!}"></td>
                                                            <td colspan="{!! abs($data_[$i]['colspan']) !!}" style="background-color:{!! $data_[$i]['color'] !!};text-align: center;">{!! $data_[$i]['subject'] !!}<br>{!! $data_[$i]['teacher'] !!}</td>
                                                            @else
                                                            <td colspan="{!! abs($data_[$i]['colspan']) !!}" style="background-color:{!! $data_[$i]['color'] !!};text-align: center;">
                                                            {!! $data_[$i]['subject'] !!}<br>{!! $data_[$i]['teacher'] !!}
                                                        @endif
                                                    @endif
                                            @endfor
                                                {{--@endforeach--}}
                                         @endforeach
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    {{--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>--}}
    {{--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>--}}
    {{--<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>--}}
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>--}}
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>--}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        $(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.delete-courses').on('click',function(){
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
                            $.post("/student/delete_courses", {
                                id: id
                            }, function(e) {
                                swal("Poof! Your imaginary file has been deleted!", {
                                    icon: "success",
                                }).then(function(){
                                    window.location.href ='/student/class_schedule'
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