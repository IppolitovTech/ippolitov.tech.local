<?php

namespace App\Http\Controllers;

use App\Models\Page;

class PagesDatasController extends CrudController
{
    protected $fields = ['header', 'text', 'link', 'work', 'blog'];

    protected $modelClass = Page::class;

    protected $sortBy = ["updated_at", "desc"];
}
