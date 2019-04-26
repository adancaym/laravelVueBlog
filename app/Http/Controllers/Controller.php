<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public $fields;
    public $filters;
    public $namePage;
    public $model;
    /**
     * @return mixed
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * @return mixed
     */
    public function getNamePage()
    {
        return $this->namePage;
    }

    /**
     * @return mixed
     */
    public function getFilters()
    {
        $fillable = $this->getModel()->fillable;
        $array = array();
        foreach ($fillable as $field){
            $array[$field] = '';
        }
        return $array;
    }

    /**
     * @return mixed
     */
    public function getModel():Model
    {
        return $this->model;
    }
    public function getResponse(){
        $params['items'] = $this->getModel()->all();
        $params['fields'] = $this->getFields();
        $params['name'] = $this->getNamePage();
        $params['filters'] = $this->getFilters();
        return $params;
    }

    public function index()
    {
        return response()->json($this->getResponse());
    }

    public function store(Request $request)
    {
        if ($request->id == '')
        {
            $result = $this->getModel()->save($request->all());
        }
        else
        {
            $result = $this->getModel()->find($request->id);
            $result = $result->fill($request->all())->save();
        }

        return response()->json($result);
    }
    public function destroy($id)
    {
        $result = $this->getModel()->destroy($id);


        return response()->json($result);
    }

}
