<?php

namespace App\Http\Controllers;

use App\Table;
use App\User;
use Illuminate\Http\Request;

class TableController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($username, $collection_name, Request $request)
    {
        $table = Table::where('collection_name', $collection_name)->orderBy('id','desc')->get();
        $table_array = array_values(json_decode($table,true));
        $object = array();
        foreach($table_array as $key => $content)
        {
            $object_contents = json_decode($content['object_content'],true);
            $add_id = ['id' => $content['object_id']];
            $object[] = array_merge($add_id,$object_contents);
            $object[$key]['created_at'] = $content['created_at'];
            $object[$key]['updated_at'] = $content['updated_at'];          
        }
        return response()->json($object,200);
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
    public function store($username, $collection_name, Request $request)
    {
        $user = User::where('username',$username)->first();
        $user_id = $user->id;

        $raws = json_decode($request->getContent());
        if(is_array($raws))
        {
            foreach($raws as $key => $raw)
            {
                $table = new Table();
                $table->object_id = $user_id.substr(md5(uniqid()),1,15);
                $table->collection_name = $collection_name;
                $table->object_content = json_encode($raw);
                $table->save();
            }
            return response()->json(true,200);
        }    
        $table = new Table();
        $table->object_id = $user_id.substr(md5(uniqid()),1,15);
        $table->collection_name = $collection_name;
        $table->object_content = $request->getContent();
        $table->save();
        return response()->json(true,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function show($username, $collection_name, $object_id, Table $table)
    {
        $content = Table::where('object_id', $object_id)->where('collection_name',$collection_name)->first();
        if(!$content)
        {
            return response()->json("Object is Not Found",404);
        }
        $object = array();
        $object_contents = json_decode($content['object_content'],true);
        $add_id = ['id' => $content['object_id']];
        $object[] = array_merge($add_id,$object_contents); 
        $object[0]['created_at'] = $content['created_at'];
        $object[0]['updated_at'] = $content['updated_at'];
        return response()->json($object,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function edit(Table $table)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function update($username, $collection_name, $object_id, Request $request, Table $table)
    {
        $table = Table::where('object_id', $object_id)->where('collection_name',$collection_name)->first();
        if(!$table)
        {
            return response()->json("Object is Not Found",404);
        }
        $table->collection_name = $table->collection_name;
        $table->object_id = $table->object_id;
        $table->object_content = $request->getContent();
        $table->update();
        return response()->json(true,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function destroy($username, $collection_name, $object_id = null, Table $table)
    {
        if($object_id != null)
        {
            $table = Table::where('object_id', $object_id)->where('collection_name',$collection_name)->first();
            if(!$table)
            {
                return response()->json("Object is Not Found",404);
            }
            $table->delete();
            return response()->json(true,200);
        }
        $table = Table::where('collection_name',$collection_name)->delete();
        return response()->json(true,200);
    }
}
