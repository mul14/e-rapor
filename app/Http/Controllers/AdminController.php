<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditUserRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;

class AdminController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    private $user, $users, $operators, $teachers, $students;


    /**
     * @param User $user
     *
     */
    public function __construct(User $user)
    {
        $this->user = $user;
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\View\View
     *
     * get admin dashboard
     */

    public function index()
    {
        $user = User::first();

        return view('admin.index', compact('user', $user));
    }

    /**
     * @return view to all users collection
     *
     * with $user data
     */
    public function all()
    {
        $users = User::paginate();
        return view('admin.users.all', compact('users'));
    }

    public function operators()
    {
        $users = User::whereRole(2)->paginate();
        return view('admin.users.operator', compact('users'));
    }

    public function teachers()
    {
        $users = User::whereRole(4)->paginate();
        return view('admin.users.teachers', compact('users'));
    }

    /**
     * @return view  to student collection
     *
     */
    public function students()
    {
        $users = User::whereRole(5)->paginate();
        return view('admin.users.student', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreateUserRequest $request, User $user)
    {
        $user->create([
            'username' => $request->get('username'),
            'password' => bcrypt($request->get('password')),
            'name'     => $request->get('name'),
            'email'    => $request->get('email'),
            'role'     => $request->get('role')
        ]);
        flash()->info('Created a New User !!');

        return redirect()->route('admin.all');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($username)
    {
        $user = $this->user->find($username);

        return view('admin.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($username)
    {
        $user = $this->user->find($username);

        return view('admin.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function update($username, EditUserRequest $request)
    {
        $user = $this->user->find($username);

        $user->fill([
            'username' => $request->get('username'),
            'name'     => $request->get('name'),
            'email'    => $request->get('email'),
            'role'     => $request->get('role')
        ])->save();
        flash()->info('Successfully Updated ' . $user->name . ' !!');

        return redirect()->intended(route('admin.all'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($username)
    {
        $this->user->whereUsername($username)->delete();
        flash()->success('Delete User !!');

        return redirect()->route('admin.all');
    }

}
