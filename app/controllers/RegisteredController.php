<?php

class RegisteredController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function __construct()
    {
		$this->beforeFilter('auth');
        //$this->beforeFilter('csrf', array('on' => 'post'));
		// If you do not want to auto-load the bundle, you can use this
		
    }
	
	public function showAbstract()
	{
		$data['navbar']=2;
		$data['sidebar']=11;
		$usrid=Auth::User()->usr_id;
		$data['abstrak']=Abstrak::where('abs_usrid', '=',$usrid )->first();

		if($data['abstrak']==null)
		{
			$abs = new Abstrak;

			$abs->abs_usrid = $usrid;
			$abs->abs_status = 0;
			
			$abs->save();
			return Redirect::to('anjung/abstrak');
		}
		return View::make('pages.abstractForm_1', array('data' => $data));
	}
	
	public function saveAbstract()
	{
		$abs_id=Input::get('abs_id');

		
		if (Input::hasFile('abs_upload'))
		{
			$dt=Abstrak::find($abs_id);
			$date=strtotime($dt->created_at);
			$abs_abstrakdoc_file = Input::file('abs_upload');
			$extension =$abs_abstrakdoc_file->getClientOriginalExtension();
			$abs_abstrakdoc_filename = Auth::user()->usr_id.$date.'.'.$extension;
			//$mime = Input::file('abs_upload')->getMimeType();
			//dd($mime);
			if($extension=='doc' || $extension=='docx'|| $extension=='pdf')
			{
				Input::file('abs_upload')->move('uploads/abstrak',$abs_abstrakdoc_filename);
				$abs_abstrakdoc=$abs_abstrakdoc_filename;
			}
			else $abs_abstrakdoc='';
			
		}else{$abs_abstrakdoc=Input::get('abs_upload_fname');}
		/*
		$abs_ahli='';
		for($i=0;$i<5;$i++)
		{	
			$v1=Input::get('ahli'.($i+1).'nama');
			$v2=Input::get('ahli'.($i+1).'hp');
			$var1=(isset($v1)&&$v1!='')?$v1:'';
			$var2=(isset($v2)&&$v2!='')?$v2:'';
			

			$abs_ahli.=$var1.':'.$var2.'|';	
		}
		$abs_ahli = substr_replace($abs_ahli,"",-1);*/
//dd($abs_abstrakdoc);


		$abs = Abstrak::find($abs_id);
		
		$abs->abs_tajuk = Input::get('abs_tajuk');
		$abs->abs_ketua = Input::get('abs_ketua');
		$abs->abs_email = Input::get('abs_email');
		$abs->abs_hp = Input::get('abs_hp');
		$abs->abs_organisasi = Input::get('abs_organisasi');
		//$abs->abs_ahli = $abs_ahli;
		$abs->abs_abstrakdoc = $abs_abstrakdoc;
		$abs->abs_nopekerjapelajar = Input::get('abs_nopekerjapelajar');
		$abs->abs_katpenyertaan = Input::get('abs_katpenyertaan');
		$abs->abs_katpertandingan = Input::get('abs_katpertandingan');
		$abs->abs_firsttime = Input::get('abs_firsttime');
		$abs->abs_firsttime2 = Input::get('abs_firsttime2');
		$abs->abs_ahli2 = Input::get('abs_ahli2');
		
		$abs->save();

		if(Auth::User()->usr_type==2)
		{
			return Redirect::to('anjung/penyelaras/abstrak/'.$abs_id);
		}
		return Redirect::to('anjung/abstrak');

	}
	public function saveAbstractRujukan()
	{
		$abs_id=Input::get('abs_id');
		$abs = Abstrak::find($abs_id);	
		$abs->abs_rujukan = Input::get('abs_rujukan');
		$abs->save();
		
		$data['abs_rujukan']=Input::get('abs_rujukan');
		Mail::send('pages.emailrujukan', $data, function($message)
		{
			$abs_id=Input::get('abs_id');
			$abs = Abstrak::find($abs_id);	
			$message->to($abs->abs_email, $abs->abs_ketua)->subject('PERHATIAN !');
		});
		
		
		
		//$usr=User::find($abs_usrid);
		

		if(Auth::User()->usr_type==2)
		{
			return Redirect::to('anjung/penyelaras/abstrak/'.$abs_id);
		}
	}
	public function saveProof()
	{
		$abs_id=Input::get('abs_id');
		if (Input::hasFile('abs_proofpic'))
		{
			$dt=Abstrak::find($abs_id)->first();
			$date=strtotime($dt->created_at);
			$abs_proofpic_file = Input::file('abs_proofpic');
			$extension =$abs_proofpic_file->getClientOriginalExtension();
			$abs_proofpic_filename = Auth::user()->usr_id.$date.'.'.$extension;
			if($extension=='jpg' || $extension=='png'|| $extension=='jpeg'|| $extension=='JPG'|| $extension=='PNG')
			{
				$abs_proofpic_file->move('uploads/proof',$abs_proofpic_filename);
			}
			$abs_proofpic=$abs_proofpic_filename;
		}else
		{
			$abs_proofpic=Input::get('abs_proofpic_hidden');
		}
	
		
		$abs = Abstrak::find($abs_id);
		$abs->abs_proofnama = Input::get('abs_proofnama');
		$abs->abs_bayaran = Input::get('abs_bayaran');
		$abs->abs_tarikhbayar = Input::get('abs_tarikhbayar_hidden');
		$abs->abs_proofpic = $abs_proofpic;
		
		$abs->save();

		if(Auth::User()->usr_type==2)
		{
			return Redirect::to('anjung/penyelaras/abstrak/'.$abs_id);
		}
		return Redirect::to('anjung/abstrak');

	}

	public function listAbstractPenyelaras()
	{
		$data['navbar']=2;
		$data['sidebar']=10;
		$data['abstrak']=Abstrak::where('abs_abstrakdoc','!=','null')->get();
		return View::make('pages.list_abstractPenyelaras', array('data' => $data));
	}
	public function viewAbstractPenyelaras($id)
	{
		$data['navbar']=2;
		$data['sidebar']=10;
		$data['abstrak']=Abstrak::where('abs_id', '=',$id )->firstOrFail();
		
		
	
		return View::make('pages.view_abstractPenyelaras', array('data' => $data));
	}
	public function processAbstractPenyelarasSah($id)
	{
		$abs = Abstrak::find($id);
	
		$abs->abs_status = 1;
		
		$abs->save();
	
		return Redirect::to('anjung/penyelaras/abstrak');
	}
	
	public function listviewUtilUser($id=null)
	{
		
	}
	
	public function listUser()
	{
	var_dump(Hash::make('iid2013'));
		$usr = User::where('usr_type','=','1')->get();
		$data['usr']=$usr;
		return View::make('pages.list_user', array('data' => $data));
	}
	
	
}