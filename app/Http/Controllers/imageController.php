<?php

namespace App\Http\Controllers;
use App\image;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Resources\image as imageResource;
use App\Http\Requests\imagerequest;
use Symfony\Component\HttpFoundation\Response;

class imageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imgdata = image::all();
        //$imgdata=image::max('requestCount');

        return response()->json(imageResource::collection($imgdata,200, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function page($id)
    {
        $paginate=image::paginate(9, ['*'], 'page', $id);

        return response()->json(imageResource::collection($paginate));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(imagerequest $request)
    {
        //
        $image = new image([
            'name' => $request->get('name'),
            'url' => $request->get('url')
        ]);;

        $image->save();

        return response([
           'data' => new imageResource($image)
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $total=0;
        image::where('id',$id)->increment('requestCount',$total+=1);
        $imgd =image::find($id);
        return response()->json(new imageResource($imgd));
    }

    public function mostpopular(){

          //$request = request();
          //$value = request('key', $top);
          //dd($value);
        $top=image::orderBy('requestCount','desc')->get()->first();
        return response()->json(new imageResource($top));

    }


}
