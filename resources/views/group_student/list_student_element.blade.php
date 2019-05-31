<div class="row">
    {{--<div class="table-responsive table-striped">--}}
        <table cellspacing="0" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>{!! trans('messages.number') !!}</th>
                <th>{!! trans('messages.photo') !!}</th>
                <th>{!! trans('messages.name-last') !!}</th>
                <th>{!! trans('messages.action') !!}</th>
            </tr>
            </thead>
            <tbody>
            @if(!empty($register_courses))
                @foreach($register_courses as $key => $row)
                    <tr>
                        <td>{!! $key+1 !!}</td>
                        <td><img src="{!! asset($row->join_student->photo) !!}" alt=""></td>
                        <td>{!! $row->join_student->name_student !!}  {!! $row->join_student->lastname_student !!}</td>
                        <td>
                                <button class="btn btn-primary mt-2 mt-xl-0 text-right add-group" data-id-subject="{!! $row->id_subject !!}" data-photo="{!! $row->join_student->photo !!}" data-name="{!! $row->join_student->name_student !!}  {!! $row->join_student->lastname_student !!}" data-id="{!! $row->join_student->id_student !!}"><i class="mdi mdi-account-multiple-plus"></i></button>
                            {{--<button class="btn btn-warning mt-2 mt-xl-0 text-right edit-student" data-id="{!! $row->id_student !!}"><i class="mdi mdi-tooltip-edit"></i></button>--}}
                            {{--<button class="btn btn-danger mt-2 mt-xl-0 text-right delete-student" data-id="{!! $row->id_student !!}"><i class="mdi mdi-delete-sweep"></i></button>--}}
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

