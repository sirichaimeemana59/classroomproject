@extends('layout.layout')
@section('content')
    {{-- //search --}}
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
            <div class="card-body">
                <div class="panel-heading">
                    <h3 class="panel-title">{!! trans('messages.search') !!}</h3>
                </div>
                <div class="panel-body search-form">
                    <form method="POST" id="search-form" action="#" accept-charset="UTF-8" class="form-horizontal">
                        <div class="row">
                            <div class="col-sm-3 block-input">
                                <input class="form-control" size="25" placeholder="{!! trans('messages.name') !!}" name="name">
                            </div>

                            <div class="col-sm-3 block-input">
                                <input class="form-control" size="25" placeholder="{!! trans('messages.id') !!}" name="id">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 text-right">
                                    <button type="reset" class="btn btn-white reset-s-btn1">{!! trans('messages.reset') !!}</button>
                                    <button type="button" class="btn btn-secondary p-search-property-sale">{!! trans('messages.search') !!}</button>
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
                        <h3 class="panel-title">{!! trans('messages.teacher.list_teacher') !!}</h3>
                    </div>
                    <div class="panel-body search-form">
                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <button class="btn btn-primary mt-2 mt-xl-0 text-right add-teacher"><i class="mdi mdi-account-multiple-plus"></i>  {!! trans('messages.teacher.list_teacher') !!}</button>
                            </div>
                        </div>
                        <br>
                        @include('teacher_admin.list_teacher_element')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal add teacher-->
    <div class="modal fade" id="add-teacher-form" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #9BA2AB;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color: #bbbfc3;">{!! trans('messages.teacher.list_teacher') !!}</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form">
                                {!! Form::model(null,array('url' => array('admin/insert_teacher'),'class'=>'form-horizontal','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
                                <div class="form-group row">
                                    <lable class="col-sm-2 control-label">{!! trans('messages.teacher.name') !!}</lable>
                                    <div class="col-sm-4">
                                        {!! Form::text('name_teacher',null,array('class'=>'form-control','placeholder'=>trans('messages.teacher.name'),'required')) !!}
                                    </div>

                                    <lable class="col-sm-2 control-label">{!! trans('messages.teacher.last_name') !!}</lable>
                                    <div class="col-sm-4">
                                        {!! Form::text('lastname_teacher',null,array('class'=>'form-control','placeholder'=>trans('messages.teacher.last_name'),'required')) !!}
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <lable class="col-sm-2 control-label">{!! trans('messages.teacher.address') !!}</lable>
                                    <div class="col-sm-10">
                                        {{--<textarea name="detail" class="form-control" id="" cols="60" rows="10" style="margin: 0px -295.672px 0px 0px; width: 466px; height: 211px;"></textarea>--}}
                                        {!! Form::textarea('address',null,['class'=>'form-control', 'rows' => 10, 'cols' => 70]) !!}
                                    </div>
                                </div>

                                <div class="form-group row">

                                    <lable class="col-sm-2 control-label">{!! trans('messages.teacher.birthdate') !!}</lable>
                                    <div class="col-sm-4">
                                        {!! Form::date('brithdate',null,array('class'=>'form-control','placeholder'=>trans('messages.teacher.birthdate'),'required')) !!}
                                    </div>

                                    <lable class="col-sm-2 control-label">{!! trans('messages.teacher.tell') !!}</lable>
                                    <div class="col-sm-4">
                                        {!! Form::text('tell',null,array('class'=>'form-control','placeholder'=>trans('messages.teacher.tell'),'required')) !!}
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <lable class="col-sm-2 control-label">{!! trans('messages.teacher.photo') !!}</lable>
                                    <div class="col-sm-4">
                                        {!! Form::file('photo',null,array('class'=>'form-control')) !!}
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
    <!-- End Modal add teacher-->

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Modal view teacher-->
    <div class="modal fade" id="view-teacher" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #9BA2AB;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color: #bbbfc3;">Edit Product</h4>
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

    <!-- Modal edit teacher-->
    <div class="modal fade" id="edit-teacher" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #9BA2AB;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color: #bbbfc3;">Edit Product</h4>
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
    {{--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>--}}
    {{--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>--}}
    {{--<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>--}}
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>--}}
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>--}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        $(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.add-teacher').on('click',function(){
                //alert('aa');
                $('#add-teacher-form').modal('show');
            });

            $('.view-teacher').on('click',function(){
               var id = $(this).data('id');
               //console.log(id);
                $('#view-teacher').modal('show');
                $('#lead-content').empty();
                $('.v-loading').show();
                $.ajax({
                   url : '/admin/view_teacher',
                   method : 'post',
                   dataType : 'html',
                   data : ({'id':id}),
                   success : function(e){
                       $('#lead-content').html(e);
                       $('.v-loading').hide();
                   } ,error : function(){
                       console.log('Error View Data Teacher');
                    }
                });
            });

            $('.edit-teacher').on('click',function(){
                var id = $(this).data('id');
                //console.log(id);
                $('#edit-teacher').modal('show');
                $('#lead-content1').empty();
                $('.v-loading1').show();
                $.ajax({
                    url : '/admin/edit_teacher',
                    method : 'post',
                    dataType : 'html',
                    data : ({'id':id}),
                    success : function(e){
                        $('#lead-content1').html(e);
                        $('.v-loading1').hide();
                    } ,error : function(){
                        console.log('Error View Data Teacher');
                    }
                });
            });

            $('.delete-teacher').on('click',function(){
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
                            $.post("/product/delete_product", {
                                id: id
                            }, function(e) {
                                swal("Poof! Your imaginary file has been deleted!", {
                                    icon: "success",
                                }).then(function(){
                                    window.location.href ='/admin/teacher'
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