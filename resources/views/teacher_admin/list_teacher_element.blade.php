<div class="row">
    <div class="table-responsive table-striped">
        <table class="table" width="100%">
            <tr>
                <th>ลำดับ</th>
                <th>รูป</th>
                <th>ชื่อ - สกุล</th>
                <th>เบอร์โทร</th>
                <th>Action</th>
            </tr>
            @if(!empty($teacher))
            @foreach($teacher as $key => $row)
                <tr>
                    <td>{!! $key+1 !!}</td>
                    <td><img src="{!! asset($row->photo) !!}" alt=""></td>
                    <td>{!! $row->name_teacher !!}  {!! $row->lastname_teacher !!}</td>
                    <td>{!! $row->tell !!}</td>
                    <td>
                        <button class="btn btn-primary mt-2 mt-xl-0 text-right view-teacher" data-id="{!! $row->id_teacher !!}"><i class="mdi mdi-eye"></i></button>
                        <button class="btn btn-warning mt-2 mt-xl-0 text-right edit-teacher" data-id="{!! $row->id_teacher !!}"><i class="mdi mdi-tooltip-edit"></i></button>
                        <button class="btn btn-danger mt-2 mt-xl-0 text-right delete-teacher" data-id="{!! $row->id_teacher !!}"><i class="mdi mdi-delete-sweep"></i></button>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td>ไม่พบข้อมูล</td>
                </tr>

            @endif
        </table>
    </div>
</div>

