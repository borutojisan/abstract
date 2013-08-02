@extends('templates.master')
@section('content')

<div class="row-fluid"><div class="span12">

<form method="post" action="{{URL::to('anjung/logmasuk')}}" class="form-horizontal" autocomplete="off">
 <legend>Log Masuk</legend>
 <?php 

if(isset($data['messages'])){
	echo $data['messages'];
}

?>
  <div class="control-group">
    <label class="control-label" for="inputEmail">Email</label>
    <div class="controls">
      <input type="text" id="inputEmail" name="inputEmail" placeholder="">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">Kata Kunci</label>
    <div class="controls">
      <input type="password" id="inputPassword" name="inputPassword" placeholder="">
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
     {{-- <label class="checkbox">
        <input type="checkbox"> Remember me
      </label>--}}
      <button type="submit" class="btn">log Masuk</button>
    </div>
  </div>
</form>

</div></div>
@stop