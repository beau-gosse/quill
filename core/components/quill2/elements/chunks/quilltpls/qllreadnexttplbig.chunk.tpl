</div>
</aside>
<!-- Post -->
<div class="col-md-8 block-content">
<article class="inner-spacer-col">
  <header class="article-header">
    [[qllFeaturedImage? &id=`[[+id]]`]]
    <h2><a href="[[~[[+id]]]]">[[+pagetitle]]</a></h2>
    <p>
      <small class="meta">[[+publishedon:date=`%B %e, %Y`]]. Published in
      [[TaggerGetTags:default=`<a href="[[~[[++quill.sections_page]]]]">Thoughts</a>`?
        &resources=`[[+id]]`
        &groups=`[[++quill_section_group]]`
        &rowTpl=`qllSectionLinksTpl`
        &target=`[[++quill.sections_page]]`
      ]],
      by [[qllAuthorUrl? &author=`[[+createdby]]`]].</small>
    </p>
  </header>
  <p class="lead">
    [[+introtext]]. <a href="[[~[[+id]]]]" class="read-more">Read more</a>
  </p>
</article>
</div>
<!-- /.Post -->
