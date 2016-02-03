<section class="container-wrapper masthead body-spacer">
  <!-- Page header -->
  <article class="container-fluid">
    <section class="row">
      <header class="content-col-half">
        <h1 class="text-xs-center article-header" itemprop="headline" itemprop="headline">[[*pagetitle]]</h1>
        <figure class="figure center-block" itemprop="author" itemscope itemtype="http://schema.org/Person">
          [[If?
            &subject=`[[*id]]`
            &operand=`[[++quill.authors_page]]`
            &then=`<img class="img-circle center-block profile-img" data-src="[[++quill_logo]]" width="128" alt="[[*pagetitle]]" itemprop="image">`
            &else=`<img class="img-circle center-block profile-img" data-src="[[Gravatar? &email=`[[*qllAuthor:userinfo=`email`]]` &size=`128` &rating=`r` &default=`wavatar`]]" width="128" alt="[[*pagetitle]]" itemprop="image">`
          ]]
          <figcaption>
            <p class="text-xs-center">
                [[If?
                  &subject=`[[*id]]`
                  &operand=`[[++quill.authors_page]]`
                  &then=`[[*description]]`
                  &else=`[[*qllAuthor:userinfo=`comment`]]`
                ]]
            </p>
          </figcaption>
        </figure>
        [[If?
          &subject=`[[*qllTwitterAccount]]`
          &operator=`notempty`
          &then=`<p class="small text-xs-center"><a href="https://twitter.com/[[*qllTwitterAccount]]" target="_blank" rel="_nofollow">@[[*qllTwitterAccount]]</a></p>`
        ]]
      </header>
    </section>
  </article>
  <!-- /.Page header -->
</section>
<!-- Content -->
<main class="container-fluid main-content" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
  <!-- Left floatbar widgets -->
  <aside class="floatbar-left">
    [[*qllLeftFloatbar]]
  </aside>
  <!-- /. Left floatbar widgets -->
  <!-- Content area -->
  <section class="row" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
    <article class="content-col">
      <h2 class="h5 top-spacer"><strong class="text-thick ">The latest from [[*id:is=`[[++quill.authors_page]]`:then=`our `]]<span class="underline-primary">[[*pagetitle]]</span></strong></h2>
      <!-- Content body -->
      <section class="article-body block-spacer" itemprop="articleBody">

        [[*content]]

        [[- The default listing limit is 10]]
        [[!pdoPage:default=`<p>[[*pagetitle]] is probably writing the next <em>best-seller</em>. Please check back soon.</p>`?
          &where=`{"createdby:=":[[*Author]]}`
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
      </section>
      <!-- /.Content body -->
    </article>
  </section>
  <!-- /.Content area -->
  <!-- Right floatbar widgets -->
  <aside class="share-block">
    [[*qllRightFloatbar]]
  </aside>
  <!-- /.Right floatbar widgets -->
</main>
<!-- /.Content -->
<!-- Newsletter signup -->
<section class="container-wrapper v-spacer">
  <div class="container-fluid">
    <!-- Pagination -->
    <article class="row">
      <nav class="content-col">
        [[!+page.nav]]
      </nav>
    </article>
    <!-- /.Pagination -->
    <!-- Newsletter signup -->
    <article class="row">
      <div class="content-col v-spacer">
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
