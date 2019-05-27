<div class="row">
    {{--<div class="table-responsive table-striped">--}}
    <table cellspacing="0" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>{!! trans('messages.number') !!}</th>
            <th>{!! trans('messages.examination.proposition') !!}</th>
            {{--<th>{!! trans('messages.subjects.amount') !!}</th>--}}
            {{--<th>{!! trans('messages.subjects.time_start') !!}</th>--}}
            {{--<th>{!! trans('messages.subjects.time_stop') !!}</th>--}}
            <th>{!! trans('messages.action') !!}</th>
        </tr>
        </thead>
        <tbody>
        @if(!empty($examination))
            @foreach($examination as $key => $row)
                <tr>
                    <td>{!! $key+1 !!}</td>
                    <td>{!! $row->{'proposition_'.Session::get('locale')} !!}</td>
                    {{--<td></td>--}}
                    {{--<td></td>--}}
                    {{--<td></td>--}}
                    <td>
                        <button class="btn btn-primary mt-2 mt-xl-0 text-right view-exam" data-id="{!! $row->id !!}"><i class="mdi mdi-eye"></i></button>
                        <a href="{!! url('/teacher/edit_exam/'.$row->id) !!}"><button class="btn btn-warning mt-2 mt-xl-0 text-right"><i class="mdi mdi-tooltip-edit"></i></button></a>
                        <button class="btn btn-danger mt-2 mt-xl-0 text-right delete-examination" data-id="{!! $row->id !!}"><i class="mdi mdi-delete-sweep"></i></button>
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

