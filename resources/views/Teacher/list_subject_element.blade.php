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
        @if(!empty($subject))
            @foreach($subject as $key => $row)
                <tr>
                    <td>{!! $key+1 !!}</td>
                    <td> {!! $row->{'name_subject_'.Session::get('locale')} !!}</td>
                    <td>{!! $row->amount !!}</td>
                    <td>{!! $row->time_start !!}</td>
                    <td>{!! $row->time_stop !!}</td>
                    <td>
                        <button class="btn btn-primary mt-2 mt-xl-0 text-right view-subject" data-id="{!! $row->id_subject !!}"><i class="mdi mdi-eye"></i></button>
                        <button class="btn btn-warning mt-2 mt-xl-0 text-right edit-subject" data-id="{!! $row->id_subject !!}"><i class="mdi mdi-tooltip-edit"></i></button>
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

