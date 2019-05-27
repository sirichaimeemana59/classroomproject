@extends('layout.layout')
@section('content')
    {{--{!! Session::get('locale') !!}--}}
    {{-- //search --}}
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="panel-heading">
                        <h3 class="panel-title">{!! trans('messages.examination.list_exam') !!}</h3>
                    </div>
                    <div class="panel-body search-form">
                        <form method="POST" id="search-form" action="#" accept-charset="UTF-8" class="form-horizontal">
                            <div class="row">
                                <div class="col-sm-3 block-input">
                                    <input class="form-control" size="25" placeholder="{!! trans('messages.examination.proposition') !!}" name="name">
                                </div>

                                {{--<div class="col-sm-3 block-input">--}}
                                {{--<input class="form-control" size="25" placeholder="{!! trans('messages.id') !!}" name="id">--}}
                                {{--</div>--}}
                            </div>

                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <button type="reset" class="btn btn-white reset-s-btn">{!! trans('messages.reset') !!}</button>
                                    <button type="button" class="btn btn-secondary search-subject">{!! trans('messages.search') !!}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- //search --}}
    <br>
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="panel-heading">
                        <h3 class="panel-title">{!! trans('messages.examination.list_exam') !!}</h3>
                    </div>
                    <div class="panel panel-default" id="panel-lead-list">
                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <button class="btn btn-primary mt-2 mt-xl-0 text-right add-exam"><i class="mdi mdi-bookmark-check"></i>  {!! trans('messages.examination.list_exam') !!}</button>
                            </div>
                        </div>
                        <br>
                        <div class="panel-body" id="landing-subject-list">
                            @include('examination.list_examination_element')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal add subject-->
    <div class="modal fade" id="add-exam-form" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #9BA2AB;">
                    <h4 class="modal-title" style="color: #bbbfc3;">{!! trans('messages.examination.title') !!}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form">
                                {!! Form::model(null,array('url' => array('teacher/insert_examination'),'class'=>'form-horizontal','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
                                <div class="form-group row">
                                    <lable class="col-sm-2 control-label">{!! trans('messages.examination.proposition_th') !!}</lable>
                                    <div class="col-sm-4">
                                        {!! Form::text('proposition_th',null,array('class'=>'form-control','placeholder'=>trans('messages.examination.proposition_th'),'required')) !!}
                                    </div>

                                    <lable class="col-sm-2 control-label">{!! trans('messages.examination.proposition_en') !!}</lable>
                                    <div class="col-sm-4">
                                        {!! Form::text('proposition_en',null,array('class'=>'form-control','placeholder'=>trans('messages.examination.proposition_en'),'required')) !!}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <lable class="col-sm-2 control-label">{!! trans('messages.teacher.photo') !!}</lable>
                                    <div class="col-sm-4">
                                        {!! Form::file('photo',null,array('class'=>'form-control')) !!}
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <lable class="col-sm-2 control-label">{!! trans('messages.examination.choice') !!}</lable>
                                    <div class="col-sm-4">
                                        <a class="btn btn-primary mt-2 mt-xl-0 text-right add-choice" ><i class="mdi mdi-spellcheck"></i></a>
                                    </div>
                                </div>

                                <div class="form-group row add-choice-more">
                                    <lable class="col-sm-2 control-label"></lable>
                                    <div class="col-sm-10">
                                        <table class="table table-responsive itemTables" style="width: 100%">
                                            <tr>
                                                <th ></th>
                                                <th>{!! trans('messages.examination.choice_th') !!}</th>
                                                <th>{!! trans('messages.examination.choice_en') !!}</th>
                                                <th>{!! trans('messages.examination.answer') !!}</th>
                                                <th>{!! trans('messages.action') !!}</th>
                                            </tr>
                                        </table>
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <!-- End Modal add subject-->

    <!-- Modal view subject-->
    <div class="modal fade" id="view-exam" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #9BA2AB;">
                    <h4 class="modal-title" style="color: #bbbfc3;">{!! trans('messages.examination.title') !!}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div id="lead-content" class="form">

                            </div>
                        </div>
                    </div>
                    <span class="v-loading">กำลังค้นหาข้อมูล...</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <!-- End Modal view teacher-->

    <!-- Modal edit subject-->
    <div class="modal fade" id="edit-subject" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #9BA2AB;">
                    <h4 class="modal-title" style="color: #bbbfc3;">{!! trans('messages.subjects.list_subjects') !!}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div id="lead-content1" class="form">

                            </div>
                        </div>
                    </div>
                    <span class="v-loading1">กำลังค้นหาข้อมูล...</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <!-- End Modal edit teacher-->

@endsection

@section('script')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        $(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.add-exam').on('click',function(){
                //alert('aa');
                $('#add-exam-form').modal('show');
            });

            $('.view-exam').on('click',function(){
                var id = $(this).data('id');
                //console.log(id);
                $('#view-exam').modal('show');
                $('#lead-subject').empty();
                $('.v-loading').show();
                $.ajax({
                    url : '/teacher/view_exam',
                    method : 'post',
                    dataType : 'html',
                    data : ({'id':id}),
                    success : function(e){
                        $('#lead-content').html(e);
                        $('.v-loading').hide();
                    } ,error : function(){
                        console.log('Error View Data Examination');
                    }
                });
            });

            $('.edit-subject').on('click',function(){
                var id = $(this).data('id');
                //console.log(id);
                $('#edit-subject').modal('show');
                $('#lead-content1').empty();
                $('.v-loading1').show();
                $.ajax({
                    url : '/teacher/edit_subject',
                    method : 'post',
                    dataType : 'html',
                    data : ({'id':id}),
                    success : function(e){
                        $('#lead-content1').html(e);
                        $('.v-loading1').hide();
                    } ,error : function(){
                        console.log('Error View Data subject');
                    }
                });
            });

            $('.delete-subject').on('click',function(){
                var id = $(this).data('id');
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete)=> {
                    if (willDelete) {
                        setTimeout(function() {
                            $.post("/teacher/delete_subject", {
                                id: id
                            }, function(e) {
                                swal("Poof! Your imaginary file has been deleted!", {
                                    icon: "success",
                                }).then(function(){
                                    window.location.href ='/teacher/list_subject'
                                });
                            });
                        }, 50);
                    } else {
                        swal("Your imaginary file is safe!");
                    }
                });
            });

            $('.reset-s-btn').on('click',function () {
                $(this).closest('form').find("input").val("");
                $(this).closest('form').find("select option:selected").removeAttr('selected');
                //propertyPageSale (1);
                window.location.href ='/teacher/list_subject';
            });

            $('.search-subject').on('click',function(){
                var data  = $('#search-form').serialize();
                //alert('aa');
                //console.log(data);
                $('#landing-subject-list').css('opacity','0.6');
                $.ajax({
                    url : '/teacher/list_subject',
                    method : 'post',
                    dataType : 'html',
                    data : data,
                    success : function(e){
                        $('#landing-subject-list').css('opacity','1').html(e);
                    } ,error : function(){
                        console.log('Error Search Data subject');
                    }
                });
            });

            $('.add-choice-more').hide();
            $('.add-choice').on('click',function(){
                //alert('ss');
                $('.add-choice-more').show();

                var time = $.now();

                var data = ['<tr class="itemRow">',
                    '<td></td>',
                    '<td><input type="text" name="data['+time+'][choice_th]" required class="form-control"></td>',
                    '<td><input type="text" name="data['+time+'][choice_en]" required class="form-control"></td>',
                    '<td><input type="checkbox" name="data['+time+'][status]" class="form-control" value="t"></td>',
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

            $('.delete-examination').on('click',function(){
                var id = $(this).data('id');
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
                                    window.location.href ='/teacher/examination'
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