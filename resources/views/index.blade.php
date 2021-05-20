@extends('layouts.index')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @for($i = 0; $i < 48; $i ++)
                <div class="col-md-3 mt-3">
                    <x-blog-card/>
                </div>
            @endfor
        </div>
    </div>
@endsection
