<?php
/**
 *
 * Resolve Resources
 *
 * THIS RESOLVER IS AUTOMATICALLY GENERATED, NO CHANGES WILL APPLY
 *
 * @package quill
 * @subpackage build
 */

if (!$object->xpdo) return false;
/** @var modX $modx */
$modx =& $object->xpdo;

if (!function_exists('getResourceMap')) {
    function getResourceMap() {
        global $modx;

        $assetsPath = rtrim($modx->getOption('quill.assets_path',null,$modx->getOption('assets_path').'components/quill/'), '/') . '/';
        $rmf = $assetsPath . 'resourcemap.php';

        if (is_readable($rmf)) {
            $map = include $rmf;
        } else {
            $map = array();
        }

        return $map;
    }
}

if (!function_exists('setResourceMap')) {
    function setResourceMap($resourceMap) {
        global $modx;

        $assetsPath = rtrim($modx->getOption('quill.assets_path',null,$modx->getOption('assets_path').'components/quill/'), '/') . '/';
        $rmf = $assetsPath . 'resourcemap.php';
        file_put_contents($rmf, '<?php return ' . var_export($resourceMap, true) . ';');

    }
}

if (!function_exists('createResource')) {
    function createResource($resource) {
        global $modx;

        if (isset($resource['tvs'])) {
            $tvs = $resource['tvs'];
            unset($resource['tvs']);
        } else {
            $tvs = array();
        }

        $res = $modx->runProcessor('resource/create', $resource);
        $resObject = $res->getObject();

        if ($resObject && isset($resObject['id'])) {
            /** @var modResource $modResource */
            $modResource = $modx->getObject('modResource', array('id' => $resObject['id']));

            if ($modResource) {
                foreach ($tvs as $tv) {
                    $modResource->setTVValue($tv['name'], $tv['value']);
                }

                return $modResource->id;
            }
        }

        return false;
    }
}

if (!function_exists('updateResource')) {
    function updateResource($resource) {
        global $modx;

        if (isset($resource['tvs'])) {
            $tvs = $resource['tvs'];
            unset($resource['tvs']);
        } else {
            $tvs = array();
        }

        $res = $modx->runProcessor('resource/update', $resource);
        $resObject = $res->getObject();

        if ($resObject && isset($resObject['id'])) {
            /** @var modResource $modResource */
            $modResource = $modx->getObject('modResource', array('id' => $resObject['id']));

            if ($modResource) {
                foreach ($tvs as $tv) {
                    $modResource->setTVValue($tv['name'], $tv['value']);
                }

                return $modResource->id;
            }
        }

        return false;
    }
}

switch ($options[xPDOTransport::PACKAGE_ACTION]) {
    case xPDOTransport::ACTION_INSTALL:
    case xPDOTransport::ACTION_UPGRADE:
        $resources = array (
  0 => 
  array (
    'pagetitle' => 'Quill',
    'alias' => 'quill',
    'parent' => 0,
    'content' => '[[-
 This container is only used to group Quill\'s blog resources
 to avoid any possible name conflicts with your existing resources.
 We recommend that you move Quill\'s resources to the top level of the site tree
 once you\'ve resolved any name conflicts you may have.

 If you prefer to keep your Quill blog on a separate directory, then the current
 setup is perfect.
]]
',
    'context_key' => 'web',
    'class_key' => 'SelectionContainer',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 1,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Quill',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
      'qllPageLayout' => 
      array (
        'name' => 'qllPageLayout',
        'value' => '[[$qllFullLayout]]',
      ),
    ),
    'template' => 'Quill',
    'published' => 1,
    'richtext' => 0,
  ),
  1 => 
  array (
    'pagetitle' => 'Blog',
    'alias' => 'blog',
    'parent' => 'Quill',
    'content' => '[[!pdoPage?
  &select=`{"modResource":"id,pagetitle,introtext,publishedon,createdby"}`
  &parents=`[[++quill.blog_container]]`
  &tpl=`qllPostTpl`
  &scheme=`full`
  &sortby=`publishedon`
  &limit=`10`
  &sortdir=`DESC`
  &includeTVs=`qllFeaturedImage`
  &tplPageWrapper=`qllPageWrapperTpl`
  &tplPage=`qllPageTpl`
  &tplPageActive=`qllPageActiveTpl`
  &tplPagePrev=`qllPagePrevTpl`
  &tplPageNext=`qllPageNextTpl`
  &tplPagePrevEmpty=``
  &tplPageNextEmpty=``
]]
',
    'context_key' => 'web',
    'class_key' => 'CollectionContainer',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 1,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Quill Blog',
    'hide_children_in_tree' => 1,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
      'qllPageLayout' => 
      array (
        'name' => 'qllPageLayout',
        'value' => '[[$qllHomeLayout]]',
      ),
    ),
    'template' => 'Quill',
    'published' => 1,
    'richtext' => 0,
  ),
  2 => 
  array (
    'pagetitle' => 'Sections',
    'alias' => 'sections',
    'parent' => 'Quill',
    'content' => '[[- The default listing limit is 10]]
[[!pdoPage?
  &where=`[[!TaggerGetResourcesWhere? &groups=`[[++quill_section_group]]`]]`
  &select=`{"modResource":"id,pagetitle,introtext,publishedon,createdby"}`
  &parents=`[[++quill.blog_container]]`
  &tpl=`qllPostTpl`
  &scheme=`full`
  &sortby=`publishedon`
  &sortdir=`DESC`
  &includeTVs=`qllFeaturedImage`
  &tplPageWrapper=`qllPageWrapperTpl`
  &tplPage=`qllPageTpl`
  &tplPageActive=`qllPageActiveTpl`
  &tplPagePrev=`qllPagePrevTpl`
  &tplPageNext=`qllPageNextTpl`
  &tplPagePrevEmpty=``
  &tplPageNextEmpty=``
]]
',
    'context_key' => 'web',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 1,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Sections',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
      'qllPageLayout' => 
      array (
        'name' => 'qllPageLayout',
        'value' => '[[$qllSectionLayout]]',
      ),
      'qllLeftFloatbar' => 
      array (
        'name' => 'qllLeftFloatbar',
        'value' => '[[$qllSidePopularTopics]]',
      ),
    ),
    'template' => 'Quill',
    'published' => 1,
    'richtext' => 0,
  ),
  3 => 
  array (
    'pagetitle' => 'Thoughts',
    'alias' => 'thoughts',
    'parent' => 'Sections',
    'content' => '[[- The default listing limit is 10]]
[[!pdoPage?
  &where=`[[!TaggerGetResourcesWhere? &groups=`[[++quill_section_group]]` &tags=`Thoughts`]]`
  &select=`{"modResource":"id,pagetitle,introtext,publishedon,createdby"}`
  &parents=`[[++quill.blog_container]]`
  &tpl=`qllPostTpl`
  &scheme=`full`
  &sortby=`publishedon`
  &sortdir=`DESC`
  &includeTVs=`qllFeaturedImage`
  &tplPageWrapper=`qllPageWrapperTpl`
  &tplPage=`qllPageTpl`
  &tplPageActive=`qllPageActiveTpl`
  &tplPagePrev=`qllPagePrevTpl`
  &tplPageNext=`qllPageNextTpl`
  &tplPagePrevEmpty=``
  &tplPageNextEmpty=``
]]
',
    'context_key' => 'web',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => 'General thoughts and opinions.',
    'isfolder' => 1,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Sections',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
      'qllPageLayout' => 
      array (
        'name' => 'qllPageLayout',
        'value' => '[[$qllSectionLayout]]',
      ),
    ),
    'template' => 'Quill',
    'published' => 1,
    'richtext' => 0,
  ),
  4 => 
  array (
    'pagetitle' => 'Experiments',
    'alias' => 'experiments',
    'parent' => 'Sections',
    'content' => '[[- The default listing limit is 10]]
[[!pdoPage:default=`<p class="text-center">We swear, we\'ll have fresh content on your next visit.</p>`?
  &where=`[[!TaggerGetResourcesWhere? &groups=`[[++quill_section_group]]` &tags=`Experiments`]]`
  &select=`{"modResource":"id,pagetitle,introtext,publishedon,createdby"}`
  &parents=`[[++quill.blog_container]]`
  &tpl=`qllPostTpl`
  &scheme=`full`
  &sortby=`publishedon`
  &sortdir=`DESC`
  &includeTVs=`qllFeaturedImage`
  &tplPageWrapper=`qllPageWrapperTpl`
  &tplPage=`qllPageTpl`
  &tplPageActive=`qllPageActiveTpl`
  &tplPagePrev=`qllPagePrevTpl`
  &tplPageNext=`qllPageNextTpl`
  &tplPagePrevEmpty=``
  &tplPageNextEmpty=``
]]
',
    'context_key' => 'web',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => 'Tips, tricks and other toxic stuff.',
    'isfolder' => 1,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Experiments',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
      'qllPageLayout' => 
      array (
        'name' => 'qllPageLayout',
        'value' => '[[$qllSectionLayout]]',
      ),
    ),
    'template' => 'Quill',
    'published' => 1,
    'richtext' => 0,
  ),
  5 => 
  array (
    'pagetitle' => 'Topics',
    'alias' => 'topics',
    'parent' => 'Quill',
    'content' => '[[- The default listing limit is 10]]
[[!pdoPage?
  &where=`[[!TaggerGetResourcesWhere? &groups=`[[++quill_topic_group]]`]]`
  &select=`{"modResource":"id,pagetitle,introtext,publishedon,createdby"}`
  &parents=`[[++quill.blog_container]]`
  &tpl=`qllPostTpl`
  &scheme=`full`
  &sortby=`publishedon`
  &sortdir=`DESC`
  &includeTVs=`qllFeaturedImage`
  &tplPageWrapper=`qllPageWrapperTpl`
  &tplPage=`qllPageTpl`
  &tplPageActive=`qllPageActiveTpl`
  &tplPagePrev=`qllPagePrevTpl`
  &tplPageNext=`qllPageNextTpl`
  &tplPagePrevEmpty=``
  &tplPageNextEmpty=``
]]
',
    'context_key' => 'web',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => 'Showing posts filed under: <strong>[[!getUrlParam? &name=`key` &default=`All topics`]]</strong> ([[+page.total]])',
    'isfolder' => 1,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Topics',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
      'qllPageLayout' => 
      array (
        'name' => 'qllPageLayout',
        'value' => '[[$qllSectionLayout]]',
      ),
    ),
    'template' => 'Quill',
    'published' => 1,
    'richtext' => 0,
  ),
  6 => 
  array (
    'pagetitle' => 'Authors',
    'alias' => 'authors',
    'parent' => 'Quill',
    'content' => '[[- Anything entered here will be shown before the list of articles
from all authors. See $qllAuthorLayout for more info]]
',
    'context_key' => 'web',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 1,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Authors',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
      'qllPageLayout' => 
      array (
        'name' => 'qllPageLayout',
        'value' => '[[$qllAuthorLayout]]',
      ),
      'qllLeftFloatbar' => 
      array (
        'name' => 'qllLeftFloatbar',
        'value' => '[[$qllFloatbarCard? &title=`Write for us.` &content=`We think you have what it takes to write a captivating novel. Be one of us.` &link=`[[++site_url]]` &linkTitle=`Let\'s talk` ]]',
      ),
    ),
    'template' => 'Quill',
    'published' => 1,
    'richtext' => 0,
  ),
  7 => 
  array (
    'pagetitle' => 'Default Author',
    'alias' => 'default-author',
    'parent' => 'Authors',
    'content' => '',
    'context_key' => 'web',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 1,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
      'qllPageLayout' => 
      array (
        'name' => 'qllPageLayout',
        'value' => '[[$qllAuthorLayout]]',
      ),
      'qllAuthor' => 
      array (
        'name' => 'qllAuthor',
        'value' => '',
      ),
    ),
    'template' => 'Quill',
    'published' => 1,
    'richtext' => 0,
  ),
  8 => 
  array (
    'pagetitle' => 'Archives',
    'alias' => 'archives',
    'parent' => 'Quill',
    'content' => '[[!pdoPage?
  &element=`getArchives`
  &grSnippet=`pdoResources`
  &tpl=`qllArchiveTpl`
  &hideContainers=`1`
  &pageVarKey=`page`
  &parents=`[[++quill.blog_container]]`
  &includeTVs=`qllFeaturedImage`
  &toPlaceholder=`archives`
  &limit=`10`
  &cache=`0`
  &tplPageWrapper=`@INLINE <ul class="pager">[[+prev]][[+next]]</ul>`
  &tplPage=`@INLINE <li><a href="[[+href]]">[[+pageNo]]</a></li>`
  &tplPagePrev=`@INLINE <li><a href="[[+href]]">&larr; Previous</a></li>`
  &tplPageNext=`@INLINE <li><a href="[[+href]]">Next &rarr;</a></li>`
  &tplPagePrevEmpty=``
  &tplPageNextEmpty=``
]]
[[+archives:default=`<p class="text-sm-center">There are currently no articles in the Archives. Please check back soon.</p>`]]
',
    'context_key' => 'web',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '[[+arc_month_name]] [[+arc_year]]',
    'isfolder' => 1,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Archives',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
      'qllPageLayout' => 
      array (
        'name' => 'qllPageLayout',
        'value' => '[[$qllSectionLayout]]',
      ),
      'qllLeftFloatbar' => 
      array (
        'name' => 'qllLeftFloatbar',
        'value' => '[[$qllArchives]]',
      ),
    ),
    'template' => 'Quill',
    'published' => 1,
    'richtext' => 0,
  ),
  9 => 
  array (
    'pagetitle' => 'Pattern Library',
    'alias' => 'pattern-library',
    'parent' => 'Quill',
    'content' => '<!-- Intro -->
<section>
  <div class="container body-spacer">
    <!-- Left floatbar widgets -->
    <aside class="floatbar-left">
      [[*qllLeftFloatbar]]
    </aside>
    <!-- /.Left floatbar widgets -->
    <!-- Right floatbar widgets -->
    <aside class="floatbar-right">
      [[*qllRightFloatbar]]
    </aside>
    <!-- /.Right floatbar widgets -->
    <div class="row center-content">
    <header class="content-col-half">
      <h1 class="article-header" itemprop="headline">Introducing Quill</h1>
      <figure class="figure center-block" itemprop="author" itemscope="" itemtype="http://schema.org/Person">
        <img data-src="[[++quill_logo]]" width="128" class="img-circle center-block profile-img" alt="Quill Flightfeather" itemprop="image">
        <figcaption class="top-spacer">
          <h2 class="subtitle">The MODX theme for code poets.</2>
        </figcaption>
      </figure>
    </header>
    <!-- Carousel -->
    <div id="screenshots" class="content-col top-spacer demo-carousel carousel slide" data-ride="carousel">
      <figure class="figure center-block carousel-inner" role="listbox">
          <div class="carousel-item active">
            <img src="http://cdn.kleverr.com/pjx/quill/img/demo/quill-screenshot-medium.png" width="824" class="img-fluid" alt="Quill Flightfeather">
          </div>
          <div class="carousel-item">
            <img data-src="http://cdn.kleverr.com/pjx/quill/img/demo/quill-shot-9.png" width="824" class="img-fluid" alt="Quill Flightfeather">
          </div>
          <div class="carousel-item">
            <img data-src="http://cdn.kleverr.com/pjx/quill/img/demo/quill-shot-7.png" width="824" class="img-fluid" alt="Quill Flightfeather">
          </div>
      </figure>
      <p class=" top-spacer">
        <a href="[[++quill_demo_url]]" class="btn btn-primary btn-lg" target="_blank">See it in action</a>
      </p>
      <ol class="carousel-indicators">
        <li data-target="#screenshots" data-slide-to="0" class="active"></li>
        <li data-target="#screenshots" data-slide-to="1"></li>
        <li data-target="#screenshots" data-slide-to="2"></li>
      </ol>
    </div>
    <!-- /.Carousel -->
  </div>
  </div>
</section>
<!-- /.Intro -->

<!-- About Quill -->
  <section id="intro" class="container-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="content-col v-spacer center-content">
          <h2 class="headline">Impeccably crafted.</h2>
          <p class="lead">
            Quill is a sleek, modern and <span class="underline-primary">clutter-free</span> theme that offers a more immersive reading experience. Beyond aesthetics, Quill is <em>content-focused</em>. This means less noise and higher engagement. This responsive blog theme for <a href="http://modx.com">MODX</a> is perfect for those with shareable thoughts.
          </p>
          <p>
            <a href="[[++quill_demo_url]]/flight-manual" class="btn btn-link" target="_blank">Read the Flight Manual</a>
            <a href="#features" class="btn btn-link" data-toggle="collapse" aria-expanded="false" aria-controls="features">
              Full Feature List
            </a>
        </p>
        </div>
      </div>
    </div>
    <!-- Features -->
<div id="features" class="container-fluid collapse">
  <div class="row">
    <div class="content-col center-content">
      <hr>
      <header class="hgroup">
        <h2 class="hgroup-title">Features</h2>
        <h2 class="hgroup-subtitle">Designed for optimal ease of use</h2>
      </header>
      <div class="block-note">
          <p>Quill is built on top of Bootstrap [[++quill_bootstrap_version]]. Naturally, all your favourite Bootstrap component and element styles will be available for you to use. But, Quill goes beyond the basics by extending Bootstrap and adding some custom styles of its own&mdash;making it a truly distinctive theme.</p>
      </div>
      <h4>At a Glance:</h4>
      <ul class="list-unstyled">
        <li>HTML5/CSS3</li>
        <li>SEO-optimized</li>
        <li>Cross-Browser Compatibility: Chrome, FF, Safari, Edge, Opera, IE9+</li>
        <li>100% Responsive</li>
        <li>Easy install / Detailed documentation</li>
        <li>Easily Customizable within the manager</li>
        <li>One template, unlimited possibilities</li>
        <li>Dedicated content layouts (Home, Post, Author, Topic, Sections, Fluid)</li>
        <li>Optional dedicated pages (Archives, Sections, Topics, search, RSS, Sitemap, 404 Error page, maintenance page)</li>
        <li>Faster page load times (via efficient caching, minification, fewer HTTP Requests, image/Disqus lazy loading, CDN usage, etc.)</li>

        <li>Read time info</li>
        <li>Pattern library for style references</li>
        <li>Clean, intuitive well-structured and well-commented markup</li>
        <li>Fully commented Sass source files</li>
        <li>Syntax highlighting (Prism.js)</li>
        <li>Built with <a href="[[++quill_bootstrap_url]]" target="_blank" rel="nofollow">Bootstrap [[++quill_bootstrap_version]]</a></li>

        <li>Suggested posts</li>
        <li>Widgets: Newsletter signup form, Social share links, side notes, etc.</li>
        <li>Optional featured images</li>
        <li>Custom snippets</li>

        <li>Compatible with <a href="http://modx.com/download/" target="_blanl">MODX 2.4+</a></li>
        <li>And more …</li>
      </ul>
      <h2 class="top-spacer">Third party assets</h2>
      <p class="text-sans">
        Quill wouldn\'t be possible without these very useful assets:
      </p>
      <ul class="list-inline">
        <li class="list-inline-item"><a href="http://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js" target="_blank" rel="nofollow">JQuery</a></li>
        <li class="list-inline-item"><a href="[[++quill_bootstrap_url]]" target="_blank" rel="nofollow">Bootstrap</a></li>
        <li class="list-inline-item"><a href="http://luis-almeida.github.io/unveil/" target="_blank" rel="nofollow">Unveil.js</a></li>
        <li class="list-inline-item"><a href="http://prismjs.com/" target="_blank" rel="nofollow">Prism.js</a></li>
        <li class="list-inline-item">Reading Time by <a href="http://michaelynch.com" target="_blank" rel="nofollow">Michael Lynch</a></li>
        <li class="list-inline-item"><a href="disqus.com" target="_blank" rel="nofollow">Disqus</a></li>
        <li class="list-inline-item"><a href="svgicons.sparkk.fr" target="_blank" rel="nofollow">SVG Icons</a></li>
      </ul>
      </ul>
    </div>
  </div>
</div>
<!-- /.Features -->
  </section>
<!-- /.About Quill -->

<!-- Typography -->
  <section class="container-wrapper">
    <div class="container-fluid">
        <h2 class="text-thick text-primary top-spacer">Pattern library</h2>
      <aside class="share-block section-nav">
        <!-- Table of content -->
        <nav id="toc" class="text-sans" role="navigation"></nav>
        <!-- /. Table of content -->
      </aside>
      <h3 id="typography" class="top-spacer">Typography</h3>
      <div class="row">
        <article class="content-col">
          <section class="v-spacer">
            <h4 class="h3 section-title has-hr">Fonts</h4>
            <p class="text-sans">
              Heading font: Lato, "Helvetica Neue", Helvetica, Arial, sans-serif.
            </p>
            <p class="text-sans">
              <em>Heading font italic: Lato, "Helvetica Neue", Helvetica, Arial, sans-serif.</em>
            </p>
            <p class="text-sans">
              <strong>Heading font bold: Lato, "Helvetica Neue", Helvetica, Arial, sans-serif.</strong>
            </p>
            <p>
              Body text font: Georgia, "Times New Roman", Times, serif.
            </p>
            <p>
              <em>Body text font italic: Georgia, "Times New Roman", Times, serif.</em>
            </p>
            <p>
              <strong>Body text font bold: Georgia, "Times New Roman", Times, serif.</strong>
            </p>
            <p class="text-mono">
              Meta text font: Menlo, Monaco, Consolas, "Courier New", monospace.
            </p>
            <p class="text-mono">
              <em>Meta text font italic: Menlo, Monaco, Consolas, "Courier New", monospace.</em>
            </p>
            <p class="text-mono">
              <strong>Meta text font bold: Menlo, Monaco, Consolas, "Courier New", monospace.</strong>
            </p>
          </section>
          <section class="v-spacer">
            <h3 class="section-title has-hr block-spacer">Headings</h3>
            <h1>H1: The quick brown fox jumps over the …</h1>
            <h2 class="top-spacer-off">H2: The quick brown fox jumps over the lazy dog</h2>
            <h3 class="top-spacer-off">H3: The quick brown fox jumps over the lazy dog</h3>
            <h4 class="top-spacer-off">H3: The quick brown fox jumps over the lazy dog</h4>
            <h5>H5: The quick brown fox jumps over the lazy dog</h5>
            <h6>H6: The quick brown fox jumps over the lazy dog</h6>
          </section>
          <section class="v-spacer hgroup">
            <h3 class="section-title has-hr block-spacer">Heading group</h3>
            <h2 class="hrgroup-title">This is the title</h2>
            <h3 class="hgroup-subtitle">This is the subtitle.</h3>
          </section>
          <section class="v-spacer main-content">
            <h3 class="section-title has-hr block-spacer">Paragraph (Make a paragraph stand out by adding
              <code>.lead</code>)</h3>
            <p class="lead">Jason Coward, Lead Architect of <a href="http://modx.com">MODX CMS</a>, recently shared his long-awaited <a href="https://medium.com/@drumshaman/keeping-modx-relevant-part-one-42dc6632f86b">thoughts on “MODX Next”</a>, and long-time MODX enthusiast
              Donald Atkinson has <a href="https://medium.com/@fuzzicallogic/modx-recognizing-its-relevancy-bfeda208383f">responded</a> in detail. Is there any benefit to yet another perspective?
              <em>Let me introduce myself quickly</em> … <a href="#" class="read-more">Read more</a></p>
            <p>Since joining the MODX core team in early 2012, I’ve been involved with nearly every client project in which MODX has engaged. (Yes, we engage with clients directly, when it’s a good fit.) Thus, I’ve had the privilege of using (and abusing)
              the MODX software on a daily basis, to meet a dizzying array of business requirements, ranging from straightforward site builds to complex custom web applications deployed at scale. Furthermore, I’ve done so on over 100 projects and in collaboration
              with MODX core developers, including <a href="https://twitter.com/drumshaman" target="_blank">Jason</a>, <a href="https://twitter.com/garryn">Garry</a>, <a href="https://twitter.com/theboxer" rel="nofollow">John</a> and <a href="https://twitter.com/mkschell"
              rel="nofollow">Mike</a>.</p>
          </section>
          <section class="v-spacer">
            <h3 class="section-title has-hr block-spacer">Blockquotes</h3>
            <blockquote class="blockquote">
              <p>We do not want to continue the NIH culture that has already lead to some heavy technical debt.</p>
              <footer>Jason Coward</footer>
            </blockquote>
          </section>
          <section class="v-spacer main-content">
            <h3 class="section-title has-hr block-spacer">Ordered Lists</h3>
            <ol>
              <li>Any open source platform with an eye to continuous development and innovation depends on contributions from highly skilled developers.</li>
              <li>In order to attract such developers, the platform must have low enough barrier-to-entry (BTE), and provide enough return-on-invested-effort (ROIE) to be attractive.</li>
              <li>Much of the core codebase was authored years ago — an eon in Internet Time — and predates modern standards. This increases the BTE today.</li>
            </ol>
          </section>
          <section class="v-spacer main-content">
            <h3 class="section-title has-hr block-spacer">Unordered Lists</h3>
            <ul>
              <li>A framework-independent Manager UI that interfaces with the MODX core via generic REST API, such that the UI can be extended, customized, or even entirely re-written, with comparatively minimal effort.</li>
              <li>A unit-tested MODX core.</li>
              <li>MODX Extras that install automagically with all their dependencies, including but not limited to other Extras.</li>
            </ul>
          </section>
          <section class="v-spacer">
            <h3 class="section-title has-hr block-spacer">Inline elements
              <small>(Dummy content credits: http://demo.patternlab.io/)</small>
            </h3>
            <p><a href="#">This is a text link</a></p>
            <p><a href="#" class="read-more">This is a <em>read-more</em> link</a></p>
            <p>
              <strong>Strong is used to indicate strong importance</strong>
            </p>
            <p>
              <em>This text has added emphasis</em>
            </p>
            <p>
              <mark>The mark element indicates a highlight</mark>
            </p>
            <p>
              <code>This is what inline code looks like.</code>
            </p>
            <p>The <u>u element</u> is text with an unarticulated, though explicitly rendered, non-textual annotation</p>
            <p>
              <del>This text is deleted</del> and
              <ins>This text is inserted</ins>
            </p>
            <p class="meta">This is a meta text</p>
            <p class="section-title">This is a section title</p>
            <p>
              <small>This small text is small for for fine print, etc.</small>
            </p>
            <p>Abbreviation:
              <abbr title="HyperText Markup Language">HTML</abbr>
            </p>
            <p>Keybord input:
              <kbd>Cmd</kbd>
            </p>
            <p>
              <cite>This is a citation</cite>
            </p>
            <p>
              <samp>This is sample output from a computer program</samp>
            </p>
            <p>The
              <var>variarble element</var>, such as
              <var>x</var> =
              <var>y</var>
            </p>
          </section>
        </article>
      </div>
    </div>
  </section>
<!-- /.Typography -->

<!-- Images -->
  <section class="container-wrapper">
    <!-- Basic images -->
    <div class="container-fluid">
      <h3 id="images" class="top-spacer">Images</h3>
      <article class="content-col">
        <section class="v-spacer">
          <h4 class="h3 section-title has-hr">Profile image</h4>
          <img data-src="[[++quill_logo]]" class="img-circle profile-img" width="128" alt="Quill Flightfeather" itemprop="image">
        </section>
        <section class="v-spacer">
          <h3 class="section-title has-hr block-spacer">Inline image with centered caption</h3>
          <figure class="figure">
            <img data-src="http://cdn.kleverr.com/pjx/quill/img/demo/ph-834x360.png" width="834" alt="" class="img-fluid img-inline">
            <figcaption class="figure-caption post-photo-credit text-xs-center">This caption is centered.</figcaption>
          </figure>
        </section>

        <section class="v-spacer">
          <h3 class="section-title has-hr block-spacer">Inline image with caption and credits</h3>
          <figure class="figure">
            <img data-src="http://cdn.kleverr.com/pjx/quill/img/demo/ph-834x360.png" width="834" alt="" class="img-fluid img-inline">
            <figcaption class="figure-caption post-photo-credit">This is a caption.
              <span class="pull-md-right">Photo credits go here.</span>
            </figcaption>
          </figure>
        </section>
      </article>
    </div>
    <!-- Basic images -->
    <!-- Hero image -->
    <div class="section-full">
      <a href="#">
        <figure class="figure">
          <img data-src="http://cdn.kleverr.com/pjx/quill/img/demo/ph-1280x512.png" width="1280" class="img-fluid" alt="">
          <figcaption class="figure-caption post-photo-credit">A caption for the above image.
            <span class="pull-md-right">Photo credits go here.</span>
          </figcaption>
        </figure>
        <div class="section-caption">
          <p>
            <span class="label label-primary text-uppercase meta">In the spotlight</span>
          </p>
          <h2 class="h1">This is a hero image used for featured posts.</h2>
          <p class="meta">by Quill Flightfeather</p>
        </div>
      </a>
    </div>
    <!-- /.Hero image -->
  </section>
  <!-- /.Images -->
  <!-- Buttons -->
    <section class="container-wrapper">
    <div class="container-fluid">
      <h3 id="buttons" class="top-spacer">Buttons</h3>
      <article class="content-col">
        <section class="v-spacer">
          <h4 class="h3 section-title has-hr">Regular buttons</h4>
          <button type="button" class="btn btn-primary">Primary</button>
          <button type="button" class="btn btn-secondary">Secondary</button>
          <button type="button" class="btn btn-success">Success</button>
          <button type="button" class="btn btn-warning">Warning</button>
          <button type="button" class="btn btn-danger">Danger</button>
        </section>

        <section class="v-spacer">
          <h3 class="section-title has-hr block-spacer">Large buttons</h3>
          <button type="button" class="btn btn-primary btn-lg">View full set</button>
          <button type="button" class="btn btn-secondary btn-lg">View full set</button>
          <button type="button" class="btn btn-info btn-lg">View full set</button>
          <button type="button" class="btn btn-success btn-lg">View full set</button>
          <hr>
          <button type="button" class="btn btn-warning btn-lg">View full set</button>
          <button type="button" class="btn btn-danger btn-lg">View full set</button>
        </section>

        <section class="v-spacer">
          <h3 class="section-title has-hr block-spacer">Social buttons</h3>
          <ul class="list-inline">
          <li class="list-inline-item">
            <a href="#" class="share-link" title="Share this on Facebook">
              <svg class="svg-icon-white" viewBox="0 0 20 20">
                <path fill="none" d="M11.344,5.71c0-0.73,0.074-1.122,1.199-1.122h1.502V1.871h-2.404c-2.886,0-3.903,1.36-3.903,3.646v1.765h-1.8V10h1.8v8.128h3.601V10h2.403l0.32-2.718h-2.724L11.344,5.71z"></path>
              </svg>
            </a>
          </li>
          <li class="list-inline-item">
            <a href="#" class="share-link" title="Share this on Twitter">
              <svg class="svg-icon-white" viewBox="0 0 20 20">
                <path fill="none" d="M18.258,3.266c-0.693,0.405-1.46,0.698-2.277,0.857c-0.653-0.686-1.586-1.115-2.618-1.115c-1.98,0-3.586,1.581-3.586,3.53c0,0.276,0.031,0.545,0.092,0.805C6.888,7.195,4.245,5.79,2.476,3.654C2.167,4.176,1.99,4.781,1.99,5.429c0,1.224,0.633,2.305,1.596,2.938C2.999,8.349,2.445,8.19,1.961,7.925C1.96,7.94,1.96,7.954,1.96,7.97c0,1.71,1.237,3.138,2.877,3.462c-0.301,0.08-0.617,0.123-0.945,0.123c-0.23,0-0.456-0.021-0.674-0.062c0.456,1.402,1.781,2.422,3.35,2.451c-1.228,0.947-2.773,1.512-4.454,1.512c-0.291,0-0.575-0.016-0.855-0.049c1.588,1,3.473,1.586,5.498,1.586c6.598,0,10.205-5.379,10.205-10.045c0-0.153-0.003-0.305-0.01-0.456c0.7-0.499,1.308-1.12,1.789-1.827c-0.644,0.28-1.334,0.469-2.06,0.555C17.422,4.782,17.99,4.091,18.258,3.266"></path>
              </svg>
            </a>
          </li>
          <li class="list-inline-item">
            <a href="#" class="share-link" title="Share this on Google+">
              <svg class="svg-icon-white" viewBox="0 0 20 20">
                <path fill="none" d="M8.937,10.603c-0.383-0.284-0.741-0.706-0.754-0.837c0-0.223,0-0.326,0.526-0.758c0.684-0.56,1.062-1.297,1.062-2.076c0-0.672-0.188-1.273-0.512-1.71h0.286l1.58-1.196h-4.28c-1.717,0-3.222,1.348-3.222,2.885c0,1.587,1.162,2.794,2.726,2.858c-0.024,0.113-0.037,0.225-0.037,0.334c0,0.229,0.052,0.448,0.157,0.659c-1.938,0.013-3.569,1.309-3.569,2.84c0,1.375,1.571,2.373,3.735,2.373c2.338,0,3.599-1.463,3.599-2.84C10.233,11.99,9.882,11.303,8.937,10.603 M5.443,6.864C5.371,6.291,5.491,5.761,5.766,5.444c0.167-0.192,0.383-0.293,0.623-0.293l0,0h0.028c0.717,0.022,1.405,0.871,1.532,1.89c0.073,0.583-0.052,1.127-0.333,1.451c-0.167,0.192-0.378,0.293-0.64,0.292h0C6.273,8.765,5.571,7.883,5.443,6.864 M6.628,14.786c-1.066,0-1.902-0.687-1.902-1.562c0-0.803,0.978-1.508,2.093-1.508l0,0l0,0h0.029c0.241,0.003,0.474,0.04,0.695,0.109l0.221,0.158c0.567,0.405,0.866,0.634,0.956,1.003c0.022,0.097,0.033,0.194,0.033,0.291C8.752,14.278,8.038,14.786,6.628,14.786 M14.85,4.765h-1.493v2.242h-2.249v1.495h2.249v2.233h1.493V8.502h2.252V7.007H14.85V4.765z"></path>
              </svg>
            </a>
          </li>
        </ul>
        </section>
      </article>
    </div>
  </section>
  <!-- /.Buttons -->

  <!-- Flags and tags -->
    <section class="container-wrapper">
    <div class="container-fluid">
      <h3 id="flags" class="top-spacer">Flags + tags</h3>
      <article class="content-col">
        <section class="v-spacer">
          <h4 class="h3 section-title has-hr">Labels and Badges</h4>
          <p>
            <span class="label label-primary text-uppercase meta">A primary label</span>
            <span class="label label-success text-uppercase meta">A success label</span>
            <span class="label label-warning text-uppercase meta">A warning label</span>
            <span class="label label-danger text-uppercase meta">A danger label</span>
          </p>
        </section>

        <section class="v-spacer">
          <h3 class="section-title has-hr block-spacer">Tags</h3>
          <ul class="list-inline">
            <li class="list-inline-item"><a href="topics?key=cms" class="tag-badge">CMS</a></li>
            <li class="list-inline-item"><a href="topics?key=modx" class="tag-badge">MODX</a></li>
            <li class="list-inline-item"><a href="topics?key=modx-next" class="tag-badge">MODX Next</a></li>
            <li class="list-inline-item"><a href="topics?key=revolution" class="tag-badge">Revolution</a></li>
          </ul>
        </section>
      </article>
    </div>
  </section>
  <!-- /.Flags and tags -->

  <!-- Notifications -->
    <section class="container-wrapper">
    <div class="container-fluid">
      <h3 id="notifications" class="top-spacer">Notifications</h3>
      <article class="content-col v-spacer">
        <h4 class="h3 section-title has-hr">Alerts</h4>
        <div class="alert alert-success" role="alert">
          <strong class="text-success">Well done!</strong> Whatever you did worked. You should celebrate.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            <span class="sr-only">Close</span>
          </button>
        </div>
        <div class="alert alert-info" role="alert">
          <strong class="text-info">Heads up!</strong> Everything looks good. Nothing to report boss.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            <span class="sr-only">Close</span>
          </button>
        </div>
        <div class="alert alert-warning" role="alert">
          <strong class="text-warning">!</strong> This is just a warning. Next time you\'ll be fined.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            <span class="sr-only">Close</span>
          </button>
        </div>
        <div class="alert alert-danger" role="alert">
          <strong class="text-error">!</strong> Oh-oh, your brain froze for a split second. <a href="#" class="alert-link">Seek medical attention</a> immediately!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            <span class="sr-only">Close</span>
          </button>
        </div>
      </article>
    </div>
  </section>
  <!-- /.Notifications -->

  <!-- Colors -->
    <section class="container-wrapper">
    <div class="container-fluid">
      <h3 id="colors" class="top-spacer">Colors</h3>
      <article class="content-col">
        <section class="v-spacer">
          <h3 class="section-title has-hr block-spacer">Text colors</h3>
          <p class="text-muted text-sans">Fusce dapibus, tellus ac cursus commodo, tortor mauris nibh.</p>
          <p class="text-primary text-sans">Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
          <p class="text-success text-sans">Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</p>
          <p class="text-info text-sans">Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
          <p class="text-warning text-sans">Etiam porta sem malesuada magna mollis euismod.</p>
          <p class="text-error text-sans">Donec ullamcorper nulla non metus auctor fringilla.</p>
        </section>
        <section class="v-spacer">
          <h3 class="section-title has-hr block-spacer">Background colors</h3>
          <div class="block-bg bg-primary">
            <h3>Primary
              <small class="pull-xs-right">#3d53ba</small>
            </h3>
          </div>
          <div class="block-bg bg-success">
            <h3>Success
              <small class="pull-xs-right">#3dbaa4</small>
            </h3>
          </div>
          <div class="block-bg bg-info">
            <h3>Info
              <small class="pull-xs-right">#5bc0de</small>
            </h3>
          </div>
          <div class="block-bg bg-warning">
            <h3>Warning
              <small class="pull-xs-right">#ffa000</small>
            </h3>
          </div>
          <div class="block-bg bg-error">
            <h3>Error
              <small>(Danger)</small>
              <small class="pull-xs-right">#ff1744</small>
            </h3>
          </div>
        </section>
      </article>
    </div>
  </section>
  <!-- /.Colors -->

  <!-- Navigation -->
    <section class="container-wrapper">
    <div class="container-fluid">
      <h3 id="navigation" class="top-spacer">Navigation</h3>
      <article class="content-col">
        <section class="v-spacer">
          <h4 class="h3 section-title has-hr">Breadcrumb</h4>
          <ol class="breadcrumb" style="margin-bottom: 5px;">
            <li><a href="#">Home</a></li>
            <li><a href="#">Library</a></li>
            <li class="active">Data</li>
          </ol>
        </section>
        <section class="v-spacer">
          <h3 class="section-title has-hr block-spacer">Pager</h3>
          <nav>
            <ul class="pager">
              <li class="pager-prev"><a href="#" rel="previous" title="Older posts">← Older posts</a></li>
              <li>Page 1 of 15</li>
              <li class="pager-next"><a href="#" rel="next" title="Newer posts">Newer posts →</a></li>
            </ul>
          </nav>
        </section>
        <section class="v-spacer">
          <h3 class="section-title has-hr block-spacer">Pagination</h3>
          <ul class="pagination">
            <li class="page-item active"><span class="page-link">1</span></li>
            <li class="page-item"><a href="#" class="page-link">2</a></li>
            <li class="page-item"><a href="#" class="page-link">Next →</a></li>
          </ul>
        </section>
      </article>
    </div>
  </section>
  <!-- /.Navigation -->

  <!-- Forms -->
    <section class="container-wrapper">
    <div class="container-fluid">
      <h3 id="forms" class="top-spacer">Forms</h3>
      <article class="content-col v-spacer">
        <section class="v-spacer">
          <h4 class="h3 section-title has-hr">Newsletter signup forms</h4>
          <div class="block-bg bg-light nletter-signup">
            <form class="row">
              <div class="col-lg-4 col-lg-offset-1">
                <p class="signup-text">
                  Be notified of new Thoughts
                </p>
              </div>
              <div class="col-lg-6">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Enter your email">
                  <span class="input-group-btn">
                    <button class="btn btn-success" type="button">Subscribe</button>
                  </span>
                </div>
              </div>
            </form>
          </div>
          <hr>
          <div class="block-bg bg-primary nletter-signup">
            <form class="row">
              <div class="col-lg-4 col-lg-offset-1">
                <p class="signup-text">
                  Be notified of new Thoughts
                </p>
              </div>
              <div class="col-lg-6">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Enter your email">
                  <span class="input-group-btn">
                    <button class="btn btn-success" type="button">Subscribe</button>
                  </span>
                </div>
              </div>
            </form>
          </div>
        </section>
        <section class="v-spacer text-sans">
          <h3 class="section-title has-hr block-spacer">Basic form controls</h3>
          <fieldset class="form-group">
            <label for="input">Text input</label>
            <input type="text" id="input" placeholder="Placeholder text" class="form-control">
            <small class="text-muted">This is a hint</small>
          </fieldset>
          <fieldset class="form-group has-success">
            <label class="text-success" for="input">Text input (success)</label>
            <input type="text" id="input-success" placeholder="Placeholder text" class="form-control">
          </fieldset>
          <fieldset class="form-group has-error">
            <label class="text-error" for="input">Text input (error)</label>
            <input type="text" id="input-error" placeholder="Placeholder text" class="form-control">
          </fieldset>
          <fieldset class="form-group">
            <label for="select">Select</label>
            <select class="form-control c-select" id="select">
              <option>Template</option>
              <option>Template Variable</option>
              <option>Snippet</option>
              <option>Plugin</option>
              <option>Category</option>
            </select>
          </fieldset>
          <fieldset class="form-group">
            <label for="textarea">Textarea</label>
            <textarea class="form-control" id="textarea" rows="3"></textarea>
          </fieldset>
          <div class="radio">
            <label>
              <input name="radio" id="radio1" value="option1" checked="" type="radio"> Radio option 1
            </label>
          </div>
          <div class="radio">
            <label>
              <input name="radio" id="radio2" value="option2" type="radio"> Radio option 2
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" id="checkbox"> Choice 1
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" id="checkbox"> Choice 2
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" id="checkbox"> Choice 3
            </label>
          </div>
        </section>
      </article>
    </div>
  </section>
  <!-- /.Forms -->

  <!-- Preformatted text -->
  <section class="container-wrapper">
    <div class="container-fluid">
      <h3 id="preformatted-text" class="top-spacer">Preformatted text</h3>
      <article class="content-col v-spacer">
        <section class="v-spacer">
          <h4 class="h3 section-title has-hr">PHP (Showing MODX\'s world famous <code>getObject()</code> method)</h4>
          <pre class="language-php"><code>// See how clean stuff looks with MODX? No HTML in your PHP code.
$chunk = $modx->getObject(\'modChunk\',array(
   \'name\' => \'LineItem\',
));

// No chunk, no move.
if (!$chunk) return \'No line item chunk!\';

// See, we don\'t print or echo. We return.
return $chunk->process(array(
   \'img\' => $modx->resource->getTVValue(\'GIPhoto\'),
   \'name\' => \'G.I. Joe\',
   \'grenades\' => 42,
));</code></pre>
        </section>
        <section class="v-spacer">
          <h4 class="h3 section-title has-hr">HTML example. (Showing the <code>LineItem</code> chunk referenced in the snippet above).</h4>
          <pre class="language-markup"><code>&lt;!-- Stellar! No PHP in your HTML. See how clean this looks? -->
&lt;article class="special-forces">
  &lt;figure>
    &lt;img src="[[+img]]" width="480" alt="[[+name]]">
    &lt;figcaption>[[+name]]&lt;/figcaption>
    &lt;p>
      &lt;strong>Grenades:&lt;/strong> [[+grenades]]
    &lt;/p>
  &lt;/figure>
&lt;/article></code></pre>
        </section>
        <section class="v-spacer">
<h4 class="h3 section-title has-hr">Sass example</h4>
<pre class="language-scss"><code>// Social stuff
// ------------

.share-block {
  position: absolute;
  top: 21.875rem;
  right: 2.5rem;
  // Hide on small screens
  display: none;
  // Show on larger ones
  @include media-breakpoint-up(sm) {
    display: block;
    max-width: 10rem;
  }
}
// Yeah -- you can call this progressive enhancement.
</code></pre>
</section>
      </article>
    </div>
  </section>
  <!-- /.Preformatted text -->

<!-- Dialogs -->
  <section class="container-wrapper">
    <div class="container-fluid">
      <h3 id="dialogs" class="top-spacer">Dialogs</h3>
      <article class="content-col v-spacer">
        <h4 class="h3 section-title has-hr">Modal windows</h4>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
          Launch demo modal
        </button>
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
              </div>
              <div class="modal-body">
                <p>
                  Modals are streamlined, but flexible, dialog prompts with the minimum required functionality and smart defaults.
                </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
    </div>
    </div>
  </section>
  <!-- /.Dialogs -->

  <!-- Content blocks -->
    <section class="container-wrapper v-spacer">
    <div class="container-fluid">
      <h3 id="content-blocks" class="top-spacer">Content blocks</h3>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="content-col">
          <h4 class="h3 section-title has-hr top-spacer">Post excerpt. (Used on listing pages)</h4>
          <section>
            <article class="block-post">
              <header>
                <h2><a href="blog/user-related-resource-fields-i/">User-related Resource Fields I</a></h2>
                <p>
                  <small class="meta">December 15, 2015. Published in
                    <a href="sections/experiments">Experiments</a>, by <a href="authors/quill-flightfeather/" itemscope="itemscope" itemtype="http://schema.org/Person" itemprop="author">Quill Flightfeather</a>.</small>
                </p>
              </header>
              <p>
                This is the first in a series of articles about handling the user-related fields of a resource (
                <code>createdby, publishedby, editedby, deletedby</code>). Each field holds the ID of the user who performed the action. In this article, we\'ll look at how to get the full name of the users who performed the action for the current page (and
                the full name of the current user as well) … <a href="https://rtfm.modx.com/" class="read-more">Read more</a>
              </p>
            </article>
          </section>
          <section>
            <h3 class="section-title has-hr block-spacer">Post snippet</h3>
            <article class="block-post main-content">
              <header class="article-header">
                <h1>MODX Revoltion in a few words</h1>
                <p>
                  <small class="meta">December 15, 2015. Published in
                    <a href="sections/thoughts">Thouhgts</a>, by <a href="authors/quill-flightfeather/" itemscope="itemscope" itemtype="http://schema.org/Person" itemprop="author">Quill Flightfeather</a>.</small>
                </p>
              </header>
              <section class="article-body">
              <h2>Overview</h2>
              <p class="lead">
                MODX Revolution (Revo) is an easy-to-use <a href="http://modx.com">Content Management System</a> (CMS) and <a href="http://modx.com">Application Framework</a> rolled into one. Despite the limitless possibilities that MODX affords you,
                <em>we think you\'ll find it refreshingly intuitive to work with</em>. At every step, MODX strives to deliver Creative Freedom.
              </p>
              <aside class="embed-right">
                <blockquote class="twitter-tweet" lang="en">
                  <p lang="en" dir="ltr">Some great updates to <a href="https://twitter.com/MODXCloud">@MODXCloud</a> announced today, including our first German data center now available. <a href="http://t.co/gHzRwW0m11">http://t.co/gHzRwW0m11</a></p>&mdash; MODX (@modx)
                  <a
                  href="https://twitter.com/modx/status/642090198533148673">September 10, 2015</a>
                </blockquote>
                <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                <small class="meta">Add
                  <code>.embed-right</code> to a block element to create a right-floated content box. Neat, huh?</small>
              </aside>
              <p>
                In addition to this <a href="https://rtfm.modx.com/">documentation site</a>, the <a href="http://forums.modx.com/">MODX Community</a> is vibrant and always willing to help. Go ahead and ask questions there - you\'ll be pleasantly surprised
                at the responsiveness of the MODX user base. Additionally, there are trusted, experienced <a href="http://modx.com/professionals">MODX Professionals</a> with whom you can engage to get the job done. MODX also has <a href="http://modx.com/support/">vendor-backed commercial support</a>                options, so no matter your needs and requirements - you\'re covered.
              </p>
              <h2>Getting Started</h2>
              <p>
                This documentation site is a thorough Reference for all things MODX, but there are also Guides and Tutorials to help you get started quickly and easily. Highlights include:
              </p>
              <ul>
                <li>The <a href="revolution/2.x/getting-started/video-quick-start-series/">Video Quick-Start Series</a> of tutorials</li>
                <li>A guide on <a href="revolution/2.x/making-sites-with-modx/">Making Sites with MODX</a></li>
                <li>The <a href="revolution/2.x/case-studies-and-tutorials/creating-a-blog-in-modx-revolution">Creating a Blog in MODX</a> tutorial</li>
              </ul>
              <p>
                If you have a question about this documentation site, or suggestions on how to increase the awesomeness herein, please <a href="mailto:support@modx.com">let us know</a>. From the MODX core team, and the MODX community-at-large, "Welcome!"
              </p>
              <h2><a href="revolution/2.x/">MODX Revolution</a></h2>
              <p>
                Revolution is MODX\'s flagship CMS and application framework, lovingly called "Revo". If you\'re new to MODX, start here.
              </p>
              <h3>Quick Links</h3>
              <ul class="list-inline">
                <li class="list-inline-item"><a href="revolution/2.x/">Documentation Homepage</a></li>
                <li class="list-inline-item"><a href="revolution/2.x/getting-started/video-quick-start-series/">Video Quick-Start Series</a></li>
                <li class="list-inline-item"><a href="revolution/2.x/getting-started/installation">Installation Guide</a></li>
                <li class="list-inline-item"><a href="revolution/2.x/making-sites-with-modx/">Making Sites with MODX</a></li>
              </ul>
              <h3>Other Resources</h3>
              <ul class="list-inline">
                <li class="list-inline-item"><a href="http://modx.com/download/">Get the Latest Release</a></li>
                <li class="list-inline-item"><a href="http://modx.com/extras/">Download Add-ons</a></li>
                <li class="list-inline-item"><a href="http://forums.modx.com/board/?board=264">Forum Discussions</a></li>
                <li class="list-inline-item"><a href="http://tracker.modx.com/projects/revo">Bugs &amp; Feature Requests</a></li>
              </ul>
              </section>
            </article>
          </section>
          <section class="author-bio block-spacer" itemprop="author">
            <h3 class="section-title has-hr block-spacer">Author\'s bio</h3>
            <figure class="media" itemprop="author" itemscope="" itemtype="http://schema.org/Person">
              <a class="media-left" href="authors/?name=treigh" itemprop="url">
                <img class="media-object" data-src="http://www.gravatar.com/avatar.php?gravatar_id=f8ff917fe7c0990c8164704eb2a92ed0&amp;size=64&amp;rating=R&amp;default=wavatar" width="64" alt="Quill Flightfeather" itemprop="image" src="http://www.gravatar.com/avatar.php?gravatar_id=f8ff917fe7c0990c8164704eb2a92ed0&amp;size=64&amp;rating=R&amp;default=wavatar">
              </a>
              <figcaption class="media-body">
                <h4 class="media-heading" rel="author" itemprop="name">Quill Flightfeather</h4>
                Managed a small team researching foreign currency for the government. Once had a dream of working with dolls in Mexico.
              </figcaption>
            </figure>
          </section>
          <section class="block-spacer">
            <h4 class="h3 section-title has-hr">Block notes (Usefull for footnotes, editor\'s notes, etc.)</h4>
            <article class="block-note">
            <p>
              <strong>Note:</strong> The <a href="https://rtfm.modx.com/xpdo/2.x/class-reference/xpdoquery"><em>xPDOQuery</em></a> extends the <em>xPDOCriteria</em> class and allows you to abstract out complex SQL queries into an OOP format. This allows encapsulation of SQL calls so that they can work in multiple database types, and be easy to read and dynamically build.
            </p>
          </article>
          </section>
          <h3 class="section-title has-hr block-spacer">Suggested posts</h3>
          <div class="read-next">
            <h2 class="heading h4">Read these next</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="container-wrapper top-spacer">
      <div class="container-fluid">
        <div class="row">
          <aside class="col-md-4 block-content has-border-right">
            <div class="inner-spacer-col">
              <!-- Post -->
              <article class="block-post">
                <h2><a href="blog/modx-recognizing-its-relevancy/">MODX — Recognizing its Relevancy</a></h2>
                <p>
                  <small class="meta">December 2, 2015. Published in
                    <a href="sections/thoughts">Thoughts</a>, by <a href="authors/quill-flightfeather/" itemscope="itemscope" itemtype="http://schema.org/Person" itemprop="author">Quill Flightfeather</a>.</small>
                </p>

                <p>
                  For those who don’t know, MODX is the best CMS/CMP that you’ve never used. If you have used it, chances are that it was discarded as an option because it was misunderstood (at least on some level). If you stuck with it for any length of time, you were
                  probably intrigued by its incredible capabilities despite its ingenious simplicity… and you are probably a site designer. These do not describe me, but that’s not what this article is about.
                </p>
              </article>
              <!-- /.Post -->
              <!-- Post -->
              <article class="block-post">
                <h2><a href="blog/keeping-modx-relevant-part-three/">Keeping MODX Relevant — Part Three</a></h2>
                <p>
                  <small class="meta">December 2, 2015. Published in
                    <a href="sections/thoughts">Thoughts</a>, by <a href="authors/quill-flightfeather/" itemscope="itemscope" itemtype="http://schema.org/Person" itemprop="author">Quill Flightfeather</a>.</small>
                </p>

                <p>
                  My vision for MODX 3 is disruptive on purpose. And originally, this final part of my series on the ideas I have to keep MODX relevant as web technology continuously evolves was going to focus on some revolutionary concepts around persistence. But as time
                  has marched on, I feel the time is not right for my next generation persistence library yet, nor is the code where I expected it to be by now after various self-imposed reviews of what I am doing. So instead of focusing on next generation
                  persistence, I want to focus on changes to the existing xPDO project that will help keep MODX relevant in the coming years, as well as provide an update on where MODX 3 stands in its lifecycle.
                </p>
                <!-- /.Post -->
            </div>
          </aside>
          <!-- Post -->
          <div class="col-md-8 block-content">
            <article class="inner-spacer-col">
              <header class="article-header">
                <figure class="figure">
                  <img data-src="http://cdn.kleverr.com/pjx/quill/img/demo/keeping-modx-relevant-pt-2.jpeg" width="824" class="img-fluid" alt="">
                  <figcaption class="figure-caption post-photo-credit">
                    Caption
                    <span class="pull-md-right">Credits</span>
                  </figcaption>
                </figure>
                <h2><a href="blog/keeping-modx-relevant-part-two/">Keeping MODX Relevant — Part Two</a></h2>
                <p>
                  <small class="meta">December 2, 2015. Published in
                    <a href="#"></a>, by <a href="#">Quill Flightfeather</a></small>
                </p>
              </header>
              <p class="lead">
                What success MODX has achieved over the past ten years is, in my opinion, entirely due to two core tenets that the community has always stood behind. Those ideals are modularity and extensibility. Together with a natural separation of presentation and
                logic that the architecture begs you to take advantage of, MODX has carved a significant niche providing Creative Freedom to an Open Source CMS world better known for prefabricated themes you have to hook into or hack around..
                <a href="blog/keeping-modx-relevant-part-two/" class="read-more">Read more</a>
              </p>
            </article>
          </div>
          <!-- /.Post -->
        </div>
      </div>
    </div>
  </section>
  <!-- /.Content blocks -->

  <!-- Helper classes -->
    <section class="container-wrapper">
    <div class="container-fluid">
      <h3 id="helper-classes" class="top-spacer">Helper classes </h3>
      <article class="content-col v-spacer">
        <section class="v-spacer">
          <h4 class="h3 section-title has-hr">Block titles (Add
            <code>.heading</code> to a heading inside a
            <code>.read-next</code> block element to create a read-next title)</h4>
          <div class="read-next">
            <h2 class="heading h4">Read these next </h2>
          </div>
        </section>
        <section class="v-spacer">
          <h4 class="h3 section-title has-hr">Underlines (Add <code>.underline-primary</code> to a span to get blue pseudo underline)</h4>
          <p>
            <span class="underline-primary">This text has a blue underline</span>
          </p>
        </section>
        <section class="block-spacer">
          <h4 class="h3 section-title has-hr">Spacing (Shorthand classes)</h4>
          <p class="text-sans">
            <code>.top-spacer</code> sets the top margin of an element to <code>2rem</code>. Similar to Bootstrap\'s <code>.m-t-2</code>.
          </p>
          <p class="text-sans">
            <code>.v-spacer</code> sets the top and bottoms margin of an element to <code>2rem</code>. Similar to Bootstrap\'s <code>.m-t-2 .m-b-2</code>.
          </p>
          <p class="text-sans">
            <code>.block-spacer</code> sets the top margin of an element to <code>3.5rem</code>.
          </p>
          <p class="text-sans">
            <code>.inner-spacer</code> sets the top and bottom padding of an element to <code>2rem</code>. Similar to Bootstrap\'s <code>.p-t-2 .p-b-2</code>.
          </p>
          <p class="text-sans">
            <code>.inner-spacer-x</code> sets the left and right padding of an element to <code>2rem</code>.
          </p>
          <p class="text-sans">
            <code>.inner-spacer-col</code> sets the left and right padding of a content column to <code>2rem</code> on landscape phones and up.
          </p>
        </section>
        <section class="block-spacer">
          <h4 class="h3 section-title has-hr">Misc.</h4>
          <p class="text-sans">
            Add <code>.section-title .has-hr</code> to a heading to set an adequate bottom spacer and a bottom border.
          </p>
          <p>
            Add <code>.main-content</code> to a content wrapper to slightly increase the <code>line-height</code> of its inner paragraphs, thus improving readability.
          </p>
          <p>
            Add <code>.center-content</code> to a wrapper element to set the text alignement of its child block elements to <code>center</code>
          </p>
          <p>
            <code>.text-thin</code> sets the font weight of an element to <code>300</code>
          </p>
          <p>
            <code>.text-thick</code> sets the font weight of an element to <code>900</code>
          </p>
          <p>
            <code>.svg-icon</code> applies Quill styles to svg images used as icons.
          </p>
        </section>
      </article>
    </div>
  </section>
  <!-- Helper classes -->

  <!-- Call to action + feedback -->
  <section class="container-wrapper v-spacer">
    <div class="container-fluid">
      <div class="row center-content">
        <h2 class="h1 v-spacer">Not bad, huh?</h2>
        <p class="text-sm-center v-spacer">
            <a href="[[++quill_download_url]]" class="btn btn-primary btn-lg">Download Quill Blog Theme<br><span class="small text-info">Requires MODX 2.4+</span></a>
          </p>
          <p class="text-sm-center"><a href="[[++quill_demo_url]]/flight-manual" class="btn btn-link btn-lg read-more">Read the Flight Manual</a></p>
        <!-- Comments -->
        <div id="comments" class="content-col v-spacer" itemprop="comment" itemscope itemtype="http://schema.org/UserComments">
          <header class="read-next">
            <h2 class="heading h4">Add your thought</h2>
          </header>
          <div id="disqus_thread" data-disqus-shortname="[[++quill_disqus_shortname]]" data-disqus-url="[[~[[*id]]? &scheme=`full`]]" data-disqus-identifier="[[*publishedon:strtotime]]-[[*parent]][[*id]]" class="col-md-10 col-md-offset-1"></div>
        </div>
        <!-- /.Comments -->
      </div>
      <hr>
      <p class="small text-muted text-sans v-spacer">
        Made with
        <img width="16" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAABIklEQVRIS7WVjW3CQAyFPyagG5QNYAPKBMAEwATMwgQtE7RMACPABrBBmAD0olx1XH7wHZylKBI477Md30uPzNEL9L+ANTDzfv8DdG2D3CUw9XIL4ABsqnuZ7gN+gEVHQ0dgUv2/B0YdudJa+YBn4k5LVSo+DJMtIepAY1FFOWIigLX6lAK2AqjtfsrThmcKAW6GxOSU3B1cBdCOa59zxE4AHZjvHOpuTaV9Bj7fDLkAA3eSZQ2/bwbMNf4Yq4jhy7c0+gcv0vGXWQ1jlBpyT5U7lLYSuumrkAfxJoAzspROauJtgBRIo3gXIAbSKv4M4CA66eOWF7+rtsV9J2pp4UtuW6AmS/9fxa6tswKk4UNM4pYRhcUJoigPkSViOrDo1XLulOQ1549Db2YAAAAASUVORK5CYII=">
         in Toronto. <span class="pull-md-right">Powered by <a href="http://modx.com" target="_blank" rel="nofollow">MODX</a></span>
      </p>
    </div>
  </section>
  <!-- /.Call to action + feedback -->
',
    'context_key' => 'web',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => 'Quill is a sleek, modern and clutter-free theme that offers a more immersive reading experience.',
    'isfolder' => 1,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Pattern Library',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
      'qllPageLayout' => 
      array (
        'name' => 'qllPageLayout',
        'value' => '[[$qllFullLayout]]',
      ),
      'qllLeftFloatbar' => 
      array (
        'name' => 'qllLeftFloatbar',
        'value' => '[[$qllQuickNotePatternLibrary]]',
      ),
    ),
    'template' => 'Quill',
    'published' => 1,
    'richtext' => 0,
  ),
  10 => 
  array (
    'pagetitle' => 'Search',
    'alias' => 'search',
    'parent' => 'Quill',
    'content' => '[[!SimpleSearch?
  &ids=`[[++quill.blog_container]]`
  &depth=`2`
  &tpl=`qllSearchResult`
  &containerTpl=`qllSearchResults`
  &noResultsTpl=`qllSearchNoResults`
  &pageTpl=`qllSearchPageLink`
  &currentPageTpl=`qllSearchCurrentPageLink`
  &highlightTag=`mark`
  &urlScheme=`full`
  &searchIndex=`term`
]]
',
    'context_key' => 'web',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => 'Search articles from the Blog.',
    'isfolder' => 1,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Search',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
      'qllPageLayout' => 
      array (
        'name' => 'qllPageLayout',
        'value' => '[[$qllSearchLayout]]',
      ),
    ),
    'template' => 'Quill',
    'published' => 1,
    'hidemenu' => 1,
    'searchable' => 0,
    'richtext' => 0,
  ),
  11 => 
  array (
    'pagetitle' => 'Sitemap',
    'alias' => 'sitemap',
    'parent' => 'Quill',
    'content' => '[[pdoSitemap? &showHidden=`1` &where=`{"searchable:=":1}`]]
',
    'context_key' => 'web',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 1,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Sitemap',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'template' => 0,
    'content_type' => 'xml',
    'published' => 1,
    'hidemenu' => 1,
    'cacheable' => 0,
    'searchable' => 0,
    'richtext' => 0,
  ),
  12 => 
  array (
    'pagetitle' => 'RSS',
    'alias' => 'rss',
    'parent' => 'Quill',
    'content' => '<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:dc="http://purl.org/dc/elements/1.1/">
<channel>
    <title>[[*pagetitle]]</title>
    <link>[[~[[*id]]? &scheme=`full`]]</link>
    <description>[[*introtext:cdata]]</description>
    <language>[[++cultureKey]]</language>
    <ttl>120</ttl>
    <atom:link href="[[~[[*id]]? &scheme=`full`]]" rel="self" type="application/rss+xml" />
    [[pdoResources?
      &cacheTime=`10800`
      &tpl=`qllRSSTpl`
      &parents=`[[++quill.blog_container]]`
      &depth=`2`
      &limit=`10`
      &includeContent=`1`
      &includeTVs=`qllFeaturedImage`
      &hideContainers=`1`
      &scheme=`full`
    ]]
</channel>
</rss>
',
    'context_key' => 'web',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 1,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'RSS',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'template' => 0,
    'content_type' => 'rss',
    'published' => 1,
    'hidemenu' => 1,
    'cacheable' => 0,
    'searchable' => 0,
    'richtext' => 0,
  ),
  13 => 
  array (
    'pagetitle' => 'Page not found',
    'alias' => 'page-not-found',
    'parent' => 'Quill',
    'content' => '<div class="inner-spacer-x">
  <h1 class="text-sm-center">Reader, you seem lost.</h1>
  <p class="lead text-sm-center">
    The page you seek could not be found.
  </p>
  <p class="meta text-uppercase text-sm-center">
    ***
  </p>
  <p class="meta text-uppercase text-sm-center">
    ERROR CODE 404
  </p>
</div>
',
    'context_key' => 'web',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 1,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Page not found',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
      'qllPageLayout' => 
      array (
        'name' => 'qllPageLayout',
        'value' => '[[$qllFullLayout]]',
      ),
    ),
    'template' => 'Quill',
    'published' => 1,
    'hidemenu' => 1,
    'searchable' => 0,
    'richtext' => 1,
  ),
  14 => 
  array (
    'pagetitle' => 'Site unavailable',
    'alias' => 'site-unavailable',
    'parent' => 'Quill',
    'content' => '<div class="inner-spacer-x">
  <h1 class="text-xs-center">Forgive our transgression.</h1>
  <p class="lead text-xs-center">
    Our site is undergoing maintenance.
  </p>
  <p class="meta text-uppercase text-xs-center">
    ***
  </p>
  <p class="meta text-uppercase text-xs-center">
    ERROR CODE 503
  </p>
</div>
',
    'context_key' => 'web',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 1,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Site unavailable',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
      'qllPageLayout' => 
      array (
        'name' => 'qllPageLayout',
        'value' => '[[$qllFullLayout]]',
      ),
    ),
    'template' => 'Quill',
    'published' => 1,
    'hidemenu' => 1,
    'searchable' => 0,
    'richtext' => 1,
  ),
);

        $resourceMap = getResourceMap();
        $toRemove = $resourceMap;
        $siteStart = $modx->getOption('site_start');

        foreach ($resources as $resource) {
            if (is_string($resource['parent'])) {
                if (isset($resourceMap[$resource['parent']])) {
                    $resource['parent'] = $resourceMap[$resource['parent']];
                } else {
                    /** @var modResource $parent */
                    $parent = $modx->getObject('modResource', array('pagetitle' => $resource['parent']));
                    if ($parent) {
                        $resource['parent'] = $parent->id;
                    }
                }
            } else {
                if ($resource['parent'] != 0) {
                    /** @var modResource $parent */
                    $parent = $modx->getObject('modResource', array('id' => $resource['parent']));
                    if ($parent) {
                        $resource['parent'] = $parent->id;
                    }
                } else {
                    $resource['parent'] = 0;
                }
            }

            if ($resource['template'] !== null) {
                if ($resource['template'] !== 0) {
                    $template = $modx->getObject('modTemplate', array('templatename' => $resource['template']));
                    if ($template) {
                        $resource['template'] = $template->id;
                    }
                } else {
                    $resource['template'] = 0;
                }
            }

            if ($resource['content_type'] !== null) {
                $content_type = $modx->getObject('modContentType', array('name' => $resource['content_type']));
                if ($content_type) {
                    $resource['content_type'] = $content_type->id;
                }
            } else {
                $resource['content_type'] = $modx->getOption('default_content_type', null, 1);
            }

            if (isset($resourceMap[$resource['pagetitle']])) {
                unset($toRemove[$resource['pagetitle']]);

                /** @var modResource $exists */
                $exists = $modx->getObject('modResource', array('id' => $resourceMap[$resource['pagetitle']]));
                if ($exists) {
                    $resource['id'] = $exists->id;
                    $resId = updateResource($resource);

                    if ($resId !== false) {
                        $resourceMap[$resource['pagetitle']] = $resId;
                    }
                } else {
                    if ($resource['set_as_home'] == 1) {
                        unset($resource['set_as_home']);
                        $resource['id'] = $siteStart;

                        $resId = updateResource($resource);

                        if ($resId !== false) {
                            $resourceMap[$resource['pagetitle']] = $resId;
                        }
                    } else {
                        $resId = createResource($resource);

                        if ($resId !== false) {
                            $resourceMap[$resource['pagetitle']] = $resId;
                        }
                    }
                }
            } else {
                $resId = createResource($resource);

                if ($resId !== false) {
                    $resourceMap[$resource['pagetitle']] = $resId;
                }
            }
        }

        foreach ($toRemove as $pageTitle => $resource) {
            unset($resourceMap[$pageTitle]);

            if ($resource == $siteStart) continue;

            /** @var modResource $modResource */
            $modResource = $modx->getObject('modResource', $resource);
            if ($modResource) {
                $modx->updateCollection('modResource', array('parent' => 0), array('parent' => $resource));

                $modResource->remove();
            }
        }

        setResourceMap($resourceMap);

        break;
    case xPDOTransport::ACTION_UNINSTALL:

        break;
}

return true;