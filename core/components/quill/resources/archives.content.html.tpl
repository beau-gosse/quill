[[!pdoPage?
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
