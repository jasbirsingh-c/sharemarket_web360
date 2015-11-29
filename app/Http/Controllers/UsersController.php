<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User, App\Subscription;
use App\Http\Requests\Users\CreateUserRequest;
use App\Http\Requests\Users\UpdateUserRequest;

class UsersController extends Controller
{
    public function __construct()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::latest()->paginate(20);

        $no = $users->firstItem();
		
		$subscription_data = Subscription::lists('subscription_name','id');

        return view('users.index', compact('users', 'no', 'subscription_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $user = User::create($request->all());

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        //$subscription = Subscription::all()->toArray();
        $subscription = Subscription::lists('subscription_name','id');
    //print_r($subscription);die;
        return view('users.edit', compact('user','subscription'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(UpdateUserRequest $request, $id)
    {       
        $user = User::findOrFail($id);

        $all_data = $request->all();
        unset($all_data['email']);
        unset($all_data['token']);
        unset($all_data['password']);
        unset($all_data['device_id']);
        unset($all_data['os_type']);
        //print_r($all_data);die;
        $user->update($all_data);

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        
        $user->delete();
    
        return redirect()->route('users.index');
    }

}
