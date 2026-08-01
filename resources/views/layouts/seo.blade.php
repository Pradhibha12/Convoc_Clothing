<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="ie=edge" />
<meta name="csrf-token" content="{{ csrf_token() }}" />

{{ config(['app.name' => get_settings('system_title')]) }}

@php
    //print SEO field values from database 'seo_field table', based on current route
    $current_route = Route::currentRouteName();
    $seo_field = App\Models\Seo_field::where('route', $current_route);
    
    if($current_route == 'product' && isset($product)){
        $seo_field->where('item_table', 'products')->where('item_id', $product->id ?? '');
    }
    if($current_route == 'blog_details' && isset($blog_details)){
        $seo_field->where('item_table', 'blogs')->where('item_id', $blog_details->id ?? '');
    }

    $seo_field = $seo_field->firstOrNew();

    // convert keywords JSON to string (if stored as JSON array)
    $keywords = '';
    if (!empty($seo_field->meta_keywords)) {
        $decoded = json_decode($seo_field->meta_keywords, true);
        if (is_array($decoded)) {
            $keywords = collect($decoded)->pluck('value')->implode(', ');
        } else {
            $keywords = $seo_field->meta_keywords;
        }
    }
@endphp

@if (!empty($seo_field['meta_title']))
    <title>{{ $seo_field['meta_title'] }}</title>
@else
    <title>@stack('title') | {{ get_settings('system_title') }}</title>
@endif
<meta name="keywords" content="{{ $keywords ?? '' }}">
<meta name="description" content="{{ $seo_field['meta_description'] ?? '' }}">
<meta name="robots" content="{{ $seo_field['meta_robot'] ?? '' }}">
<link rel="canonical" href="{{ $seo_field['canonical_url'] ?? '' }}" />
<link rel="custom" href="{{ $seo_field['custom_url'] ?? '' }}" />
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-title" content="{{$seo_field['meta_title'] ?? ''}}">

<script type="application/ld+json">{!! $seo_field['json_ld'] !!}</script>

<meta property="og:title" content="{{ $seo_field['og_title'] ?? '' }}" />
<meta property="og:description" content="{{ $seo_field['og_description'] ?? '' }}" />
<meta property="og:image" content="{{ get_image($seo_field['og_image'] ?? '') }}" />
<meta property="og:url" content="{{ url()->current() }}" />
