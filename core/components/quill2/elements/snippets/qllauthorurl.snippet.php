<?php
/**
 * qllAuthorUrl
 *
 * This snippet generates a URL to the author's bio page.
 *
 * @author Treigh P. M. <treigh(at)kleverr.com>
 * @version 1.0.0 - December 7, 2015
 *
 * USAGE:
 *
 * [[qllAuhorUrl? &author=`[[+createdby]]`]]
 *
 */

 /* Default properties */
$createdby = $modx->getOption('author', $scriptProperties, $modx->resource->get('createdby'));
$authors   = $modx->getOption('quill.authors_page');
$blogName  = $modx->getOption('quill_blog_name');
$output    = '';

/* build query */
$c = $modx->newQuery('modResource');
$c->innerJoin('modTemplateVarResource', 'TemplateVarResources');
$c->where(array(
    'modResource.parent' => $authors,
    'modResource.published' => true,
    'modResource.deleted' => false,
    'TemplateVarResources.value' => $createdby
));

/* get the auhor's URL and full name, if they exist */
$author   = $modx->getObject('modResource', $c);
$url      = ($author) ? $modx->makeUrl($author->get('id')) : $modx->makeUrl($authors);
$fullname = ($author) ? $author->get('pagetitle') : $modx->getOption($blogName);

return $modx->getChunk('qllPostAuthorTpl', array(
  'url' => $url,
  'author' => $fullname
));
