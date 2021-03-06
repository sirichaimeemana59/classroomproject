@extends('layout.layout')
@section('content')
    {{--{!! Session::get('locale') !!}--}}
    {{-- //search --}}
    @if(!empty($text))
        <div class="alert alert-danger">
            <strong>{!! trans('messages.waring_regis') !!}</strong> {!! trans('messages.danger_regis') !!}
        </div>
        @endif
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="panel-heading">
                        <h3 class="panel-title">{!! trans('messages.Register_courses') !!}</h3>
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
                        <h3 class="panel-title">{!! trans('messages.Register_courses') !!}</h3>
                    </div>
                    <div class="panel panel-default" id="panel-lead-list">
                        {{--<div class="row">--}}
                            {{--<div class="col-sm-12 text-right">--}}
                                {{--<button class="btn btn-primary mt-2 mt-xl-0 text-right add-subject"><i class="mdi mdi-account-multiple-plus"></i>  {!! trans('messages.subjects.list_subjects') !!}</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <br>
                        <div class="panel-body" id="landing-subject-list">
                            @include('student.list_subject_element')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    {{--Register courses--}}
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="panel-heading">
                        <h3 class="panel-title">{!! trans('messages.Registered_courses') !!}</h3>
                    </div>
                    <div class="panel panel-default" id="panel-lead-list">
                        {{--<div class="row">--}}
                        {{--<div class="col-sm-12 text-right">--}}
                        {{--<button class="btn btn-primary mt-2 mt-xl-0 text-right add-subject"><i class="mdi mdi-account-multiple-plus"></i>  {!! trans('messages.subjects.list_subjects') !!}</button>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        <br>
                        <div class="panel-body" id="">
                            {!! Form::model(null,array('url' => array('/student/register_courses'),'class'=>'form-horizontal','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
                            <table class="table table-responsive itemTables" style="width: 100%">
                                <tr>
                                    <th ></th>
                                    <th>{!! trans('messages.subjects.subject_th') !!}</th>
                                    <th>{!! trans('messages.subjects.time_start') !!}</th>
                                    <th>{!! trans('messages.subjects.time_stop') !!}</th>
                                    <th>{!! trans('messages.teacher.list_teacher') !!}</th>
                                    <th>{!! trans('messages.action') !!}</th>
                                </tr>
                            </table>

                            <table>
                                <tr>
                                    <th width="65%"></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td colspan="4"></td>
                                    <td style="text-align: right;"><button class="btn btn-primary mt-2 mt-xl-0 text-right save-regis" type="submit"><i class="mdi mdi-package-down"></i></button></td>
                                </tr>
                            </table>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--End Register courses--}}

@endsection

@section('script')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.save-regis').hide();
            $('.register-courses').on('click',function(){
                var id = $(this).data('id');
                var name = $(this).data('name');
                var start = $(this).data('start');
                var stop = $(this).data('stop');
                var name_teacher = $(this).data('name_teacher');
                var id_teacher = $(this).data('id_teacher');
                var code = $(this).data('code');
                var start_ = $(this).data('start_');
                var stop_ = $(this).data('stop_');
                var day = $(this).data('day');


                var data = ['<tr class="itemRow">',
                    '<td></td>',
                    '<td><input type="hidden" name="day[]" value="'+day+'"><input type="hidden" name="stop_[]" value="'+stop_+'"><input type="hidden" name="start_[]" value="'+start_+'"><input type="hidden" name="id_subject[]" value="'+id+'"><input type="hidden" name="code_subject[]" value="'+code+'"><input type="hidden" name="id_teacher[]" value="'+id_teacher+'"><span>'+name+'</span></td>',
                    '<td><span>'+start+'</span></td>',
                    '<td><span>'+stop+'</span></td>',
                    '<td><span>'+name_teacher+'</span></td>',
                    '<td><a class="btn btn-danger delete-subject"><i class="mdi mdi-delete-sweep"></i></a></td>',
                ];

                data.push(
                    '<td><div class="text-right">' +
                    '<span class="colTotal"></span> </div><input class="tLineTotal" name="" type="hidden"></td>','</tr>');
                data = data.join('');

                $('.itemTables').append(data);
                $('.save-regis').show();

            });

            $('.itemTables').on("click", '.delete-subject', function() {
                //alert('aaa');
                $(this).closest('tr.itemRow').remove();
                //return false;
            });

            $('.search-subject').on('click',function(){
                var data  = $('#search-form').serialize();
                //alert('aa');
                //console.log(data);
                $('#landing-subject-list').css('opacity','0.6');
                $.ajax({
                    url : '/student/home',
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

            $('.reset-s-btn').on('click',function () {
                $(this).closest('form').find("input").val("");
                $(this).closest('form').find("select option:selected").removeAttr('selected');
                //propertyPageSale (1);
                window.location.href ='/student/home';
            });

        });
    </script>
    @endsection