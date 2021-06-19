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
            {{--
                Status
            --}}
            <div>

                @include('components.common.select2', [
                    'data' => [
                         'name' => 'writer_status',
                         'labelText' => 'Status',
                         'class' => 'writer_status',
                         'placeholder' => 'PlaceHolder',
                         'items' => $writer_statuses
                        ]
                ])
            </div>
            {{-- Category --}}
            <div>

                @include('components.common.select2', [
                    'data' => [
                         'name' => 'category',
                         'class' => 'category',
                         'labelText' => 'Category',
                         'items' => $categories
                        ]
                ])

            </div>

            <div>
                @include('components.common.ckeditor')
            </div>

            <div>
                @include('components.common.select2', [
                'data' => [
                     'name' => 'tags',
                     'labelText' => 'Tags',
                     'class' => 'tags',
                     'multiple' => 'multiple',
                     'items' => $tags
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
