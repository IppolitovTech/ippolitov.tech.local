@extends('pages.admin.header')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div>
                <h2>Edit {{ ucfirst($table) }}</h2>
            </div>
            <div class="text-end">
                <a class="btn btn-primary" href="{{ route($table . '.index') }}"> Back</a>
            </div>
        </div>
    </div>
    @if(session('success'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('success') }}
    </div>
    @endif
    <form action="{{ route($table . '.update', $item->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            @foreach($fields as $field)
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ ucfirst($field) }}:</strong>
                    @if ($field=='img')
                    <img src="{{ $item->img }}" style="width:350px; height:350px"><br><br>
                    @endif
                    @if ($field == 'text')
                    <textarea id="summernote" name="{{ $field }}" class="form-control long-text" placeholder="{{ $field }}">{{ $item->$field }}</textarea>
                    @else
                    <input type="text" name="{{ $field }}" value="{{ $item->$field }}" class="form-control" placeholder="{{ $field }}">
                    @endif
                </div>
            </div>
            @endforeach
            <button type="submit" class="btn btn-primary ml-3">Update</button>
        </div>
    </form>
</div>
@extends('pages.admin.footer')