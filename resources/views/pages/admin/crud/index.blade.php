@extends('pages.admin.header')
<div class="container mt-2">
    <div class="col-lg-12 margin-tb">
        <div>
            <h2>{{ ucfirst($table) }} List</h2>
        </div>
        <div class="row  mb-3">
            <div class="col">
                <a class="btn btn-primary" href="{{ route($table . '.create') }}"> Create {{ ucfirst($table) }}</a>
            </div>
            <div class="col text-end">
                <a class="btn btn-primary" href="{{ route('admin') }}"> Back</a>
            </div>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('success') }}
    </div>
    @endif
    <table class="table table-bordered table table-striped">
        <tr>
            @foreach($fields as $field)
            @if ($field=='text')
            @elseif ($field=='updated_at')
            @elseif ($field=='img')
            <th width="250px">{{ ucfirst($field) }}</th>
            @else
            <th>{{ ucfirst($field) }}</th>
            @endif
            @endforeach
            <th width="280px">Actions</th>
        </tr>
        @foreach($data['items'] as $item)
        <tr>
            @foreach($fields as $field)
            @if ($field=='img')
            <td>
                <div style="background: url('{{ $item->img }}') top/cover no-repeat;" class="crud-image">
            </td>
            @elseif ($field=='text')
            @elseif ($field=='updated_at')
            @else
            <td>{{ $item->$field }}</td>
            @endif
            @endforeach
            <td>

                <form action="{{ route($table . '.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete \n {{ $item->header }} ?')">
                    <div class="row text-center">

                        <div class="col-4">
                            <a class="btn btn-primary" href="{{ route($table . '.edit', $item->id) }}">Edit</a>
                        </div>

                        <div class="col-4">
                            @if ($item->blog=='1')
                            <a class="btn btn-success" href="{{URL::to('/')}}/page/{{$item->id}}">View</a>
                            @endif
                        </div>

                        @csrf
                        @method('DELETE')
                        <div class="col-4">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div class="pagination-container">{{ $data['items']->links() }}</div>
</div>
@extends('pages.admin.footer')