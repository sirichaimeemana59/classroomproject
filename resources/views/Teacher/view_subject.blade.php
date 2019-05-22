{!! Form::model($subject,array('url' => array('teacher/insert_subject'),'class'=>'form-horizontal','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.subjects.subject_th') !!}</lable>
    <div class="col-sm-4">
        {!! Form::text('name_subject_th',null,array('class'=>'form-control','placeholder'=>trans('messages.subjects.subject_th'),'required','readonly')) !!}
    </div>

    <lable class="col-sm-2 control-label">{!! trans('messages.subjects.subject_th') !!}</lable>
    <div class="col-sm-4">
        {!! Form::text('name_subject_en',null,array('class'=>'form-control','placeholder'=>trans('messages.subjects.subject_th'),'required','readonly')) !!}
    </div>
</div>


<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.subjects.amount') !!}</lable>
    <div class="col-sm-10">
        {{--<textarea name="detail" class="form-control" id="" cols="60" rows="10" style="margin: 0px -295.672px 0px 0px; width: 466px; height: 211px;"></textarea>--}}
        {!! Form::number('amount',null,array('class'=>'form-control','max'=>50,'min'=>1),'required','readonly','disable') !!}
    </div>
</div>

<div class="form-group row">

    <lable class="col-sm-2 control-label">{!! trans('messages.subjects.time_start') !!}</lable>
    <div class="col-sm-4">
        <?php
        $time_start = array(
            0 => "08:30",
            1 => "09:20",
            2 => "10:15",
            3 => "11:05",
            4 => "11:55",
            5 => "12:45",
            6 => "13:35",
            7 => "14:30",
            8 => "15:20",
            9 => "16:10",
            10 => "17:00",
            11 => "18:10"
        );

        $time_stop = array(
            0 => "08:30",
            1 => "09:20",
            2 => "10:15",
            3 => "11:05",
            4 => "11:55",
            5 => "12:45",
            6 => "13:35",
            7 => "14:30",
            8 => "15:20",
            9 => "16:10",
            10 => "17:00",
            11 => "18:10"
        );

        ?>
        <select name="time_start" id="" required class="form-control" disabled>
            <option value="">--{!! trans('messages.select_time') !!}--</option>
            @foreach($time_start as $key => $row)
                @if($key == $subject->time_start)
                <option value="{!! $key !!}" selected>{!! $row !!}</option>
                @endif
                @endforeach
        </select>
    </div>

    <lable class="col-sm-2 control-label">{!! trans('messages.subjects.time_stop') !!}</lable>
    <div class="col-sm-4">
        <select name="time_start" id="" required class="form-control" disabled>
            <option value="">--{!! trans('messages.select_time') !!}--</option>
            @foreach($time_stop as $key => $row)
                @if($key == $subject->time_stop)
                    <option value="{!! $key !!}" selected>{!! $row !!}</option>
                @endif
            @endforeach
        </select>
    </div>
</div>