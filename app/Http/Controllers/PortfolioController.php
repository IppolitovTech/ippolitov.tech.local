<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;

class PortfolioController extends CrudController
{

    protected $fields = ['img', 'header', 'text', 'link', 'sort', 'work'];

    protected $modelClass = Portfolio::class;

    protected $sortBy = ["sort", "asc"];
}
