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
            <th>{!! trans('messages.teacher.list_teacher') !!}</th>
            <th>{!! trans('messages.action') !!}</th>
        </tr>
        </thead>
        <tbody>
        @if(!empty($subject))
            @foreach($subject as $key => $row)
                <tr>
                    <td>{!! $key+1 !!}</td>
                    <td> {!! $row->{'name_subject_'.Session::get('locale')} !!}</td>
                    <td>{!! $row->amount !!}</td>
                    <td>{!! $row->time_start !!}</td>
                    <td>{!! $row->time_stop !!}</td>
                    <td>{!! $row->join_teacher->name_teacher !!}   {!! $row->join_teacher->lastname_teacher !!}</td>
                    <td>
                        <button class="btn btn-primary mt-2 mt-xl-0 text-right register-courses"data-id_teacher="{!! $row->join_teacher->id_teacher !!}" data-name_teacher="{!! $row->join_teacher->name_teacher !!}{!! $row->join_teacher->lastname_teacher !!}" data-stop="{!! $row->time_stop !!}" data-start="{!! $row->time_start !!}"  data-id="{!! $row->id_subject !!}" data-name="{!! $row->{'name_subject_'.Session::get('locale')}  !!}" ><i class="mdi mdi-spellcheck"></i></button>
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

