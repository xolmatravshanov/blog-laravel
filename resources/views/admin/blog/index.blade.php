@extends('layouts.admin')



@section('content')
    {{--    write  html here --}}

    @push('styles')
        <style>

            .actions-icons {
                font-size: 18px;
            }

            .color-danger {
                color: #f50c3b;
            }

            .color-warning {
                color: #1fe00e;
            }

            .color-primary {
                color: #28b0f8;
            }
            

        </style>
    @endpush


    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>
                <button>
                    <i class="fa fa-trash actions-icons" aria-hidden="true"></i>
                </button>
                <button>
                    <i class="fa fa-pencil actions-icons" aria-hidden="true"></i>
                </button>
                <button>
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </button>
            </td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
            <td>
                <button>
                    <i class="fa fa-trash" aria-hidden="true"></i>
                </button>
                <button>
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                </button>
                <button>
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </button>
            </td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
            <td>
                <button>
                    <i class="fa fa-trash" aria-hidden="true"></i>
                </button>
                <button>
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                </button>
                <button>
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </button>
            </td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
            <td>
                <button>
                    <i class="fa fa-trash" aria-hidden="true"></i>
                </button>
                <button>
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                </button>
                <button>
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </button>
            </td>
        </tr>
        </tbody>
    </table>

@endsection

@push('script')
    <script>
        // write script
    </script>
@endpush

