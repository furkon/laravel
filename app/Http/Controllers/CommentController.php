<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Response;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $comments=Product::all();
        return Response::json($comments,200);
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
        $comment=new Product;
        $comment->name=$request->get('name');
        $comment->description=$request->get('description');
        $comment->price=$request->get('price');
        $comment->stok=$request->get('stok');
        $success=$comment->save();
     
        if(!$success)
        {
                 return Response::json("error saving",500);
        }
     
            return Response::json("success",201);
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
        $comment=Product::find($id);
        if(is_null($comment))
        {
             return Response::json("not found",404);
        }
     
        return Response::json($comment,200);
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
            $comment=Product::find($id);
 
            if(!is_null($request->get('name')))
            {
                $comment->name=$request->get('name');
            }
         
            if(!is_null($request->get('description')))
            {
                $comment->description=$request->get('description');
            }
         
            $success=$comment->save();
         
            if(!$success)
            {
                return Response::json("error updating",500);
            }
         
            return Response::json("success",201);
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

        $comment=Product::find($id);
        if(is_null($comment))
        {
            return Response::json("not found",404);
        }
     
        $success=$comment->delete();
     
        if(!$success)
        {
            return Response::json("error deleting",500);
        }
     
        return Response::json("success",200);
    }
}
