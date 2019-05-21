{!! Form::model($subject,array('url' => array('teacher/edit_subject/form'),'class'=>'form-horizontal','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
<div class="form-group row">
    <input type="hidden" name="id" value="{!! $subject->id_subject !!}">
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
    <div class="col-sm-10">
        {{--<textarea name="detail" class="form-control" id="" cols="60" rows="10" style="margin: 0px -295.672px 0px 0px; width: 466px; height: 211px;"></textarea>--}}
        {!! Form::number('amount',null,array('class'=>'form-control','max'=>50,'min'=>1),'required') !!}
    </div>
</div>

<div class="form-group row">

    <lable class="col-sm-2 control-label">{!! trans('messages.subjects.time_start') !!}</lable>
    <div class="col-sm-4">
        {!! Form::time('time_start',null,array('class'=>'form-control','placeholder'=>trans('messages.subjects.time_start'),'required')) !!}
    </div>

    <lable class="col-sm-2 control-label">{!! trans('messages.subjects.time_stop') !!}</lable>
    <div class="col-sm-4">
        {!! Form::time('time_stop',null,array('class'=>'form-control','placeholder'=>trans('messages.subjects.time_stop'),'required')) !!}
    </div>

</div>

<div class="form-group row float-center" style="text-align: center; ">
    <div class="col-sm-12">
        <button class="btn-info btn-primary" type="submit">Save</button>
        <button class="btn-info btn-warning" type="reset">Reset</button>
    </div>
</div>
{!! Form::close() !!}