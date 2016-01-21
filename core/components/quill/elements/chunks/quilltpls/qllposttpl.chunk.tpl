<!-- Post -->
<article class="block-post">
  <h2><a href="[[~[[+id]]]]">[[+pagetitle]]</a></h2>
  <p>
    <small class="meta">[[+publishedon:date=`%B %e, %Y`]].
    Published in
    [[TaggerGetTags:default=`<a href="[[~[[++quill.sections_page]]]]">Thoughts</a>`?
      &resources=`[[+id]]`
      &groups=`[[++quill_section_group]]`
      &rowTpl=`qllSectionLinksTpl`
      &target=`[[++quill.sections_page]]`
    ]],
    by [[qllAuthorUrl? &author=`[[+createdby]]`]]</small>
  </p>
  [[If?
    &subject=`[[*parent]]`
    &operator=`not`
    &operand=`[[++quill.blog_container]]`
    &then=`[[qllFeaturedImage? &id=`[[+id]]`]]`
  ]]
  <p>
    [[+introtext]]
  </p>
</article>
<!-- /.Post -->
