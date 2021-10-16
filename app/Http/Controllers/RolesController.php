<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Roles;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Roles::latest()->get();
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
        $role = new Roles();
        $role->role = $request->role;
        $role->status = $request->status;
        $role->user_id = $request->user_id;
        $role->save();
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
        return Roles::latest()->findFail($id);
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
        $role = Roles::latest()->findFail($id);
        $role->role = $request->role;
        $role->status = $request->status;
        $role->user_id = $request->user_id;
        $role->save();
        return response()->json('updated');
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
        $isDeleted = Roles::destroy($id);
        if($isDeleted ==1){
            return response()->json(['message' =>'deleted'],200);
        }else{
            return respone()->json(['message' =>'Id not found!'],404);
        }

    }
}
