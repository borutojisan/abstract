<?php
$sidebar=isset($data['sidebar'])?$data['sidebar']:0;


?>
<div class=" sidebar-nav sidebar-nav-custom " >
            <ul class="nav nav-list">
              <li class="nav-header">Menu Utama</li>
              <hr class="hr-sidebar">
                <li class="<?=$sidebar==1?'active':''?>"><a href="{{URL::to('anjung')}}">Anjung</a></li>
                <li class="<?=$sidebar==2?'active':''?>"><a href="{{URL::to('anjung/pengenalan')}}">Pengenalan</a></li>
                <li class="<?=$sidebar==3?'active':''?>"><a href="{{URL::to('anjung/objektif')}}">Objektif</a></li>
                <li class="<?=$sidebar==4?'active':''?>"><a href="{{URL::to('anjung/penganjur')}}">Penganjur</a></li>
              
                <li class="<?=$sidebar==5?'active':''?>"><a href="{{URL::to('anjung/tarikh')}}">Tarikh dan Tempat</a></li>
                <li class="<?=$sidebar==6?'active':''?>"><a href="{{URL::to('anjung/yuran')}}">Yuran Penyertaan</a></li>
                <li class="<?=$sidebar==7?'active':''?>"><a href="{{URL::to('anjung/syarat')}}">Syarat Penyertaan</a></li>
                <li class="<?=$sidebar==8?'active':''?>"><a href="{{URL::to('anjung/format')}}">Format Bahan Pameran dan Poster</a></li>
                <li class="<?=$sidebar==9?'active':''?>"><a href="{{URL::to('anjung/tentatif')}}">Tentatif program</a></li>
                <li class="<?=$sidebar==9.1?'active':''?>"><a href="{{URL::to('anjung/penjurian')}}">Penjurian</a></li>
				<li class="<?=$sidebar==9.2?'active':''?>"><a href="{{URL::to('anjung/penerbitan')}}">Penerbitan</a></li>
				<li class="<?=$sidebar==9.3?'active':''?>"><a href="{{URL::to('anjung/hubungikami')}}">Hubungi kami</a></li>
              
               
               
              <li class="nav-header">Pendaftaran</li>
              <hr class="hr-sidebar">
			  @if(Auth::check())
              @if(Auth::User()->usr_type==2)
              <li class="<?=$sidebar==10?'active':''?>"><a href="{{URL::to('anjung/penyelaras/abstrak')}}">Senarai Abstrak</a></li>
			  <li class="<?=$sidebar==10.1?'active':''?>"><a href="{{URL::to('anjung/penyelaras/pengguna')}}">Senarai Peserta</a></li>
              @elseif(Auth::User()->usr_type==1)
              <li class="<?=$sidebar==11?'active':''?>"><a href="{{URL::to('anjung/abstrak')}}">Muat Naik Abstrak</a></li>
              @endif
              {{--<li class="<?=$sidebar==11?'active':''?>"><a href="#">Lihat Abstrak</a></li>--}}
               @endif
              @if(!Auth::check())
             {{-- <li class="nav-header">Pendaftaran</li>
               <hr class="hr-sidebar">--}}
              <li class="<?=$sidebar==20?'active':''?>"><a href="{{URL::to('anjung/pengguna/daftar')}}">Daftar sebagai Pengguna</a></li>
              @endif
            </ul>
          </div><!--/.well -->
          <hr />