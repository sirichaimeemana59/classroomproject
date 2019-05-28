<div class="row">
    {{--<div class="table-responsive table-striped">--}}
    <table cellspacing="0" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>{!! trans('messages.number') !!}</th>
            <th>{!! trans('messages.subjects.subject_th') !!}</th>
            <th>{!! trans('messages.action') !!}</th>
        </tr>
        </thead>
        <tbody>
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

        ?>
        @if(!empty($subject))
            @foreach($subject as $key => $row)
                <tr>
                    <td>{!! $key+1 !!}</td>
                    <td> {!! $row->join_subject->{'name_subject_'.Session::get('locale')} !!}</td>
                    <td>
                        @if(empty($row->join_examination))
                            <button class="btn btn-warning mt-2 mt-xl-0 text-right" @if(empty($row->join_examination)) disabled @endif><i class="mdi mdi-eye"></i></button>
                        @else
                            <a href="{!! url('/student/student_start_test/'.$row->join_subject->id_subject) !!}" ><button class="btn btn-warning mt-2 mt-xl-0 text-right"><i class="mdi mdi-eye"></i></button></a>
                        @endif
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

