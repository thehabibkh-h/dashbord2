<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\File;
use App\Version;
class TableController extends Controller
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
        return view('table.index',compact('files'));
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
            function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

        if($request->ajax()){     
            
            
            $file = File::find($request->input('id'));
            
            $version = Version::create(['file_id'=>$file->id,'category_id'=>$file->category_id,'status'=>$file->status]);

            if($request->input('category') == 1){
                $input_status = 'Oui';
            }
            if($request->input('category') == 2){
                $input_status = 'Non';
            }
            if($request->input('category') == 3){
                $input_status = 'Non';
            }

            $file->update(['category_id' => $request->input('category'),'status'=>$input_status]);

            return response()->json(
                ['success' => true,
                
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
