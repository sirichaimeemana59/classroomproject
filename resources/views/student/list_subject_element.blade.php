<div class="row">
    {{--<div class="table-responsive table-striped">--}}
    <table cellspacing="0" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>{!! trans('messages.number') !!}</th>
            <th>{!! trans('messages.subjects.subject_th') !!}</th>
            <th>{!! trans('messages.day_study') !!}</th>
            <th>{!! trans('messages.subjects.time_start') !!}</th>
            <th>{!! trans('messages.subjects.time_stop') !!}</th>
            <th>{!! trans('messages.teacher.list_teacher') !!}</th>
            <th>{!! trans('messages.action') !!}</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $day = array(
                0 => trans('messages.day.Monday'),
                1 => trans('messages.day.Tuesday'),
                2 => trans('messages.day.Wednesday'),
                3 => trans('messages.day.Thursday'),
                4 => trans('messages.day.Friday'),
                5 => trans('messages.day.Saturday'),
                6 => trans('messages.day.Sunday')
            );

        $start = array(
            0 => '08:30',
            1 => '09:20',
            2 => '10:15',
            3 => '11:05',
            4 => '11:55',
            5 => '12:45',
            6 => '13:35',
            7 => '14:30',
            8 => '15:20',
            9 => '16:10',
            10 => '17:00',
            11 => '18:10'
        );

        $stop = array(
            0 => "09:20",
            1 => "10:10",
            2 => "11:05",
            3 => "11:55",
            4 => "12:45",
            5 => "13:35",
            6 => "14:30",
            7 => "15:20",
            8 => "16:10",
            9 => "17:00",
            10 => "17:50",
            11 => "19:50"
        );
        ?>
        @if(!empty($subject))
            @foreach($subject as $key => $row)
                <tr>
                    <td>{!! $key+1 !!}</td>
                    <td> {!! $row->{'name_subject_'.Session::get('locale')} !!}</td>
                    <td>{!! $day[$row->day] !!}</td>
                    <td>{!! $start[$row->time_start] !!}</td>
                    <td>{!! $stop[$row->time_stop]!!}</td>
                    <td>{!! $row->join_teacher->name_teacher !!}   {!! $row->join_teacher->lastname_teacher !!}</td>
                    <td>
                        <button class="btn btn-primary mt-2 mt-xl-0 text-right register-courses" data-day="{!! $row->day !!}" data-id_teacher="{!! $row->join_teacher->id_teacher !!}" data-name_teacher="{!! $row->join_teacher->name_teacher !!}{!! $row->join_teacher->lastname_teacher !!}" data-stop_="{!! $row->time_stop !!}" data-start_="{!! $row->time_start !!}" data-stop="{!! $start[$row->time_stop] !!}" data-start="{!! $stop[$row->time_start] !!}"  data-id="{!! $row->id_subject !!}" data-code="{!! $row->code_subject !!}" data-name="{!! $row->{'name_subject_'.Session::get('locale')}  !!}" ><i class="mdi mdi-spellcheck"></i></button>
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
    {{--</div>--}}
</div>

