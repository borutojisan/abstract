<?php
 if(isset($abstrak->abs_ahli))
  {
	$pieces = explode("|", $abstrak->abs_ahli);
	$bil=0;
	foreach($pieces as $piece)
	{
		$value[$bil] = explode(":", $piece);
		($value[$bil][0]!=null)? '':$value[$bil][0]='';
		($value[$bil][1]!=null)? '':$value[$bil][1]='';
		$bil++;
	}
  }
 $options_abstrak=array(
  'url' => URL::to('anjung/abstrak/save'),
  'method' => 'POST',
  'files' => 'true',
  'class' => 'form-horizontal',
  'autocomplete' => 'on',
  );
?>
{{Form::open($options_abstrak)}} 
 
  <input type="hidden" name="abs_id" value="<?=isset($abstrak)? $abstrak->abs_id:''?>" />
  <div class="control-group"><label class="control-label" for="inputEmail">Tajuk Abstrak</label>
  <div class="controls"><input type="text" name="abs_tajuk" class="span12" value="<?=isset($abstrak)? $abstrak->abs_tajuk:''?>" required>
  </div></div>
  
  <div class="control-group"><label class="control-label" for="inputEmail">Nama Ketua Kumpulan</label>
  <div class="controls"><input type="text" name="abs_ketua" class="span12"value="<?=isset($abstrak)&&$abstrak->abs_ketua!=null? $abstrak->abs_ketua:Auth::User()->usr_name?>" required>
  </div></div>
  
   <div class="control-group">
    {{Form::label('abs_nopekerjapelajar', 'No Pekerja/Pelajar', array('class' => 'control-label'))}}
    <div class="controls">
    {{Form::text('abs_nopekerjapelajar', isset($abstrak)&&$abstrak->abs_nopekerjapelajar!=null? $abstrak->abs_nopekerjapelajar:Auth::User()->usr_nopekerjapelajar, array('class' => 'span12'))}}{{$errors->first('abs_nopekerjapelajar', '<p class="text-error">:message</p>')}}
    </div></div>   
  
  <div class="control-group"><label class="control-label" for="inputEmail">Email</label>
  <div class="controls"><input type="email" name="abs_email" class="span12"value="<?=isset($abstrak)&&$abstrak->abs_email!=null? $abstrak->abs_email:Auth::User()->usr_email?>" required>
  </div></div>
  
  <div class="control-group"><label class="control-label" for="inputEmail">No Telefon</label>
  <div class="controls"><input type="text" name="abs_hp" class="span12"value="<?=isset($abstrak)&&$abstrak->abs_hp!=null? $abstrak->abs_hp:Auth::User()->usr_hp?>" required>
  </div></div>
  
  <div class="control-group"><label class="control-label" for="inputEmail">Organisasi</label>
  <div class="controls"><input type="text" name="abs_organisasi" class="span12"value="<?=isset($abstrak)? $abstrak->abs_organisasi:''?>" required>
  </div></div>
  <?php
  $abs_katpenyertaan=array(
'0'=>'Sila pilih',
'1'=>'Staf ( Akademik dan Bukan Akademik )',
'2'=>'Pelajar IPTA & IPTS',
'3'=>'Pelajar Sekolah Menengah',
);
$abs_katpertandingan=array(
'0'=>'Sila pilih',
'1'=>'Invention',
'2'=>'Innovation',
'3'=>'Design',
);
$abs_firsttime=array(
'0'=>'Sila pilih',
'1'=>'Tidak pernah',
'2'=>'Pernah',
);
  ?>
   <div class="control-group">
    {{Form::label('abs_katpenyertaan', 'Kategori penyertaan', array('class' => 'control-label'))}}
    <div class="controls">
    {{Form::select('abs_katpenyertaan', $abs_katpenyertaan, isset($abstrak)&&$abstrak->abs_katpenyertaan!=null? $abstrak->abs_katpenyertaan:0,array('class'=>'span12'))}} 
    </div></div>   
    
     <div class="control-group">
    {{Form::label('abs_katpertandingan', 'Kategori Pertandingan', array('class' => 'control-label'))}}
    <div class="controls">
    {{Form::select('abs_katpertandingan', $abs_katpertandingan, isset($abstrak)&&$abstrak->abs_katpertandingan!=null? $abstrak->abs_katpertandingan:0,array('class'=>'span12'))}} 
    </div></div>   
    
     <div class="control-group">
    {{Form::label('abs_firsttime', 'Projek ini tidak pernah menyertai sebarang pertandingan rekacipta', array('class' => 'control-label'))}}
    <div class="controls">
    {{Form::select('abs_firsttime', $abs_firsttime, isset($abstrak)&&$abstrak->abs_firsttime!=null? $abstrak->abs_firsttime:0,array('class'=>'span12'))}}<br /><br />


Jika Pernah : {{Form::text('abs_firsttime2', isset($abstrak)? $abstrak->abs_firsttime2:'', array('class' => 'span6'))}}{{$errors->first('abs_firsttime2', '<p class="text-error">:message</p>')}}
    </div></div>   
  
 {{-- <div class="control-group"><label class="control-label" for="inputPassword">Ahli</label>
  @for($i=0;$i<5;$i++)
  <div class="controls">
  <input type="text" name="ahli{{$i+1}}nama" class="span8" placeholder="nama ahli {{$i+1}}" value="<?=isset($value[$i][0])? $value[$i][0]:''?>">
  <input type="text" name="ahli{{$i+1}}hp" class="span4" placeholder="no telefon {{$i+1}}" value="<?=isset($value[$i][0])? $value[$i][1]:''?>">
  </div>
 @endfor
  </div>--}}
  
  <div class="control-group"><label class="control-label" for="inputPassword">Ahli</label>
 
  <div class="controls">
  <?php
  
  $template='Nama:&#13;Fakulti/Bahagian:&#13;No Pekerja/Pelajar:&#13;No telefon:&#13;Email:&#13;&#13;';
  $template.='Nama:&#13;Fakulti/Bahagian:&#13;No Pekerja/Pelajar:&#13;No telefon:&#13;Email:&#13;&#13;';
  $template.='Nama:&#13;Fakulti/Bahagian:&#13;No Pekerja/Pelajar:&#13;No telefon:&#13;Email:&#13;&#13;';
  $template.='Nama:&#13;Fakulti/Bahagian:&#13;No Pekerja/Pelajar:&#13;No telefon:&#13;Email:&#13;';
  
  ?>
  <span class="text-warning">*Format maklumat ahli</span><br>
	<strong>Nama:</strong> muhammad harith bin roslin<br>
<strong>Fakulti/Bahagian:</strong> fakulti sains komputer dan matematik<br>
<strong>No Pekerja/Pelajar:</strong> 2011567559<br>
<strong>No telefon:</strong> 0134000389<br>
<strong>Email:</strong> mharith@yahoo.com<br>
<br>

  {{Form::textarea('abs_ahli2',isset($abstrak)&&$abstrak->abs_ahli2!=null? $abstrak->abs_ahli2:$template,array('class'=>'span12','rows'=>'25'))}}
  </div>

  </div>
  
   <div class="control-group"><label class="control-label" for="inputPassword">Abstrak</label>
  <div class="controls">
 @if(($abstrak->abs_abstrakdoc)!=null)
   <a class="btn btn-info" href="https://docs.google.com/viewer?url=<?php echo url('uploads/abstrak/'.$abstrak->abs_abstrakdoc); ?>" target="new">Lihat Abstrak</a>
   <a class="btn btn-info" href="<?php echo url('uploads/abstrak/'.$abstrak->abs_abstrakdoc); ?>" target="new">Muat Turun Abstrak</a><br /><br />
  @endif
  

   <input type="file" name="abs_upload" placeholder=""><input type="hidden" name="abs_upload_fname" value="{{$abstrak->abs_abstrakdoc}}" />
  </div></div>
  <div class="control-group">
  <div class="controls">
  <p>Pengesahan ketua penyelidik:</p>
	<ol>
		<li>Projek ini hasil dari kerjasama dengan pihak industri</li>
		<li>Projek ini tidak pernah dipertandingkan di peringkat atau antarabangsa</li>
		<li>Projek ini sudah dipatenkan/dalam proses pematenan</li>
	</ol></div></div>
  <div class="control-group">
  <div class="controls"><button type="submit" class="btn">Simpan</button>
  </div></div>
  
  </form>