<?php
/**
 *
 * qllGetDefaultAuthor
 *
 * @author Treigh PM <treigh@kleverr.com>
 *
 * This file is part of Quill, a modern and clutter-free blogging theme for MODX.
 *
 * This snippet returns the Default Author's user id.
 *
 * @package quill
 */

$authorPageObj = $modx->getObject('modResource', $modx->getOption('quill.default_author_page'));

if ($authorPageObj) {
    return ($modx->user->hasSessionContext('mgr')) ? $modx->user->get('id') : 1;
} else {
    $modx->log(modX::LOG_LEVEL_ERROR, '[qllGetDefaultAuthor] Default Author page not found.');
    return;
}
