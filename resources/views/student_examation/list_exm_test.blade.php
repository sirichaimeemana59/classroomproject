@extends('layout.layout')
@section('content')
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="panel-heading">
                        <h3 class="panel-title">{!! trans('messages.examination.list_exam') !!}</h3>
                    </div>
                    <div class="panel-heading">
                        <h3 class="panel-title">{!! trans('messages.examination.list_exam') !!} : {!! trans('messages.subjects.list_subjects') !!} : {!! $examination_->join_subject{'name_subject_'.Session::get('locale')} !!}</h3>
                    </div>
                    <br><br><br>
                    <div class="panel panel-default" id="panel-lead-list">
                        <div class="panel-body" id="landing-subject-list">


                            {!! Form::model($examination,array('url' => array('student/send/ans'),'class'=>'form-horizontal','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}


                            @foreach($examination as $key => $row)
                                <div class="form-group row">
                                    <lable class="col-sm-2 control-label">{!! trans('messages.examination.proposition') !!} : {!! $key+1 !!}</lable>
                                    <div class="col-sm-10">
                                        <h3 class="panel-title">{!! $row->{'proposition_'.Session::get('locale')} !!}</h3>
                                    </div>
                                </div>

                                @foreach($row->join_examination_transection as $key_ => $row_)
                                    <div class="form-group row">
                                        <lable class="col-sm-2 control-label">{!! trans('messages.examination.choice') !!} : {!! $key_+1 !!}</lable>
                                        <div class="col-sm-4">
                                            <h3 class="panel-title">{!! $row_->{'choice_'.Session::get('locale')} !!}</h3>
                                        </div>

                                        <lable class="col-sm-2 control-label"></lable>
                                        <div class="col-sm-4">
                                            <span><input type="checkbox" name="data[{!! $key !!}][ans]" value="{!! $row_->id !!}"></span>
                                            <input type="hidden" name="data[{!! $key !!}][id_ans]" value="{!! $row_->id !!}">
                                            <input type="hidden" name="data[{!! $key !!}][id_exm]" value="{!! $row->id !!}">
                                            <input type="hidden" name="data[{!! $key !!}][code]" value="{!! $row->code !!}">
                                            <input type="hidden" name="data[{!! $key !!}][id_subject]" value="{!! $row->id_subject !!}">
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach

                            {{--@foreach($examination_transection as $key_ => $row_)--}}
                                {{--<div class="form-group row">--}}
                                    {{--<lable class="col-sm-2 control-label">{!! trans('messages.examination.proposition') !!} : {!! $key_+1 !!}</lable>--}}
                                    {{--<div class="col-sm-10">--}}
                                        {{--<h3 class="panel-title">{!! $row_->{'choice_'.Session::get('locale')} !!}</h3>--}}
                                    {{--</div>join_examination_transection--}}
                                {{--</div>--}}
                            {{--@endforeach--}}
                            <br>
                                <div class="form-group row float-center" style="text-align: center; ">
                                    <div class="col-sm-12">
                                        <button class="btn-info btn-primary" type="submit">{!! trans('messages.examination.send') !!}</button>
                                        <button class="btn-info btn-warning" type="reset">Reset</button>
                                    </div>
                                </div>
                                {!! Form::close() !!}
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

            $('.delete-choice').on('click',function(){
                //alert('aa');
                var id = $(this).data('id');
                var exm = $(this).data('exm');
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete)=> {
                    if (willDelete) {
                        setTimeout(function() {
                            $.post("/teacher/delete/choice", {
                                id: id
                            }, function(e) {
                                swal("Poof! Your imaginary file has been deleted!", {
                                    icon: "success",
                                }).then(function(){
                                    window.location.href ='/teacher/edit_exam/'+exm
                                });
                            });
                        }, 50);
                    } else {
                        swal("Your imaginary file is safe!");
                    }
                });
            });

            $('.add-choice').on('click',function(){

                var time = $.now();

                var data = ['<tr class="itemRow">',
                    '<td><input type="text" name="data1['+time+'][choice_th]" required class="form-control"></td>',
                    '<td><input type="text" name="data1['+time+'][choice_en]" required class="form-control"></td>',
                    '<td><input type="checkbox" name="data1['+time+'][status]" class="form-control" value="t"></td>',
                    '<td><a class="btn btn-danger delete-subject"><i class="mdi mdi-delete-sweep"></i></a></td>',
                ].join('');


                //console.log(data);
                $('.itemTables').append(data);
                $('.save-regis').show();

            });

            $('.itemTables').on("click", '.delete-subject', function() {
                //alert('aaa');
                $(this).closest('tr.itemRow').remove();
                //return false;
            });

            $(document).ready(function() {
                $('.form-editor').summernote({
                    height:300,
                });
            });

        });
    </script>
@endsection