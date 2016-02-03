<?php

/* RelatedUser */
$output = $modx->runSnippet('Rowboat', array(
    'table' => 'modx_users',
    'where' => '{"active:=":1}',
    'tpl' => 'qllUserOptionTpl',
    'outputSeparator' => '||'
));

return $output;
