<div class="row">
    {{--<div class="table-responsive table-striped">--}}
    <table cellspacing="0" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>{!! trans('messages.number') !!}</th>
            <th>{!! trans('messages.subjects.subject_th') !!}</th>
            <th>{!! trans('messages.subjects.amount') !!}</th>
            <th>{!! trans('messages.subjects.time_start') !!}</th>
            <th>{!! trans('messages.subjects.time_stop') !!}</th>
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
                    <td> {!! $row->{'name_subject_'.Session::get('locale')} !!}</td>
                    <td>{!! $row->amount !!}</td>
                    <td>@if(!empty($row->time_start) or $row->time_start == 0){!! $time_start[$row->time_start] !!} @else - @endif</td>
                    <td>@if(!empty($row->time_stop) or $row->time_stop == 0){!! $time_stop[$row->time_stop] !!}@else - @endif</td>
                    <td>
                        <button class="btn btn-primary mt-2 mt-xl-0 text-right view-subject" data-id="{!! $row->id_subject !!}"><i class="mdi mdi-eye"></i></button>
                        <a href="{!! url('/teacher/edit_subject/'.$row->id_subject) !!}"><button class="btn btn-warning mt-2 mt-xl-0 text-right"><i class="mdi mdi-tooltip-edit"></i></button></a>
                        <button class="btn btn-danger mt-2 mt-xl-0 text-right delete-subject" data-id="{!! $row->id_subject !!}"><i class="mdi mdi-delete-sweep"></i></button>
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

