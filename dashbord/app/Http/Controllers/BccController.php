<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\File;

use App\Version;

class BccController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $files = File::all();
        return view('bcc.index',compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        if($request->ajax()){
            
            
            $input = $request->input('value');

            if($input == 1){
                $input = 'Oui';
            }
            if($input == 2){
                $input = 'Non';
            }
            if($input == 3){
                $input = 'Non';
            }
            
            $file = File::find($request->input('pk'));
            
            $version = Version::create(['file_id'=>$file->id,'category_id'=>$file->category_id,'status'=>$file->status]);

            $file->update(['category_id' => $request->input('value'),'status'=>$input]);

            return response()->json(
                ['success' => true,
                'id' => $file->id,
                'status'=>$file->status,
                'created_at'=>$file->created_at->diffForHumans(),
                'updated_at'=>$file->updated_at->diffForHumans()]);

        }

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
