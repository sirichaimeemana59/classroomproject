@extends('layout.layout')
@section('content')
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="panel-heading">
                        <h3 class="panel-title">{!! trans('messages.examination.list_exam') !!}</h3>
                    </div>
                    <div class="panel panel-default" id="panel-lead-list">
                        <div class="panel-body" id="landing-subject-list">

                            @if(!empty($examination->photo))
                                <div class="form-group row" align="center">
                                    <div class="col-sm-4" style="margin: auto auto;">
                                        <p style="text-align: center;"><img src="{!! asset($examination->photo) !!}" class="img-rounded" alt="Cinque Terre Responsive image" width="125%" height="125%"></p>
                                    </div>
                                </div>
                            @endif
                            {!! Form::model($examination,array('url' => array('teacher/edit_exam/form'),'class'=>'form-horizontal','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
                                <input type="hidden" name="id_" value="{!! $examination->id !!}">
                                <input type="hidden" name="id_subject" value="{!! $examination->id_subject !!}">
                                <input type="hidden" name="code_" value="{!! $examination->code !!}">
                                <div class="form-group row">
                                    <lable class="col-sm-2 control-label">{!! trans('messages.examination.proposition_th') !!}</lable>
                                    <div class="col-sm-10">
                                        <textarea name="proposition_th" class="form-editor form-control">{!! $examination['proposition_th'] !!}</textarea>
                                        {{--{!! Form::text('proposition_th',null,array('class'=>'form-control form-editor','placeholder'=>trans('messages.examination.proposition_th'),'required')) !!}--}}
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <lable class="col-sm-2 control-label">{!! trans('messages.examination.proposition_en') !!}</lable>
                                    <div class="col-sm-10">
                                        <textarea name="proposition_en" class="form-editor form-control">{!! $examination['proposition_en'] !!}</textarea>
                                        {{--{!! Form::text('proposition_en',null,array('class'=>'form-control form-editor','placeholder'=>trans('messages.examination.proposition_en'),'required')) !!}--}}
                                    </div>
                                </div>


                                {{--<div class="form-group row">--}}
                                    {{--<lable class="col-sm-2 control-label">{!! trans('messages.teacher.photo') !!}</lable>--}}
                                    {{--<div class="col-sm-4">--}}
                                        {{--{!! Form::file('photo',null,array('class'=>'form-control')) !!}--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                @if(!empty($examination_transection))
                            <div class="form-group row">

                                <lable class="col-sm-2 control-label">{!! trans('messages.examination.choice') !!}</lable>
                                <div class="col-sm-10">

                                    <div class="table">
                                        <table class="table-responsive itemTables">
                                            <tr>
                                                <th>{!! trans('messages.examination.choice_th') !!}</th>
                                                <th>{!! trans('messages.examination.choice_en') !!}</th>
                                                <th>{!! trans('messages.examination.answer') !!}</th>
                                                <th>{!! trans('messages.action') !!}</th>
                                            </tr>
                                                @foreach($examination_transection as $key => $row)
                                                    <tr>
                                                        <input type="hidden" name="data_[{!! $key !!}][id]" value="{!! $row->id !!}">
                                                        <input type="hidden" name="data_[{!! $key !!}][code]" value="{!! $row->code !!}">
                                                        <td><input type="text" name="data_[{!! $key !!}][choice_th]" required class="form-control" value="{!! $row->choice_th !!}"></td>
                                                        <td><input type="text" name="data_[{!! $key !!}][choice_en]" required class="form-control" value="{!! $row->choice_en !!}"></td>
                                                        <td><input type="checkbox" name="data_[{!! $key !!}][status]" class="form-control" value="t" @if($row->status == 't') checked @endif></td>
                                                        <td><a class="btn btn-danger delete-choice" data-id="{!! $row->id !!}" data-exm="{!! $examination->id !!}"><i class="mdi mdi-delete-sweep"></i></a></td>
                                                    </tr>
                                                @endforeach
                                        </table>
                                        <div class="col-sm-4">
                                            <a class="btn btn-primary mt-2 mt-xl-0 text-right add-choice" ><i class="mdi mdi-spellcheck"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row float-center" style="text-align: center; ">
                                <div class="col-sm-12">
                                    <button class="btn-info btn-primary" type="submit">Save</button>
                                    <button class="btn-info btn-warning" type="reset">Reset</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
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