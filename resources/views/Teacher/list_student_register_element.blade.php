<div class="row">
    {{--<div class="table-responsive table-striped">--}}
    <table cellspacing="0" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>{!! trans('messages.number') !!}</th>
            <th>{!! trans('messages.student.list_student') !!}</th>
            <th>{!! trans('messages.subjects.subject_th') !!}</th>
            <th>{!! trans('messages.subjects.amount') !!}</th>
            <th>{!! trans('messages.subjects.time_start') !!}</th>
            <th>{!! trans('messages.subjects.time_stop') !!}</th>
            <th>{!! trans('messages.action') !!}</th>
        </tr>
        </thead>
        <tbody>
        @if(!empty($register_courses))
            @foreach($register_courses as $key => $row)
                <tr>
                    <td>{!! $key+1 !!}</td>
                    <td>{!! $row->join_student->name_student !!}  {!! $row->join_student->lastname_student !!}</td>
                    <td>{!! $row->join_subject->{'name_subject_'.Session::get('locale')} !!}</td>
                    <td>{!! $row->join_subject->amount !!}</td>
                    <td>{!! $row->join_subject->time_start !!}</td>
                    <td>{!! $row->join_subject->time_stop !!}</td>
                    <td>
                        <button class="btn btn-success mt-2 mt-xl-0 text-right approval-courses" @if($row->status == 1 )disabled @endif data-id="{!! $row->id_courses !!}"><i class="mdi mdi-spellcheck"></i></button>
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