@extends('templates.master')
@section('content')
 <?php
  
  $abstrak=$data['abstrak'];

 
  
 
  

 
  
  
  ?>
         
          
    <div class="tabbable "> 
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab1" data-toggle="tab">Muat Naik Abstrak</a></li>
            <li><a href="#tab2" data-toggle="tab">Muat Naik bukti pembayaran</a></li>
            <li><a href="#tab3" data-toggle="tab">Status</a></li>
        </ul>
    <div class="tab-content">
    <div class="tab-pane active" id="tab1">
        <h4>Muat Naik Abstrak</h4>
        <hr />    
        @include('pages.abstractForm_abstract')
        <hr />    
    </div>
    <div class="tab-pane" id="tab2">
        <h4>Muat Naik Bukti Pembayaran</h4>
        <hr />       
        @include('pages.abstractForm_proof')
    </div>
     <div class="tab-pane" id="tab3">
     <h4>Status</h4>
  <hr />   
 @include('pages.abstractForm_status')
     
     
    </div>
  </div>
</div>

@stop