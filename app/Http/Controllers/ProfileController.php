<?php

namespace App\Http\Controllers;

use App\City;
use App\Http\Requests\ProfileRequest;
use App\Photo;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Profile::all();
        return view('profile.index',compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::pluck('name','id')->all();
        return view('profile.create',compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function store(ProfileRequest $request)
    {
        $input = $request->all();

        if($file = $request->file('photo_id')) {

//            return "photo exist";
            $name = time() . $file->getClientOriginalName() ;

            $file->move('images',$name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id ;

        }


        Profile::create($input);




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
        $profile = Profile::findOrFail($id);

        $cities = City::pluck('name','id')->all();

        return view('profile.edit', compact('profile','cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request, $id)
    {
        $profile = Profile::findOrFail($id);

        $input = $request->all();

        if($file = $request->file('photo_id')) {


            $name = time() . $file->getClientOriginalName() ;

            $file->move('images',$name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id ;

        }

        $input['password'] = bcrypt($request->password);

        $profile->update($input);

        //return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profile = Profile::findOrFail($id);

        unlink(public_path().$profile->photo->file);

        $profile->delete();

        Session::flash('deleted_user','The user has been deleted');

        return redirect('/profile/index');
    }
}
