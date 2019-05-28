@extends('layout.layout')
@section('content')

    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="panel-heading">
                        <h3 class="panel-title">{!! trans('messages.examination.list_exam') !!} : {!! trans('messages.subjects.list_subjects') !!} : {!! $examination_->join_subject{'name_subject_'.Session::get('locale')} !!}</h3>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 text-right">
                            <a href="{!! url('/teacher/add_eam_form_new/'.$examination_->join_subject->id_subject) !!}"><button class="btn btn-primary mt-2 mt-xl-0 text-right"><i class="mdi mdi-bookmark-check"></i>  {!! trans('messages.examination.add_answer') !!}</button></a>
                        </div>
                    </div>
                    <br>

                    <div class="panel panel-default" id="panel-lead-list">
                        <div class="panel-body" id="landing-subject-list">
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
                                    <?php $i = 1;?>
                                    @foreach($examination as $key => $row)
                                        <tr>
                                            <td>{!! $key+1 !!}</td>
                                            <td>{!! $row{'title_base_'.Session::get('locale')} !!}</td>
                                            {{--<td></td>--}}
                                            {{--<td></td>--}}
                                            {{--<td></td>--}}
                                            <td>
                                                {{--<a href="{!! url('/teacher/edit_exam/'.$row['id']) !!}"><button class="btn btn-primary mt-2 mt-xl-0 text-right"><i class="mdi mdi-eye"></i></button></a>--}}
                                                <a href="{!! url('/teacher/edit_exam/'.$row['id']) !!}"><button class="btn btn-warning mt-2 mt-xl-0 text-right"><i class="mdi mdi-tooltip-edit"></i></button></a>
                                                <button class="btn btn-danger mt-2 mt-xl-0 text-right delete-examination" data-id="{!! $row['id'] !!}" data-id-subject="{!! $row['id_subject'] !!}"><i class="mdi mdi-delete-sweep"></i></button>
                                            </td>
                                        </tr>
                                        <?php $i++;?>
                                    @endforeach
                                @else
                                    <tr>
                                        <td>{!! trans('messages.no-data') !!}</td>
                                    </tr>

                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js"></script>
    <!-- include libraries(jQuery, bootstrap) -->
    {{--<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">--}}
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>

    <!-- include summernote css/js -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        $(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).ready(function() {
                $('.form-editor').summernote({
                    height:300,
                });
            });

            $('.delete-examination').on('click',function(){
                var id = $(this).data('id');
                var id_subject = $(this).data('id-subject');
                //console.log(id);
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete)=> {
                    if (willDelete) {
                        setTimeout(function() {
                            $.post("/teacher/delete-examination", {
                                id: id
                            }, function(e) {
                                swal("Poof! Your imaginary file has been deleted!", {
                                    icon: "success",
                                }).then(function(){
                                    window.location.href ='/teacher/add_eam_form/'+id_subject
                                });
                            });
                        }, 50);
                    } else {
                        swal("Your imaginary file is safe!");
                    }
                });
            });

        });
    </script>
@endsection