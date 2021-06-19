@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
@endpush


@php

    if(!isset($data)){
            $data = [
                'name' => 'selectName',
                'class' => 'selectClass',
                'items' => [
                    'uz' => 'Uzbekistan',
                    'us' => 'Unitet State'
                ]
        ];
    }
@endphp

<select name="{{ $data['name'] }}" class="{{ $data['class'] }} form-control">

    @foreach($data['items'] as $key => $item)
        <option value="{{ $key }}">{{ $item }}</option>
    @endforeach

</select>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.selectClass').select2();
        });
    </script>
@endpush
