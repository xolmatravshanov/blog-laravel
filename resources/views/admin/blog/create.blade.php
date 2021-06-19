@extends('layouts.admin')


@push('styles')
    <style>

        .content-container {
            margin: 0 auto;
            width: 60%;
        }

        form > div {
            margin-top: 20px;
        }



    </style>
@endpush

@section('content')
    <div class="content-container">
        <h1 class="text-center">Create Blog</h1>
        <form action="{{ route('admin.blog.store') }}" method="post">
            @csrf

            <div>
                <label for="title">Title</label>
                <input
                    type="text"
                    class="form-control"
                    placeholder="Title"
                    required
                >
            </div>

            <div>

                @include('components.common.select2', [
                    'data' => [
                         'name' => 'selectName',
                         'class' => 'selectClass',
                         'items' => $writer_statuses
                        ]
                ])
            </div>

            <div>

                @include('components.common.select2', [
                    'data' => [
                         'name' => 'selectName',
                         'class' => 'selectClass',
                         'items' => $categoriesReturn
                        ]
                ])
            </div>



            <div>
                <button
                    class="btn btn-outline-primary w-100"
                    type="submit">
                    Save
                </button>
            </div>
        </form>
    </div>
@endsection




@push('scripts')
    <script>

    </script>
@endpush
