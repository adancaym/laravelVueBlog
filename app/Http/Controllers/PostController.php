<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->fields =  array(
            array('key'=>'title', 'label'=> 'Título' ),
            array('key'=>'contents', 'label'=> 'Contenido' ),
            array('key'=>'created_at', 'label'=> 'Fecha de publicación' ),
            array('key'=>'updated_at', 'label'=> 'Fecha de modificación' ),
            array('key'=>'actions', 'label'=> 'Accciones' ),
        );

        $this->filters =  array(
            'title'=>'',
            'contents'=>'',
        );

        $this->namePage = 'Entradas en el blog';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entidades =  Post::all();
        $fields= $this->getFields();
        $filters= $this->getFilters();

        $params['items'] = $entidades;
        $params['fields'] = $fields;
        $params['filters'] = $filters;
        $params['name'] = $this->getNamePage();

        return response()->json($params);
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
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }

    /**
     * @return array
     */
    public function getFields(): array
    {
        return $this->fields;
    }
}
