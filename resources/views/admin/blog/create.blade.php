@extends('layouts.admin')


@push('styles')
    <style>
        .content-container {
            margin: 0 auto;
            width: 60%;
        }
    </style>
@endpush

@section('content')
    <div class="content-container">
        <form action="{{ route('admin.blog.store') }}" method="post">
            @csrf

            <div>
                <label for="title">Title</label>
                <input
                    type="text"
                    class="form-control"
                    placeholder="Title">
            </div>
            <div>
                @include('components.common.select2')
            </div>
        </form>
    </div>
@endsection




@push('scripts')
    <script>

    </script>
@endpush
