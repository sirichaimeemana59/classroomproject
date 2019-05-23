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
        <lable class="col-sm-2 control-label">{!! trans('messages.subjects.subject_th') !!}   </lable>
        <div class="col-sm-4">
            :     {!! $subject->{'name_subject_'.Session::get('locale')} !!}
        </div>

        <lable class="col-sm-2 control-label">{!! trans('messages.teacher.list_teacher') !!}</lable>
        <div class="col-sm-4">
            :     {!! $subject->join_teacher->name_teacher !!}  {!! $subject->join_teacher->lastname_teacher !!}
        </div>
    </div>

    <div class="form-group row">
        <lable class="col-sm-2 control-label">{!! trans('messages.subjects.amount') !!}   </lable>
        <div class="col-sm-4">
            :     {!! $subject->amount !!} {!! trans('messages.person') !!}
        </div>
    </div>


            <div class="form-group row">
                <lable class="col-sm-2 control-label">{!! trans('messages.day_study') !!}   </lable>
                <div class="col-sm-10">
                    {!! $day[$subject->day] !!}
                </div>

                <lable class="col-sm-2 control-label">{!! trans('messages.time_class') !!}   </lable>
                <div class="col-sm-10">
                    <lable class="col-sm-2 control-label">{!! trans('messages.Class_Start') !!}   </lable> : {!! $time_start[$subject->time_start] !!}
                    <lable class="col-sm-2 control-label">{!! trans('messages.Class_Finish') !!}   </lable> : {!! $time_stop[$subject->time_stop] !!}
                </div>
             @if(count($subject->join_subjects_transection) != 0)
                @foreach($subject->join_subjects_transection as $key => $row)
                        <lable class="col-sm-2 control-label">{!! trans('messages.day_study') !!}   </lable>
                            <div class="col-sm-10">
                                {!! $day[$row->day] !!}
                            </div>

                    <lable class="col-sm-2 control-label">{!! trans('messages.time_class') !!}   </lable>
                        <div class="col-sm-10">
                            <lable class="col-sm-2 control-label">{!! trans('messages.Class_Start') !!}   </lable> : {!! $time_start[$row->time_start] !!}
                            <lable class="col-sm-2 control-label">{!! trans('messages.Class_Finish') !!}   </lable> : {!! $time_stop[$row->time_stop] !!}
                        </div>
                @endforeach
            @endif
            </div>
