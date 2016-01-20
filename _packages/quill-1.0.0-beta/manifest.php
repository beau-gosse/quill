<?php return array (
  'manifest-version' => '1.1',
  'manifest-attributes' => 
  array (
    'license' => 'The MIT License (MIT)

Copyright (c) 2016 Treigh PM

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
',
    'readme' => '# Quill
Version: 1.0.0 Beta
![Introducing Quill](http://cdn.kleverr.com/pjx/quill/img/demo/quill-screenshot-10.jpg)

Quill is a sleek, modern and _clutter-free_ blog theme for [MODX](http://modx.com) that offers a more immersive reading experience. In just a few clicks, you\'ll have a fully functioning blog—thanks to MODX package dependencies.

## Demo
Quill is best previewed on the following pages:
1. [Live demo blog](http://quill.kleverr.modxcloud.com)
2. [Pattern Library](http://quill.kleverr.modxcloud.com/pattern-library/)
3. [Flight Manual](http://quill.kleverr.modxcloud.com/flight-manual/)

## Who is it for?
Quill is a One-Stop blogging solution for MODX that\'s designed to quickly get you in writing mode. By taking care of the heavy lifting, it allows you to focus on what matters most to you: Publishing your thoughts.

## Requirements

**MODX 2.4+** (Quill [installs](http://quill.kleverr.modxcloud.com/flight-manual/) required extras via package dependencies)

## Installation

1. [Download](http://modx.com/extras/package/quill) Quill via Package Management.
2. Click Install and follow the instructions.
3. Clear Cache.
4. Turn on Friendly URLs.

## Getting Started

- Visit Quill\'s official [documentation](http://quill.kleverr.modxcloud.com/flight-manual) to get started.
- Check out Quill\'s [Pattern Library](http://c0028.paas2.tx.modxcloud.com/introducing-quill/) for a complete style guide

## Included Extras

Quill installs the following extras to get things running:

- Collections
- Tagger
- pdoTools
- Archivist
- SimpleSearch
- ClientConfig
- If
- getUrlParam
- Rowboat
- Gravatar

## Main Features
![Image of a sample blog post themed by Quill](http://cdn.kleverr.com/pjx/quill/img/demo/quill-shot-9.png)

- Easily Customizable within the manager
- Dedicated content layouts (Home, Post, Author, Topic, Search, Sections, Fluid)
- Optional dedicated pages (Archives, Sections, Topics, search, RSS, Sitemap, 404 Error page, Unavailable page)
- Faster page load times (via efficient caching, minification, fewer HTTP Requests, image/Disqus lazy loading, CDN usage, etc.)
- Read time info
- Pattern library for style references
- Clean, intuitive well-structured and well-commented markup
- Fully commented Sass source files
- Syntax highlighting (Prism.js)
- Built with Bootstrap V4 (alpha)
- Suggested posts
- Widgets: Newsletter signup form, Social share links, side notes, etc.
- Optional featured images
- SEO-optimized
- Cross-Browser Compatibility: Chrome, FF, Safari, Edge, Opera, IE9+
- 100% Responsive

## Credits

Quill wouldn\'t be possible without these very useful assets:

- [JQuery](http://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js)
- [Bootstrap](http://v4-alpha.getbootstrap.com/)
- [Unveil.js](http://luis-almeida.github.io/unveil/)
- [Prism.js](http://prismjs.com/)
- Reading Time by [Michael Lynch](http://michaelynch.com/)
- [Disqus](http://c0028.paas2.tx.modxcloud.com/disqus.com)
- [SVG Icons](http://c0028.paas2.tx.modxcloud.com/svgicons.sparkk.fr)

Special thanks to MODX\'s John Peca (@theboxer) and Wayne Roddy (@dubROD) for the for the groundwork. Flatso theme and Git Package Management were invaluable when developing Quill.

- Pattern library for style references
- Clean, intuitive well-structured and well-commented markup
- Fully commented Sass source files
- Syntax highlighting (Prism.js)
- Built with Bootstrap V4 (alpha)
- Suggested posts
- Widgets: Newsletter signup form, Social share links, side notes, etc.
- Optional featured images
- SEO-optimized
- Cross-Browser Compatibility: Chrome, FF, Safari, Edge, Opera, IE9+
- 100% Responsive

## Credits

Quill wouldn\'t be possible without these very useful assets:

- [JQuery](http://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js)
- [Bootstrap](http://v4-alpha.getbootstrap.com/)
- [Unveil.js](http://luis-almeida.github.io/unveil/)
- [Prism.js](http://prismjs.com/)
- Reading Time by [Michael Lynch](http://michaelynch.com/)
- [Disqus](http://c0028.paas2.tx.modxcloud.com/disqus.com)
- [SVG Icons](http://c0028.paas2.tx.modxcloud.com/svgicons.sparkk.fr)

Special thanks to MODX\'s John Peca (@theboxer) and Wayne Roddy (@dubROD) for the for the groundwork. Flatso theme and Git Package Management were invaluable when developing Quill. Shout-out to @donshakespeare for intensively testing out Quill\'s initial Beta release.
',
    'changelog' => 'Changelog file for Quill extra.

# Quill 1.0.0-beta (January 17, 2016)
===================================

- Initial release
',
    'setup-options' => 'quill-1.0.0-beta/setup-options.php',
    'requires' => 
    array (
      'collections' => '>=3.2.0',
      'tagger' => '>=1.7.0',
      'pdotools' => '>=2.2.0',
      'archivist' => '>=1.2.0',
      'simplesearch' => '>=1.9.0',
      'if' => '>=1.1.0',
      'geturlparam' => '>=1.0',
      'clientconfig' => '>=1.3.0',
      'rowboat' => '>=1.1.0',
      'gravatar' => '>=2.0',
    ),
  ),
  'manifest-vehicles' => 
  array (
    0 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modNamespace',
      'guid' => '9d7757a989346645aa9c7cdeef38c3a4',
      'native_key' => 'quill',
      'filename' => 'modNamespace/202bcfd3cc75ac00ff253baf95e66f5f.vehicle',
      'namespace' => 'quill',
    ),
    1 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '0e23f23aae383cb1b04d763d4733f1f8',
      'native_key' => 'quill.doc_container',
      'filename' => 'modSystemSetting/197422b20b9fc6b1ef68fdeccdb80fb8.vehicle',
      'namespace' => 'quill',
    ),
    2 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '9308544af691b0041bf54235e4da3a9b',
      'native_key' => 'quill.blog_container',
      'filename' => 'modSystemSetting/4cb4123dc5bbda7f6de6b79ca69f07d8.vehicle',
      'namespace' => 'quill',
    ),
    3 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'cb6585d2c5f0dfdecce2c1e918960b8b',
      'native_key' => 'quill.sections_page',
      'filename' => 'modSystemSetting/e7d16d003f5793c7c3bf66b7a01bec69.vehicle',
      'namespace' => 'quill',
    ),
    4 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'fe8e259c6d44b30533d057ae8125169c',
      'native_key' => 'quill.topics_page',
      'filename' => 'modSystemSetting/56f033f624032c5fd42921c1d309a528.vehicle',
      'namespace' => 'quill',
    ),
    5 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'baa7efcd928af6b82f8e841a4476d27b',
      'native_key' => 'quill.authors_page',
      'filename' => 'modSystemSetting/59703dab0a10fa5d871cfb3fa9bd1870.vehicle',
      'namespace' => 'quill',
    ),
    6 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '4a63ef2dd2cd7f4a4b631d8440fd8cdd',
      'native_key' => 'quill.archives_page',
      'filename' => 'modSystemSetting/fe544967a5f9e66cbe2695e917fcd829.vehicle',
      'namespace' => 'quill',
    ),
    7 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '5e96257310ee7684619307ddfec4e2c6',
      'native_key' => 'quill.default_author_page',
      'filename' => 'modSystemSetting/7371462380afe376c60f557434460ad0.vehicle',
      'namespace' => 'quill',
    ),
    8 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '28e6722635fe5e123b455624a7034ecf',
      'native_key' => 'quill.search_page',
      'filename' => 'modSystemSetting/424f82d1766351affa70c6c84fbcd713.vehicle',
      'namespace' => 'quill',
    ),
    9 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'a1c94c19f0cbbcd6ab56d2808c0cbf63',
      'native_key' => 'quill.rss_page',
      'filename' => 'modSystemSetting/5ee94ec044df3d9d879a8ee36615a395.vehicle',
      'namespace' => 'quill',
    ),
    10 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modCategory',
      'guid' => 'a8352d41f7ca31698ddddd0717f41752',
      'native_key' => NULL,
      'filename' => 'modCategory/ad2881b2863b4fc59ad8713f0f66229a.vehicle',
      'namespace' => 'quill',
    ),
  ),
);