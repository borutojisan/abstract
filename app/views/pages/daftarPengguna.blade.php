@extends('templates.master')
@section('content')
<?php
$options=array(
  'url' => URL::to('anjung/pengguna/daftar'),
  'method' => 'POST',
  'class' => 'form-horizontal',
  'autocomplete' => 'on',
  );
?>


      <h4>Pendaftaran Sebagai Pengguna</h4>
  <hr />    
      
    {{Form::open($options)}} 
 
  
    
  
    <div class="control-group">
    {{Form::label('usr_name', 'Nama Penuh', array('class' => 'control-label'))}}
    <div class="controls">
    {{Form::text('usr_name', '', array('class' => 'span6','placeholder' => ''))}}{{$errors->first('usr_name', '<p class="text-error">:message</p>')}}
    </div></div>   
    
    <div class="control-group">
    {{Form::label('usr_email', 'Email', array('class' => 'control-label'))}}
    <div class="controls">
    {{Form::text('usr_email', '', array('class' => 'span6'))}}{{$errors->first('usr_email', '<p class="text-error">:message</p>')}}
    </div></div>   
    
   
    
   
    
    <div class="control-group">
    {{Form::label('usr_pass', 'Kata Kunci', array('class' => 'control-label'))}}
    <div class="controls">
    <input type="password" name="usr_pass" class="span6" >{{$errors->first('usr_pass', '<p class="text-error">:message</p>')}}
    {{--Form::password('usr_pass', '', array('class' => 'span6'))--}}
    </div></div>   
    
    <div class="control-group">
    {{Form::label('usr_pass_confirmation', 'Pasti Kata Kunci', array('class' => 'control-label'))}}
    <div class="controls">
    <input type="password" name="usr_pass_confirmation" class="span6" >{{$errors->first('usr_pass_confirmation', '<p class="text-error">:message</p>')}}
    {{--Form::password('usr_pass_confirmation', '', array('class' => 'span6'))--}}
    </div></div>   
    
  
 <div class="control-group">
    {{Form::label('usr_hp', 'No Telefon', array('class' => 'control-label'))}}
    <div class="controls">
    {{Form::text('usr_hp', '', array('class' => 'span6'))}}{{$errors->first('usr_hp', '<p class="text-error">:message</p>')}}
    </div></div>   
    
     <div class="control-group">
    {{Form::label('usr_nopekerjapelajar', 'No Pekerja/Pelajar', array('class' => 'control-label'))}}
    <div class="controls">
    {{Form::text('usr_nopekerjapelajar', '', array('class' => 'span6'))}}{{$errors->first('usr_nopekerjapelajar', '<p class="text-error">:message</p>')}}
    </div></div>   
   
    
    <hr /> 
    <div class="control-group">   <div class="controls">  
    {{Form::submit('Simpan', array('class' => 'btn'))}}   
    </div></div>  
    {{ Form::close() }}   
    
@stop