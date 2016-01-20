<?php
/**
 * qllFeaturedImage
 *
 * When used inside a getResources tpl, this helper snippet
 * displays the post's featured image if it exists.
 *
 * @author Treigh P. M. <treigh(at)kleverr.com>
 * @version 1.0.0 - December 7, 2015
 *
 * USAGE:
 * [[qllFeaturedImage? &id=`[[+id]]` &image=`qllFeaturedImage` &credits=`[[+tv.qllFeaturedCredits]]` &tpl=`qllFigure`]]
 */

 /* Default properties */
$output          = '';
$snippet         = 'qllFeaturedImage';
$id              = $modx->getOption('id', $scriptProperties, '');
$featured        = $modx->getOption('image', $scriptProperties, 'qllFeaturedImage');
$featuredCredits = $modx->getOption('credits', $scriptProperties, 'qllFeaturedCredits');
$featuredCaption = $modx->getOption('caption', $scriptProperties, 'qllFeaturedCaption');
$tpl             = $modx->getOption('tpl', $scriptProperties, 'qllFigure');

/* Verify inputs */
if (!isset($scriptProperties['id'])) {
    $modx->log(modX::LOG_LEVEL_ERROR, '[' . $snippet . '] missing required properties &id!');
    return;
}

/* Get the resource with the featured image */
$doc = (isset($id)) ? $modx->getObject('modResource', $id) : '';
if ($doc) {
    if (!empty($doc->getTVValue($featured))) {
        $image   = $doc->getTVValue($featured);
        $credits = $doc->getTVValue($featuredCredits);
        $caption = $doc->getTVValue($featuredCaption);

        $output = $modx->getChunk($tpl, array(
            'img' => $image,
            'caption' => $caption,
            'credits' => $credits
        ));
    }
}

return $output;