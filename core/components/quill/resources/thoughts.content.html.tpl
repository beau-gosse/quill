[[- The default listing limit is 10]]
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
