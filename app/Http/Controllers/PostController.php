<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->model = new Post();

        $this->namePage = 'Entradas en el blog';

        $this->getModel()->fillable = ['title','contents'];

        $this->fields =  array(
            array('key'=>'title', 'label'=> 'Título' ),
            array('key'=>'contents', 'label'=> 'Contenido' ),
            array('key'=>'created_at', 'label'=> 'Fecha de publicación' ),
            array('key'=>'updated_at', 'label'=> 'Fecha de modificación' ),
            array('key'=>'actions', 'label'=> 'Accciones' ),
        );

    }

}
