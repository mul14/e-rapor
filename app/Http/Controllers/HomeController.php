<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Home Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders your application's "dashboard" for users that
    | are authenticated. Of course, you are free to change or remove the
    | controller as you wish. It is just here to get your app started!
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index()
    {
//        $user = Auth::User();
//        $user->profiles
//
//        //Check if the user name is empty
//        //if empty, will redirected to fill his/her profile
//        if (Auth::User()->name == null)
//        {
//            return 'isi profile';
//        }

        //Check the user role
        if (Auth::User()->role == 1)
        {
            return redirect()->route('admin.index');
        } elseif (Auth::User()->role == 2)
        {
            return 'operator';
        } elseif (Auth::User()->role == 3)
        {
            return 'kepsek';
        } elseif (Auth::User()->role == 4)
        {
            return 'guru';
        }

        return 'siswa';
    }

}
