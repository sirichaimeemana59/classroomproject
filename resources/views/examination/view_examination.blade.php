
@if(!empty($examination->photo))
    <div class="form-group row" align="center">
        <div class="col-sm-4" style="margin: auto auto;">
            <p style="text-align: center;"><img src="{!! asset($examination->photo) !!}" class="img-rounded" alt="Cinque Terre Responsive image" width="125%" height="125%"></p>
        </div>
    </div>
@endif

<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.examination.proposition') !!}  </lable>
    <div class="col-sm-10">
        :     {!! $examination->{'proposition_'.Session::get('locale')} !!}
    </div>
</div>

@if(!empty($examination_transection))
<div class="form-group row">
        <lable class="col-sm-10 control-label">{!! trans('messages.examination.choice') !!}   </lable>
        @foreach($examination_transection as $key => $row)
        <br>
            <div class="col-sm-10">
                 <lable class="col-sm-2 control-label"> {!! $key+1 !!}</lable> : {!! $row->{'choice_'.Session::get('locale')} !!}
            </div>
        @endforeach
</div>
@endif