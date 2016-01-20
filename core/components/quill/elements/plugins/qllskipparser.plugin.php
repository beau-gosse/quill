<?php
$eventName = $modx->event->name;
switch ($eventName) {
    case 'OnLoadWebDocument' :
        $output = $GLOBALS['code_content'] = $modx->resource->get('content');
        preg_match_all('/<code.*?>(.*?)<\/code>/ims', $output, $matches);

        $i = 0;
        foreach ((array) $matches[1] as $key => $match) {
            $output = str_replace($match, '~*code_' . $i . '*~', $output);
            $GLOBALS['code_matches']['~*code_' . $i . '*~'] = $match;
            $i++;
        }
        $modx->resource->set('content', $output);
        break;
    case 'OnWebPagePrerender' :
        $html = & $modx->resource->_output;
        $output = $modx->resource->get('content');
        preg_match_all('/<code.*?>(.*?)<\/code>/ims', $html, $matches);
        $i = 0;

        $replacements = array (
            '<' => '<',
            '>' => '>'
        );

        foreach ((array) $GLOBALS['code_matches'] as $key => $match) {
            $match = preg_replace('/&amp;([^\s]*;)/i', '&amp;amp;$1', $match);
            foreach ((array)$replacements as $key => $value) {
                $match = str_replace($key, $value, $match);
            }

            $html = str_replace('~*code_' . $i . '*~', $match, $html);
            $output = str_replace('~*code_' . $i . '*~', $match, $output);
            $i++;
        }
        $modx->resource->set('content', $output);
        break;
    case 'OnBeforeSaveWebPageCache' :
        $modx->resource->set('content', $GLOBALS['code_content']);
        break;
    default :
        break;
}