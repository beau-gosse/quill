<!-- Featured post -->
<section class="section-full featured-post">
  [[pdoResources?
    &select=`{"modResource":"id,pagetitle,introtext,publishedon,createdby"}`
    &parents=`[[++quill.blog_container]]`
    &limit=`1`
    &tpl=`qllFeaturedPostTpl`
    &scheme=`full`
    &sortby=`publishedon`
    &sortdir=`DESC`
    &includeTVs=`qllFeaturedImage,qllImageCaption,qllImageCredits`
    &tvFilters=`qllFeaturedImage!==%%`
    &toPlaceholder=`featured`
  ]]
  [[+featured]]
</section>
<!-- /.Featured post -->
<!-- Content -->
<main class="container-fluid main-content" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
  <!-- Left floatbar widgets -->
  <aside class="floatbar-left">
    [[*qllLeftFloatbar]]
  </aside>
  <!-- /. Left floatbar widgets -->
  <!-- Content area -->
  <section class="row" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
    <article class="content-col-off">
      <h2 class="h5 text-thick m-t-0"><strong>The latest</strong></h2>
      <!-- Content body -->
      <section class="body-text block-spacer" itemprop="articleBody">
        [[*content]]
      </section>
      <!-- /.Content body -->
    </article>
    <aside class="side-col">
        [[*qllRightFloatbar]]
        <p class="text-sm-center v-spacer hidden-sm-down">
          <a href="[[++quill_download_url]]" class="btn btn-primary btn-lg">Download Quill Blog Theme<br><span class="small text-info">Requires MODX 2.4+</span></a>
        </p>
      <div class="card card-block">
        <h5 class="card-title meta meta-title">About this demo blog</h5>
        <p class="card-text meta">[[++quill_blog_description:default=`[[*description]]`]]</p>
      </div>
      <p class="section-title top-spacer">Popular Topics</p>
      <nav>
        <ul class="list-inline">
          [[TaggerGetTags?
            &groups=`[[++quill_topic_group]]`
            &rowTpl=`qllTagLinksTpl`
            &target=`[[++quill.topics_page]]`
          ]]
        </ul>
      </nav>
      <p class="section-title top-spacer">What we're reading</p>
      <div class="card card-block">
        <h5 class="card-title meta meta-title">MODX: The Official Guide</h5>
        <p class="card-text meta"><a href="http://modx.com/learn/modx-books/modx-the-official-guide/" target="_blank" rel="nofollow"><img src="http://cdn.kleverr.com/pjx/quill/img/blog/modx-the-official-guide.jpg" width="350" class="img-fluid" alt="MODX: The Official Guide"></a></p>
      </div>
      <div class="card card-block">
        <h5 class="card-title meta meta-title">Atomic Design</h5>
        <p class="card-text meta"><a href="http://atomicdesign.bradfrost.com/" target="_blank" rel="nofollow"><img data-src="http://atomicdesign.bradfrost.com/images/book-cover.svg" width="350" class="img-fluid" alt="Brad Frost - Atomic Design"></a></p>
      </div>
    </aside>
  </section>
  <!-- /.Content area -->
</main>
<!-- /.Content -->
<!-- Newsletter signup -->
<section class="container-wrapper v-spacer">
  <div class="container-fluid">
    <!-- Pagination -->
    <article class="row">
      <nav class="content-col-big">
        [[!+page.nav]]
      </nav>
    </article>
    <!-- /.Pagination -->
    <!-- Newsletter signup -->
    <article class="row">
      <div class="content-col-big v-spacer">
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
  </div>
</section>
<!-- /.Newsletter signup -->
