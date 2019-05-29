@extends('layout.layout')
@section('content')
    @if($text == 2)
        <div class="alert alert-success">
            <strong>Success!</strong> {!! trans('messages.examination.examination_completed') !!}
        </div>
    @endif
    {{-- //search --}}
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="panel-heading">
                        <h3 class="panel-title">{!! trans('messages.student.list_student') !!}</h3>
                    </div>
                    <div class="panel-body search-form">
                        <form method="POST" id="search-form" action="#" accept-charset="UTF-8" class="form-horizontal">
                            <div class="row">
                                <div class="col-sm-3 block-input">
                                    <input class="form-control" size="25" placeholder="{!! trans('messages.name') !!}" name="name">
                                </div>

                                {{--<div class="col-sm-3 block-input">--}}
                                {{--<input class="form-control" size="25" placeholder="{!! trans('messages.id') !!}" name="id">--}}
                                {{--</div>--}}
                            </div>

                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <button type="reset" class="btn btn-white reset-s-btn">{!! trans('messages.reset') !!}</button>
                                    <button type="button" class="btn btn-secondary search-student">{!! trans('messages.search') !!}</button>
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
                        <h3 class="panel-title">{!! trans('messages.student.list_student') !!}</h3>
                    </div>
                    <div class="panel panel-default" id="panel-lead-list">
                        <div class="row">
                                <div class="col-sm-12 text-right">
                                    <button class="btn btn-primary mt-2 mt-xl-0 text-right add-student"><i class="mdi mdi-account-multiple-plus"></i>  {!! trans('messages.student.list_student') !!}</button>
                                </div>
                            </div>
                            <br>
                        <div class="panel-body" id="landing-student-list">
                            @include('granding_eaxm.list_student_element')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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


            $('.reset-s-btn').on('click',function () {
                $(this).closest('form').find("input").val("");
                $(this).closest('form').find("select option:selected").removeAttr('selected');
                //propertyPageSale (1);
                window.location.href ='/admin/student';
            });

            $('.search-student').on('click',function(){
                var data  = $('#search-form').serialize();
                //alert('aa');
                //console.log(data);
                $('#landing-student-list').css('opacity','0.6');
                $.ajax({
                    url : '/admin/student',
                    method : 'post',
                    dataType : 'html',
                    data : data,
                    success : function(e){
                        $('#landing-student-list').css('opacity','1').html(e);
                    } ,error : function(){
                        console.log('Error Search Data Student');
                    }
                });
            });
        });
    </script>
@endsection