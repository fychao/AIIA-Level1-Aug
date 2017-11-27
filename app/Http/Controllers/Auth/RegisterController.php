<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

define("_bdir_", "/var/www/html/imgs/");
function getMaxUid()
{
    $bdir = _bdir_;
    $fns = scandir($bdir);
    foreach( $fns as $fn)
    {

        if(preg_match("/jpg$/", $fn))
        {
            $o_fn[preg_split("/\./", $fn)[0]] = $bdir.$fn;
        }
    }

    return max(array_keys($o_fn));
}

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
     */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'type' => 'required|image|mimes:jpeg,bmp,png',
        ]);
    }



    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $bdir = _bdir_;
        $uid = intval(getMaxUid())+1;
        $img_path = sprintf("%s%03d.jpg", $bdir, $uid);
        $img_fn = sprintf("%03d.jpg", $uid);
        move_uploaded_file($_FILES['type']['tmp_name'], $img_path);
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'type' => $img_path,
        ]);
    }

}
