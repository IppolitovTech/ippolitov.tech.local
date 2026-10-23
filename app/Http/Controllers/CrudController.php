<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CrudController extends AdminAccessController
{

    protected $fields = [];
    protected $modelClass = null;
    protected $sortBy = [];

    public function index()
    {
        $data['items'] = $this->getModel()->orderBy($this->sortBy[0], $this->sortBy[1])->paginate(10);
        $fields = $this->fields;
        $table = $this->getModelTableName();
        return view('pages.admin.crud.index', compact('fields', 'table', 'data'));
    }

    public function create()
    {
        $fields = $this->fields;
        $table = $this->getModelTableName();
        return view('pages.admin.crud.create', compact('fields', 'table'));
    }

    public function edit($id)
    {
        $item = $this->getModel()->find($id);

        $data['items'] = $this->getModel()->orderBy('sort', 'asc')->paginate(10);
        $fields = $this->fields;
        $table = $this->getModelTableName();
        return view('pages.admin.crud.edit', compact('item', 'fields', 'table', 'data'));
    }

    public function store(Request $request)
    {
        $model = new $this->modelClass;
        $this->save($model, $request, true);
        $model->link = $this->generateLink($request);
        $model->work = 1; 
        $model->blog = 1; 
        $model->save();
        return redirect()->route($this->getModelTableName() . '.index')
            ->with('success', ucfirst($this->getModelTableName()) . ' has been created successfully.');
    }

    public function update(Request $request, $id)
    {
        $model = $this->getModel()->find($id);
        $model->updated_at = now();
        $this->save($model, $request);
        return redirect()->route($this->getModelTableName() . '.index')
            ->with('success', ucfirst($this->getModelTableName()) . ' has been updated successfully.');
    }

    public function destroy($id)
    {
        $model = $this->getModel()->find($id);
        $model->delete();
        return redirect()->route($this->getModelTableName() . '.index')
            ->with('success', ucfirst($this->getModelTableName()) . ' has been deleted successfully');
    }

    protected function save($model, $request, $isCreate = false)
    {
        foreach ($this->fields as $field) {
            $model->$field = $request->$field;
        }
        $model->save();
    }

    protected function generateLink($request)
    {
        $header = $request->header;
        $link = $header;
        $formattedLink = preg_replace('/[^a-z0-9]+/', '-', strtolower($link));
        return $formattedLink;
    }

    protected function getModel()
    {
        return app($this->modelClass);
    }

    protected function getModelTableName()
    {
        return strtolower(class_basename($this->modelClass));
    }
}
