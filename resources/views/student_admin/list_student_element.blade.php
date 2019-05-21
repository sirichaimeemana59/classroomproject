<div class="row">
    {{--<div class="table-responsive table-striped">--}}
        <table cellspacing="0" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>{!! trans('messages.number') !!}</th>
                <th>{!! trans('messages.photo') !!}</th>
                <th>{!! trans('messages.name-last') !!}</th>
                <th>{!! trans('messages.tell') !!}</th>
                <th>{!! trans('messages.action') !!}</th>
            </tr>
            </thead>
            <tbody>
            @if(!empty($student))
                @foreach($student as $key => $row)
                    <tr>
                        <td>{!! $key+1 !!}</td>
                        <td><img src="{!! asset($row->photo) !!}" alt=""></td>
                        <td>{!! $row->name_student !!}  {!! $row->lastname_student !!}</td>
                        <td>{!! $row->tell !!}</td>
                        <td>
                            <button class="btn btn-primary mt-2 mt-xl-0 text-right view-student" data-id="{!! $row->id_student !!}"><i class="mdi mdi-eye"></i></button>
                            <button class="btn btn-warning mt-2 mt-xl-0 text-right edit-student" data-id="{!! $row->id_student !!}"><i class="mdi mdi-tooltip-edit"></i></button>
                            <button class="btn btn-danger mt-2 mt-xl-0 text-right delete-student" data-id="{!! $row->id_student !!}"><i class="mdi mdi-delete-sweep"></i></button>
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

