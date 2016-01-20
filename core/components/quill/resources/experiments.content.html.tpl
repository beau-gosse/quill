[[- The default listing limit is 10]]
[[!pdoPage:default=`<p class="text-center">We swear, we'll have fresh content on your next visit.</p>`?
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
