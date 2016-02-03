<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>[[*pagetitle]]</title>
[[If?
  &subject=`[[*parent]]`
  &operand=`[[++quill.blog_container]]`
  &then=`<meta name="description" content="[[*introtext:striptags:ellipsis=`155`]]">`
  &else=`<meta name="description" content="[[*description:striptags:ellipsis=`155`]]">`
]]
<base href="[[++site_url]]" itemprop="url">
<!-- DNS Prefetching -->
<meta http-equiv="x-dns-prefetch-control" content="on">
<link href="http://cdn.kleverr.com" rel="dns-prefetch">
<link href="//cdn.rawgit.com" rel="dns-prefetch">
<link href="//cdnjs.cloudflare.com" rel="dns-prefetch">
<link href="//disqus.com" rel="dns-prefetch">
<link href="//fonts.googleapis.com" rel="dns-prefetch">
<link href="//ssl.google-analytics.com" rel="dns-prefetch">
<link href="http://www.gravatar.com" rel="dns-prefetch">
<!-- CSS -->
<link href="[[++quill_css]]" rel="stylesheet">

<!--[if lt IE 9]>
  <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<link rel="canonical" href="[[~[[*id]]? &scheme=`full`]]">
<meta property="og:title" content="[[*pagetitle]]">
<meta property="og:description" content="[[*description:striptags:default=`[[*introtext]]`]]">
<meta property="og:url" content="[[~[[*id]]? &scheme=`full`]]">
<meta property="og:image" content="[[++site_url]][[*qllFeaturedImage]]">
<!-- Favicon -->
<link href="[[++quill_favicon]]" rel="icon" type="[[++quill_favicon_type]]">
