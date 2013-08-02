<?php
$navbar=isset($data['navbar'])?$data['navbar']:0;
?>
<div class="container-fluid navbar-container-custom">
    <div class="navbar navbar-inverse ">
      <div class="navbar-inner">
        <div class="container-fluid">
       
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">IID</a>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
             <!-- Log Masuk Sebagai <a href="#" class="navbar-link">Username</a>-->
            </p>
            {{--<ul class="nav ">
              <li class="<?=$navbar==1?'active':''?>"><a href="{{URL::to('anjung')}}">Anjung</a></li>
                @if(Auth::Check())
                  @if(Auth::User()->usr_type==1)
                    <li class="<?=$navbar==2?'active':''?>"><a href="{{URL::to('anjung/abstrak')}}">Abstrak</a></li>
                  @else
                    <li class="<?=$navbar==2?'active':''?>"><a href="{{URL::to('anjung/penyelaras/abstrak')}}">Abstrak Penyelaras</a></li>
                  @endif
                @endif
            </ul>--}}
             <ul class="nav pull-right">
              
             <?php if(!Auth::check()){ ?> <li class="<?=$navbar==3?'active':''?>"><a href="{{URL::to('anjung/logmasuk')}}">Log Masuk</a></li><?php }else{
				 ?><li class="<?=$navbar==3?'active':''?>"><a href="{{URL::to('anjung/logkeluar')}}">Log Keluar</a></li><?php }?>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    </div>
