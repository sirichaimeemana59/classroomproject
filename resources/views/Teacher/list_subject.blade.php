@extends('layout.layout')
@section('content')
    {{--{!! Session::get('locale') !!}--}}
    {{-- //search --}}
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="panel-heading">
                        <h3 class="panel-title">{!! trans('messages.subjects.list_subjects') !!}</h3>
                    </div>
                    <div class="panel-body search-form">
                        <form method="POST" id="search-form" action="#" accept-charset="UTF-8" class="form-horizontal">
                            <div class="row">
                                <div class="col-sm-3 block-input">
                                    <input class="form-control" size="25" placeholder="{!! trans('messages.subjects.subject_th') !!}" name="name">
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
                        <h3 class="panel-title">{!! trans('messages.subjects.list_subjects') !!}</h3>
                    </div>
                    <div class="panel panel-default" id="panel-lead-list">
                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <button class="btn btn-primary mt-2 mt-xl-0 text-right add-subject"><i class="mdi mdi-account-multiple-plus"></i>  {!! trans('messages.subjects.list_subjects') !!}</button>
                            </div>
                        </div>
                        <br>
                        <div class="panel-body" id="landing-subject-list">
                            @include('Teacher.list_subject_element')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal add subject-->
    <div class="modal fade" id="add-subject-form" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #9BA2AB;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color: #bbbfc3;">{!! trans('messages.subjects.list_subjects') !!}</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form">
                                {!! Form::model(null,array('url' => array('teacher/insert_subject'),'class'=>'form-horizontal','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
                                <div class="form-group row">
                                    <lable class="col-sm-2 control-label">{!! trans('messages.subjects.subject_th') !!}</lable>
                                    <div class="col-sm-4">
                                        {!! Form::text('name_subject_th',null,array('class'=>'form-control','placeholder'=>trans('messages.subjects.subject_th'),'required')) !!}
                                    </div>

                                    <lable class="col-sm-2 control-label">{!! trans('messages.subjects.subject_th') !!}</lable>
                                    <div class="col-sm-4">
                                        {!! Form::text('name_subject_en',null,array('class'=>'form-control','placeholder'=>trans('messages.subjects.subject_th'),'required')) !!}
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <lable class="col-sm-2 control-label">{!! trans('messages.subjects.amount') !!}</lable>
                                    <div class="col-sm-4">
                                        {{--<textarea name="detail" class="form-control" id="" cols="60" rows="10" style="margin: 0px -295.672px 0px 0px; width: 466px; height: 211px;"></textarea>--}}
                                        {!! Form::number('amount',null,array('class'=>'form-control','max'=>50,'min'=>1),'required') !!}
                                    </div>

                                    <lable class="col-sm-2 control-label">{!! trans('messages.day_') !!}</lable>
                                    <div class="col-sm-4">
                                        {{--<textarea name="detail" class="form-control" id="" cols="60" rows="10" style="margin: 0px -295.672px 0px 0px; width: 466px; height: 211px;"></textarea>--}}
                                        <select name="day" id="" required class="form-control">
                                            <option value="">--{!! trans('messages.select_day') !!}--</option>
                                            <option value="0">{!! trans('messages.day.Monday') !!}</option>
                                            <option value="1">{!! trans('messages.day.Tuesday') !!}</option>
                                            <option value="2">{!! trans('messages.day.Wednesday') !!}</option>
                                            <option value="3">{!! trans('messages.day.Thursday') !!}</option>
                                            <option value="4">{!! trans('messages.day.Friday')!!}</option>
                                            <option value="5">{!! trans('messages.day.Saturday')!!}</option>
                                            <option value="6">{!! trans('messages.day.Sunday') !!}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">

                                    <lable class="col-sm-2 control-label">{!! trans('messages.subjects.time_start') !!}</lable>
                                    <div class="col-sm-4">
                                        <select name="time_start" id="" required class="form-control">
                                            <option value="">--{!! trans('messages.select_time') !!}--</option>
                                            <option value="0">08:30</option>
                                            <option value="1">09:20</option>
                                            <option value="2">10:15</option>
                                            <option value="3">11:05</option>
                                            <option value="4">11:55</option>
                                            <option value="5">12:45</option>
                                            <option value="6">13:35</option>
                                            <option value="7">14:30</option>
                                            <option value="8">15:20 </option>
                                            <option value="9">16:10</option>
                                            <option value="10">17:00</option>
                                            <option value="11">18:10</option>
                                        </select>
                                    </div>

                                    <lable class="col-sm-2 control-label">{!! trans('messages.subjects.time_stop') !!}</lable>
                                    <div class="col-sm-4">
                                        <select name="time_stop" id="" required class="form-control">
                                            <option value="">--{!! trans('messages.select_time') !!}--</option>
                                            <option value="0">09:20</option>
                                            <option value="1">10:10</option>
                                            <option value="2">11:05</option>
                                            <option value="3">11:55</option>
                                            <option value="4">12:45</option>
                                            <option value="5">13:35</option>
                                            <option value="6">14:30</option>
                                            <option value="7">15:20</option>
                                            <option value="8">16:10 </option>
                                            <option value="9">17:00</option>
                                            <option value="10">17:50</option>
                                            <option value="11">19:50</option>
                                        </select>
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
    <div class="modal fade" id="view-subject" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #9BA2AB;">
                    <h4 class="modal-title" style="color: #bbbfc3;">{!! trans('messages.subjects.list_subjects') !!}</h4>
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

            $('.add-subject').on('click',function(){
                //alert('aa');
                $('#add-subject-form').modal('show');
            });

            $('.view-subject').on('click',function(){
                var id = $(this).data('id');
                //console.log(id);
                $('#view-subject').modal('show');
                $('#lead-subject').empty();
                $('.v-loading').show();
                $.ajax({
                    url : '/teacher/view_subject',
                    method : 'post',
                    dataType : 'html',
                    data : ({'id':id}),
                    success : function(e){
                        $('#lead-content').html(e);
                        $('.v-loading').hide();
                    } ,error : function(){
                        console.log('Error View Data subject');
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
        });
    </script>
    @endsection