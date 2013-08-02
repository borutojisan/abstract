<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;
App::error(function(ModelNotFoundException $e)
{
    return Response::make('Not Found', 404);
});
class Abstrak extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	public $table = 'abstrak';
	public $primaryKey = 'abs_id';
	//public $username='usr_email';
	//'password' => 'usr_pass',
	public $timestamps = true;
	




}
