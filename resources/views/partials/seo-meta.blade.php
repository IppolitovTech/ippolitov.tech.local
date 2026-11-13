<title>{{ $seo['title'] }}</title>
<meta name="description" content="{{ $seo['description'] }}">
<meta name="author" content="{{ config('seo.person.name') }}">
<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1">
<link rel="canonical" href="{{ $seo['canonical'] }}">

<!-- Open Graph / link previews -->
<meta property="og:type" content="{{ $seo['type'] }}">
<meta property="og:site_name" content="{{ $seo['site_name'] }}">
<meta property="og:locale" content="{{ $seo['locale'] }}">
<meta property="og:title" content="{{ $seo['title'] }}">
<meta property="og:description" content="{{ $seo['description'] }}">
<meta property="og:url" content="{{ $seo['canonical'] }}">
<meta property="og:image" content="{{ $seo['image'] }}">
@if($seo['type'] == 'article' && $seo['page'])
<meta property="article:published_time" content="{{ date(DATE_ATOM, strtotime($seo['page']['created_at'])) }}">
<meta property="article:modified_time" content="{{ date(DATE_ATOM, strtotime($seo['page']['updated_at'])) }}">
<meta property="article:author" content="{{ config('seo.person.name') }}">
@endif
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="{{ $seo['title'] }}">
<meta name="twitter:description" content="{{ $seo['description'] }}">
<meta name="twitter:image" content="{{ $seo['image'] }}">

<link rel="alternate" type="text/plain" title="LLM summary" href="{{ url('llms.txt') }}">

<script type="application/ld+json">
{!! $seo['json_ld'] !!}
</script>

<!-- Hide the server-rendered copy (partials/seo-content) when JS runs; Vue renders the same content for users -->
<script>document.documentElement.className += ' js';</script>
<style>.js .ssr-content { display: none; }</style>
