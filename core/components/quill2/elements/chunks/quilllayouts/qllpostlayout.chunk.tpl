<main class="container-fluid main-content body-spacer" role="main" itemscope itemtype="http://schema.org/Blog">
  <!-- Left floatbar widgets -->
  <aside class="floatbar-left">
    [[*qllLeftFloatbar]]
  </aside>
  <!-- /.Left floatbar widgets -->
  <!-- Content area -->
  <section class="row" role="main" itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting">
    <article class="content-col">
      <!-- Post header -->
      <header class="article-header">
        <h1 itemprop="headline">[[*pagetitle]]</h1>
        <p>
          <small class="meta text-muted">
            <time datetime="[[*publishedon:strtotime:date=`%Y-%m-%dT%R%z`]]" itemprop="datePublished">[[*publishedon:strtotime:date=`%B %e, %Y`]]</time>.
            <meta name="dateModified" content="[[*publishedon:strtotime:date=`%Y-%m-%dT%R%z`]]">
            Published in
            [[TaggerGetTags:default=`<a href="[[~[[*parent]]]]">Thoughts</a>`?
              &resources=`[[*id]]`
              &groups=`[[++quill_section_group]]`
              &rowTpl=`qllSectionLinksTpl`
              &target=`[[++quill.sections_page]]`
            ]], by [[qllAuthorUrl]]
          </small>
        </p>
        [[If?
          &subject=`[[*qllShowFeaturedImage]]`
          &operand=`1`
          &then=`[[$qllFigure? &img=`[[*qllFeaturedImage]]` &caption=`[[*qllImageCaption]]` &credits=`[[*qllImageCredits]]`]]<hr>`
        ]]
      </header>
      <!-- /.Post header -->
      <!-- Reading time info -->
      <p class="section-title readtime" title="Estimated read time"><span class="eta"></span> read.</p>
      <!-- /.Reading time info -->
      <!-- Content body -->
      <section class="article-body" itemprop="articleBody">
        [[*content]]
      </section>
      <!-- /.Content body -->
      <!-- Post tags -->
      [[TaggerGetTags?
        &resources=`[[*id]]`
        &groups=`[[++quill_topic_group]]`
        &rowTpl=`qllTagLinksTpl`
        &outTpl=`qllTagLinksOutTpl`
        &target=`[[++quill.topics_page]]`
      ]]
      <!-- /.Post tags -->
      <!-- Author bio -->
      <footer class="author-bio block-spacer" itemprop="author">
        <h3 class="section-title">About the author</h3>
        <figure class="media" itemprop="author" itemscope itemtype="http://schema.org/Person">
          <a class="media-left" href="[[~[[++quill.authors_page]]? &name=`[[*createdby:userinfo=`username`]]`]]" itemprop="url">
            <img class="media-object" data-src="[[Gravatar? &email=`[[*createdby:userinfo=`email`]]` &size=`64` &rating=`r` &default=`wavatar`]]" width="64" alt="[[*createdby:userinfo=`fullname`]]" itemprop="image">
          </a>
          <figcaption class="media-body">
            <h4 class="media-heading" rel="author" itemprop="name">[[*createdby:userinfo=`fullname`]]</h4>
            [[*createdby:userinfo=`comment`]]
          </figcaption>
        </figure>
      </footer>
      <!-- /.Author bio -->
    </article>
  </section>
  <!-- /.Content area -->
  <!-- Right floatbar widgets -->
  <aside class="share-block">
    [[*qllRightFloatbar]]
  </aside>
  <!-- /.Right floatbar widgets -->
</main>
<!-- Comments + Newsletter -->
<section class="container-wrapper">
  <div class="container block-spacer">
    <!-- Post Comments -->
    <article class="row" itemprop="comment" itemscope itemtype="http://schema.org/UserComments">
      <header class="read-next">
        <h2 class="heading h4">Add your thought</h2>
      </header>
      <div id="disqus_thread" data-disqus-shortname="[[++quill_disqus_shortname]]" data-disqus-url="[[~[[*id]]? &scheme=`full`]]" data-disqus-identifier="[[*publishedon:strtotime]]-[[*parent]][[*id]]" class="col-md-10 col-md-offset-1"></div>
    </article>
    <!-- /.Post Comments -->
    <!-- Newsletter signup -->
    <article class="row">
      <div class="content-col-big block-spacer">
        <div class="block-bg bg-primary nletter-signup">
          <form id="newsletter-signup" class="row" action="//formspree.io/[[++emailsender]]" method="POST">
            <input type="hidden" name="_subject" value="Your List has a new Subscriber">
            <input type="text" name="_gotcha" class="hidden-xs-up">
            <div class="col-md-4 col-md-offset-1">
              <p class="signup-text">
                Be notified of new Thoughts
              </p>
            </div>
            <div class="col-md-6">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Enter your email">
                <span class="input-group-btn">
                  <button class="btn btn-success" type="submit">Subscribe</button>
                </span>
              </div>
            </div>
          </form>
        </div>
      </div>
    </article>
    <!-- /.Newsletter signup -->
  </div>
</section>
<!-- Comments + Newsletter -->
<!-- Suggestions -->
<section class="v-spacer">
  <div class="read-next">
    <h2 class="heading h4">Read these next</h2>
  </div>
  <div class="container-wrapper">
    <div class="container-fluid">
      <div class="row">
        <aside class="col-md-4 block-content has-border-right">
          <div class="inner-spacer-col">
              [[pdoResources:default=`<p class="text-xs-center text-muted">No suggestions available. Please check back soon.</p>`?
                &parents=`[[++quill.blog_container]]`
                &resources=`-[[*id]]`
                &depth=`0`
                &limit=`3`
                &select=`{"modResource":"id,pagetitle,introtext,createdby,publishedon"}`
                &sortby=`RAND()`
                &scheme=`full`
                &tpl=`qllPostTpl`
                &tpl_3=`qllReadNextTplBig`
              ]]
          [[- the closing tags </div></aside> are in the third tpl (right column)
              This setup helps avoid an extra unnecessary pdoResources call.
          ]]
      </div>
    </div>
  </div>
</section>
<!-- /.Suggestions -->
<!-- /.Content -->
