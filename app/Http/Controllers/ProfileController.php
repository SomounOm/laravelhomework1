<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Profile;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Profile::latest()->get();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $post = new Profile();
        $post->city = $request->city;
        $post->image = $request->image;
        $post->user_id = $request->user_id;
        $post->save();
        return response()->json('created');
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
        return Profile::latest()->findOrFail($id);
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
        $post = Profile::latest()->findOrFail($id);
        $post->city = $request->city;
        $post->image = $request->image;
        $post->user_id = $request->user_id;
        $post->save();
        return response()->json('created');
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
        $isDeleted = Profile::destroy($id);
        if($isDeleted ==1){
            return response()->json(['message' =>'deleted'],200);
        }else{
            return respone()->json(['message' =>'Id not found!'],404);
        }
    }
}
