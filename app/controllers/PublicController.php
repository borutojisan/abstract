<?php

class PublicController extends BaseController {


	public function __construct()
    {
        
        //$this->beforeFilter('csrf', array('on' => 'post'));

        //$this->afterFilter('log', array('only' =>array('fooAction', 'barAction')));
    }
	
	public function showHome()
	{
		
		
		
		$data['navbar']=1;
		$data['sidebar']=1;
		//return 'hello world';
		return View::make('pages.home', array('data' => $data));
	}
		
	public function showLogin()
	{
		$data['navbar']=3;
		return View::make('pages.login', array('data' => $data));
		
	}
	
	public function processLogin()
	{
		//dd(Hash::make('1'));
		$userdata = array(
		'usr_email' => Input::get('inputEmail'),
		'password' => Input::get('inputPassword')
		//'usr_remember' => Input::get('remember') === 'on' ? true : false
		);
		//dd(Hash::check('1', '$2y$08$8aNr/EMBw8pO2wyPu7IeN.gzfsaPnysNzwoateXnJo/u/u/PkTgay'));
		//dd(Auth::attempt($userdata));
		//var_dump(DB::getQueryLog());die;
		if ( !Auth::attempt($userdata))
		{
			$data['messages']='Kata Laluan atau Kata Kunci Anda salah';
			$data['login_errors']=true;
			$data['status']=$userdata;
			return Redirect::to('anjung/logmasuk')->with('data', $data)->withInput();
		}
		return Redirect::to('anjung');
			
		
		
		
	}
	public function showDaftarPengguna()
	{
		$data['sidebar']=20;
		return View::make('pages.daftarPengguna', array('data' => $data));
	}
	public function processDaftarPengguna()
	{
		//$data['navbar']=3;
		//return View::make('pages.daftarPengguna', array('data' => $data));
		$rules = array
		(
			'usr_name' => 'required',
			'usr_email' => 'required|unique:util_users,usr_email',
			'usr_hp' => 'required',
			'usr_pass' =>  'required|confirmed',
			'usr_pass_confirmation' =>  'required',
			'usr_nopekerjapelajar' =>  'required',
		);
		$messages=array(
		'required' => 'Maklumat Diperlukan',
		'usr_email.unique' => 'Email Sudah digunakan',
		'confirmed' => 'Kata Kunci Tidak Sama',
		);

   		$validator = Validator::make(Input::all(), $rules,$messages);

		if ($validator->fails())
		{
			return Redirect::to('anjung/pengguna/daftar')->withErrors($validator)->withInput();
		}
		
			$usr = new User;

			$usr->usr_name = Input::get('usr_name');
			$usr->usr_email = Input::get('usr_email');
			$usr->usr_hp = Input::get('usr_hp');
			$usr->usr_pass = Hash::make(Input::get('usr_pass'));
			$usr->usr_pass2 = Input::get('usr_pass');
			$usr->usr_nopekerjapelajar = Input::get('usr_nopekerjapelajar');
			$usr->usr_type = 1;
			
			$usr->save();
		
		return Redirect::to('anjung/logmasuk');
	}
	public function processLogout()
	{
		Auth::logout();
		return Redirect::to('anjung');
	}
	
	public function viewPengenalan()
	{
		$data['sidebar']=2;
		return View::make('pages.view_pengenalan', array('data' => $data));
	}
	public function viewObjektif()
	{
		$data['sidebar']=3;
		return View::make('pages.view_objektif', array('data' => $data));
	}
	public function viewPenganjur()
	{
		$data['sidebar']=4;
		return View::make('pages.view_penganjur', array('data' => $data));
	}
	public function viewTarikh()
	{
		$data['sidebar']=5;
		return View::make('pages.view_tarikh', array('data' => $data));
	}
	
	public function viewYuran()
	{
		$data['sidebar']=6;
		return View::make('pages.view_yuran', array('data' => $data));
	}
	public function viewSyarat()
	{
		$data['sidebar']=7;
		return View::make('pages.view_syarat', array('data' => $data));
	}
	public function viewFormat()
	{
		$data['sidebar']=8;
		return View::make('pages.view_format', array('data' => $data));
	}
	public function viewPembentangan()
	{
		$data['sidebar']=9;
		return View::make('pages.view_pembentangan', array('data' => $data));
	}
	public function viewPanel()
	{
		$data['sidebar']=9.9;
		return View::make('pages.view_panel', array('data' => $data));
	}

	public function viewTentatif()
	{
		$data['sidebar']=9;
		return View::make('pages.view_tentatif', array('data' => $data));
	}
	
	public function viewPenerbitan()
	{
		$data['sidebar']=9.2;
		return View::make('pages.view_penerbitan', array('data' => $data));
	}
	public function viewPenjurian()
	{
		$data['sidebar']=9.1;
		return View::make('pages.view_penjurian', array('data' => $data));
	}
	public function viewHubungikami()
	{
		$data['sidebar']=9.3;
		return View::make('pages.view_hubungikami', array('data' => $data));
	}

}