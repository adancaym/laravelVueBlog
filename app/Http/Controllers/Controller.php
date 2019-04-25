<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public $fields;
    public $filters;
    public $namePage;
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
        return $this->filters;
    }
}
