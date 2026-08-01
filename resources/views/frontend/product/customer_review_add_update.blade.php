<style>
    .radio-md-select-light {
	border-color: var(--borderColor);
}
</style>

@php
    $review = App\Models\Review::where('product_id', $product_id)->where('user_id', auth()->id())->first();

@endphp

@if ($review)
    <h1 class="al-title-24px mb-20px">{{ get_phrase('Update your review') }}</h1>
    <form action="{{ route('customer.product.review.update', ['review_id' => $review->id]) }}" method="post" class="ajaxForm" enctype="multipart/form-data">
        @csrf
        <div class="mb-20px">
            <label class="form-label fsh-form-label mb-3">{{ get_phrase('Rating') }}</label>
            <select name="rating" class="fsh-nice-select radius-lg-select radio-md-select-light float-none max-w-469px">
                <option value="5" @if($review->rating == '5') selected @endif>{{ get_phrase('Five') }}</option>
                <option value="4" @if($review->rating == '4') selected @endif>{{ get_phrase('Four') }}</option>
                <option value="3" @if($review->rating == '3') selected @endif>{{ get_phrase('Three') }}</option>
                <option value="2" @if($review->rating == '2') selected @endif>{{ get_phrase('Two') }}</option>
                <option value="1" @if($review->rating == '1') selected @endif>{{ get_phrase('One') }}</option>
            </select>
        </div>
        <div class="mb-20px">
            <label for="formFileMultiple" class="form-label fsh-form-label mb-3">{{ get_phrase('Add photos') }}</label>
            <input name="review_images[]" class="form-control fsh-form-file" type="file" id="formFileMultiple" accept="image/*" multiple>
        </div>
        <div class="mb-20px">
            <label for="review" class="form-label fsh-form-label mb-3">{{ get_phrase('Review') }}</label>
            <textarea name="comment" class="form-control fsh-form-textarea" id="review" placeholder="Write here...">{{$review->comment}}</textarea>
        </div>
        <button type="submit" class="btn fsh-btn-dark min-w-132px">{{ strtoupper(get_phrase('UPDATE REVIEW')) }}</button>
    </form>
@else
    <h1 class="al-title-24px mb-20px">{{ get_phrase('Add a review') }}</h1>
    <form action="{{ route('customer.product.review.store') }}" method="post" class="ajaxForm" enctype="multipart/form-data">
        @csrf
        <input name="product_id" type="hidden" value="{{ $product_id }}">
        <div class="mb-20px">
            <label class="form-label fsh-form-label mb-3">{{ get_phrase('Rating') }}</label>
            <select name="rating" class="fsh-nice-select radio-md-select-light radius-lg-select float-none max-w-469px">
                <option value="5">{{ get_phrase('Five') }}</option>
                <option value="4">{{ get_phrase('Four') }}</option>
                <option value="3">{{ get_phrase('Three') }}</option>
                <option value="2">{{ get_phrase('Two') }}</option>
                <option value="1">{{ get_phrase('One') }}</option>
            </select>
        </div>
        <div class="mb-20px">
            <label for="formFileMultiple" class="form-label fsh-form-label mb-3">{{ get_phrase('Add photos') }}</label>
            <input name="review_images[]" class="form-control fsh-form-file" type="file" id="formFileMultiple" accept="image/*" multiple>
        </div>
        <div class="mb-20px">
            <label for="review" class="form-label fsh-form-label mb-3">{{ get_phrase('Review') }}</label>
            <textarea name="comment" class="form-control fsh-form-textarea" id="review" placeholder="{{get_phrase('Write here...')}}"></textarea>
        </div>
        <button type="submit" class="btn fsh-btn-dark min-w-132px">{{ strtoupper(get_phrase('SUBMIT')) }}</button>
    </form>
@endif


<script>
'use strict';

initScript();

// Initialize Nice Select manually
$(document).ready(function () {
    if ($('.fsh-nice-select').length) {
        $('.fsh-nice-select').niceSelect('destroy'); // in case it was already initialized
        $('.fsh-nice-select').niceSelect(); // reinitialize
    }
});
</script>
