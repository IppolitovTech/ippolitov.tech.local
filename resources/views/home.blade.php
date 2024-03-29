@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}

                </div>

            </div>
            <div class="row  mt-3">
                <div class="col">
                    <a class="btn btn-primary" href="/admin/portfolio"> Edit Portfolio</a>
                </div>
                <div class="col">
                    <a class="btn btn-primary" href="/admin/page"> Edit Pages </a>
                </div>
                <div class="col">
                    <a class="btn btn-primary" href="{{route('home')}}"> Home </a>
                </div>
            </div>           
        </div>
    </div>
</div>
@endsection