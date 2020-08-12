<meta name="twitter:card" content="{{ $card }}" />

<meta property="og:type" content="{{ $type }}">
<meta property="og:title" content="{{ $title }}" />

@if ($description)
    <meta name="description" content="{{ $description }}">
    <meta property="og:description" content="{{ $description }}">
@endif

@if ($image)
    <meta property="og:image" content="{{ $image }}" />
@endif

<meta property="og:url" content="{{ $url }}" />
<meta property="og:locale" content="{{ app()->getLocale() }}" />
