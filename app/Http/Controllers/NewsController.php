<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->model = new News();
        $this->fields =  array(
            array('key'=>'title', 'label'=> 'Título' ),
            array('key'=>'contents', 'label'=> 'Contenido' ),
            array('key'=>'actions', 'label'=> 'Accciones' ),
        );
        $this->namePage = 'Noticias';
    }
}
