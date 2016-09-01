<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Role;
use App\Photo;
use App\Http\Requests\CreateUserRequest;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /* NOTE - NEW STUFF
        /  first time using the models ::lists() method
        /  this returns data from specifed columns as an array 
        */
        $roles = Role::lists('name', 'id')->all();  // REMINDER: don't forget to call ->all() !!!

        return view('admin/users/create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        // NEW STUFF - file persistance

        /*
            PEEP THE TECHNIQUE FOR: 
            1) GETTING FILES OUT OF $request, 
            2) MOVING THEM INTO SEPERATE FOLDER
            3) PERSISTING THEM INTO THE DB
            4) GETTING THE ID FROM PERSISTED FILE AND USE IT AS FOREGIN KEY
            
        */

        $input = $request->all();

        if($file = $request->file('photo_id')){

            $name = time() . $file->getClientOriginalName();
            $photo = Photo::create(['file' => $name ]);

            $file->move('images', $name);

            $input['photo_id'] = $photo->id;
            
        }

        $input['password'] = bcrypt($request->password);
        User::create($input);

        return redirect('/admin/users');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::findOrFail($id);
        $roles = Role::lists('name', 'id')->all();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
