@extends('layouts.admin')
@push('title', get_phrase(' Edit language phrases '))
@push('meta')@endpush
@push('css')@endpush
@section('content')
<style>
    .h-48{
        height: 48px !important;
    }
</style>
  

    <div class="row mt-4">
        <div class="col-8">
            <div class="alert alert-primary" role="alert">
                {{get_phrase('The symbol ___ represents dynamic values that will be replaced dynamically. So, do not remove the ___ symbol.')}}
            </div>
        </div>
        <div class="col-4 d-flex justify-content-end ">
            <a href="{{ route('admin.languages') }}" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px h-48">
                    <span class="fi-rr-arrow-alt-left"></span>
                    <span>{{ get_phrase('Back') }}</span>
                </a>
        </div>
        @foreach ($language_phrases as $phrase)
            <div class="col-md-4 mb-3">
                <div class="ol-card p-4">
                    <div class="ol-card-body">
                        <label class="ol-form-label" for="translated_phrase_{{ $phrase->id }}">{{ $phrase->phrase }}</label>
                        <input type="text" id="translated_phrase_{{ $phrase->id }}" value="{{ $phrase->translated }}" class="form-control ol-form-control">
                        <button type="button" onclick="updatePhrase({{ $phrase->id }})" class="btn ol-btn-primary mt-3">{{ get_phrase('Update') }}</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
@push('js')
    <script type="text/javascript">
        "use strict";

        function updatePhrase(phrase_id) {
            var translated_phrase = $('#translated_phrase_' + phrase_id).val();
            $.ajax({
                type: "POST",
                url: `{{ route('admin.language.phrase.update') }}/${phrase_id}`,
                data: {
                    translated_phrase: translated_phrase
                },
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(response) {
                    if(response == 1){
                        success("{{ get_phrase('Phrase updated successfully') }}");
                    }else{
                        error("{{ get_phrase('Something is wrong') }}");
                    }
                }
            });
        }
    </script>
@endpush
