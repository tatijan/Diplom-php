<?php
namespace App\Http\Controllers\Admin\UserManagment;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
/**
 * Class UserController
 *
 * @package App\Http\Controllers\Admin\UserManagment
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'admin.user_managment.users.index',
            [
                'users' => User::paginate(10)
            ]
        );
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(
            'admin.user_managment.users.create',
            [
                'user' => []
            ]
        );
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|string|max:255',
                'login' => 'required|string|max:255|unique:users,login',
                'email' => 'required|string|email|max:255',
                'password' => 'required|string|min:5|confirmed'
            ]
        );
        User::create(
            [
                'name' => $request['name'],
                'login' => $request['login'],
                'email' => $request['email'],
                'password' => bcrypt($request['password'])
            ]
        );
        return redirect()->route('admin.user_managment.user.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view(
            'admin.user_managment.users.edit',
            [
                'user' => $user
            ]
        );
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|string|max:255',
                'login' => [
                    'required',
                    'string',
                    'max:255',
                    \Illuminate\Validation\Rule::unique('users')->ignore($user->id),
                ],
                'email' => 'required|string|email|max:255',
                'password' => 'nullable|string|min:5|confirmed',
            ]
        );
        $user->name = $request['name'];
        $user->login = $request['login'];
        $user->email = $request['email'];
        if ($request['password'] != null) {
            $user->password = bcrypt($request['password']);
        }
        $user->save();
        return redirect()->route('admin.user_managment.user.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.user_managment.user.index');
    }
}