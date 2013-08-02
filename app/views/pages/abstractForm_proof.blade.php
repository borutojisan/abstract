<?php
 $options_proof=array(
  'url' => URL::to('anjung/abstrak/proof/save'),
  'method' => 'POST',
  'files' => 'true',
  'class' => 'form-horizontal',
  'autocomplete' => 'on',
  );
?>

{{Form::open($options_proof)}} 
 
  
    {{Form::hidden('abs_id', isset($abstrak)? $abstrak->abs_id:'', array('class' => 'awesome'))}}
    <div class="control-group">
    {{Form::label('abs_proofnama', 'Nama', array('class' => 'control-label'))}}
    <div class="controls">
    {{Form::text('abs_proofnama', isset($abstrak)&&$abstrak->abs_proofnama!=null? $abstrak->abs_proofnama:Auth::User()->usr_name, array('class' => 'span12'))}}
    </div></div>   
    
    <div class="control-group">
    {{Form::label('abs_bayaran', 'Bayaran', array('class' => 'control-label'))}}
    <div class="controls">
    {{Form::text('abs_bayaran', isset($abstrak)? $abstrak->abs_bayaran:'', array('class' => 'span12'))}}
    </div></div>   
    
    <div class="control-group">
    {{Form::label('abs_tarikhbayar', 'Tarikh', array('class' => 'control-label'))}}
    <div class="controls">
    {{Form::text('abs_tarikhbayar', isset($abstrak)? $abstrak->abs_tarikhbayar:'', array('class' => 'span12 datepicker'))}}
    {{Form::hidden('abs_tarikhbayar_hidden', isset($abstrak)? $abstrak->abs_tarikhbayar:'', array('class' => 'span12 datepicker-alt'))}}
    </div></div>   
    
    <div class="control-group">
    {{Form::label('abs_proofpic', 'Bukti Pembayaran', array('class' => 'control-label'))}}
    <div class="controls">
    @if(($abstrak->abs_proofpic)!=null)
   
   <a class="btn btn-info" href="<?php echo url('uploads/proof/'.$abstrak->abs_proofpic); ?>" target="new">Lihat Bukti Bayaran</a><br /><br />
  @endif
    {{Form::file('abs_proofpic')}}
    {{Form::hidden('abs_proofpic_hidden', isset($abstrak)? $abstrak->abs_proofpic:'')}}
    </div></div>   
   
    
    <hr /> 
    <div class="control-group">   <div class="controls">  
    {{Form::submit('Simpan', array('class' => 'btn'))}}   
    </div></div>  
    {{ Form::close() }}   