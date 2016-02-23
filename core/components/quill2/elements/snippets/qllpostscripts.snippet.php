<?php
/**
 * qllPostScripts
 *
 * This snippet loads relevant page scripts.
 * @author Treigh P. M. <treigh(at)kleverr.com>
 * @version 1.0.1 - February 22, 2015
 *
 * USAGE:
 *
 * [[qllPostScripts? &start=`1` &startScripts=`myBlogScriptChunk` &postScripts=`myPostScriptChunk`]]
 *
 */

$output  = '';
$snippet = 'qllPostScripts';

/* Default properties */
$blogStart = $modx->getOption('start', $scriptProperties, $modx->getOption('quill2.blog_container'));
$startScpt = $modx->getOption('startScripts', $scriptProperties, 'qllContainerScripts');
$postScpt  = $modx->getOption('postScripts', $scriptProperties, 'qllPostScripts');

/* Ensure the blog start page is set or exists (by default) */
if (empty($blogStart)) {
    $modx->log(modX::LOG_LEVEL_ERROR, '[' . $snippet . '] missing blog container id.');
    return;
}

/* Select relevant page scripts */
$output = ($modx->resource->get('parent') == $blogStart) ? $postScpt : $startScpt;

return $modx->getChunk($output);
