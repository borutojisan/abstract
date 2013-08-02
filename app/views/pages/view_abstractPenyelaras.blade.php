@extends('templates.master')
@section('content')
 <?php
  
  $abstrak=$data['abstrak'];
$options_kegunaanpenyelaras=array(
  'class' => 'form-horizontal',
  'url' => URL::to('anjung/abstrak/rujukan/save'),
  );
  
$options_abstrak=array(
  'url' => URL::to('anjung/abstrak/save'),
  'method' => 'POST',
  'files' => 'true',
  'class' => 'form-horizontal',
  'autocomplete' => 'on',
  );
?>

      
      
       <h4>Untuk Kegunaan Penyelaras</h4>
  <hr />    
      
   
 
  {{Form::open($options_kegunaanpenyelaras)}} 
     <div class="control-group">
    {{Form::label('', 'No Rujukan', array('class' => 'control-label'))}}
    <div class="controls">
    <input type="hidden" name="abs_id" value="<?=isset($abstrak)? $abstrak->abs_id:''?>" />
   {{Form::text('abs_rujukan',isset($abstrak)&&$abstrak->abs_rujukan!=null? $abstrak->abs_rujukan:'',array('class'=>'span4'))}}{{Form::submit('Simpan', array('class' => 'btn'))}}   
  
    </div></div>   
    <div class="control-group">
    {{Form::label('', 'Abstrak', array('class' => 'control-label'))}}
    <div class="controls">
    @if(($abstrak->abs_abstrakdoc)!=null)
   <a  class="btn btn-info" href="https://docs.google.com/viewer?url=<?php echo url('uploads/abstrak/'.$abstrak->abs_abstrakdoc); ?>" target="new">Lihat Abstrak</a>
   <a class="btn btn-info" href="<?php echo url('uploads/abstrak/'.$abstrak->abs_abstrakdoc); ?>" target="new">Muat Turun Abstrak</a><br /><br />
   
   <iframe src="http://docs.google.com/viewer?url=<?php echo url('uploads/abstrak/'.$abstrak->abs_abstrakdoc); ?>&embedded=true" width="500" height="480" style="border: none;"></iframe>
  @endif
    </div></div>   
     
      <div class="control-group">
    {{Form::label('', 'Bukti Pembayaran', array('class' => 'control-label'))}}
    <div class="controls">
    @if(($abstrak->abs_proofpic)!=null)
   
   <a class="btn btn-info" href="<?php echo url('uploads/proof/'.$abstrak->abs_proofpic); ?>" target="new">Lihat Bukti Bayaran</a><br /><br />
   <a href="{{url('uploads/proof/'.$abstrak->abs_proofpic)}}"><img src="{{asset('uploads/proof/'.$abstrak->abs_proofpic)}}" width="300" height="300" /></a>
  @endif
    </div></div>   
    
   
     {{ Form::close() }}           
 
       
      
 
      
   
 
 
   <div class="row-fluid">
        
    <h4>Status</h4>
  <hr />   
   @include('pages.abstractForm_status')    
</div>  
  
  
  <h4>Muat Naik Abstrak</h4>
  <hr />    
 
@include('pages.abstractForm_abstract')
      
      <hr />    
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      

      
      
      
      <h4>Muat Naik Bukti Pembayaran</h4>
  <hr />    
      
   @include('pages.abstractForm_proof')
      
      
      
      
      
      

     
       
     
     


@stop