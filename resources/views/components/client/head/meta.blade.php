@props([
'title',
'description',
'url',
'snippet' => null,
'ogTitle' => null,
'ampUrl' => null,
'indexing' => true,
'clearTitle' => false
])

<title>{{ $title }} | {{ config('app.name') }}</title>

<link rel="canonical" href="{{ $url }}" />

@if($ampUrl)
    <link rel="amphtml" href="{{ $ampUrl }}">
@endif

@unless($indexing)
    <meta name="robots" content="noindex" />
@endif

<meta name="title" content="{{ $title }}">
<meta name="description" content="{{ $description }}">

<meta property="fb:app_id" content="{{ config('services.facebook.client_id') }}" />
<meta property="fb:pages" content="{{ config('services.facebook.pages') }}" />

<meta property="og:type" content="website">
<meta property="og:url" content="{{ $url }}">
<meta property="og:title" content="{{ $ogTitle ?: $title }}">
<meta property="og:description" content="{{ $description }}">

<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ $url }}">
<meta property="twitter:title" content="{{ $ogTitle ?: $title }}">
<meta property="twitter:description" content="{{ $description }}">

@if($snippet)

    <meta property="og:image" content="{{ $snippet }}">
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:url" content="{{ $snippet }}">
    <meta property="og:image:secure_url" content="{{ $snippet }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="twitter:image" content="{{ $snippet }}">
    <link rel="image_src" href="{{ $snippet }}"/>

@endif
