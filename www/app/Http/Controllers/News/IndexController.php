<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Generic\ViewAuthController;
use Illuminate\Http\Request;

class IndexController extends ViewAuthController
{
    public function index()
    {
        return 'News list';
    }
}
