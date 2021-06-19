@push('styles')

@endpush



@php

@endphp

<div id="editor">
   <p>  Default Text</p>
</div>


@push('script')
    <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>

    <script>

        ClassicEditor
            .create( document.getElementById( 'editor' ) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {

                console.error( error );

            });

    </script>
@endpush
