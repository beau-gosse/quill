<?php
/**
 * Resolve linking TVs and Templates
 *
 * THIS RESOLVER IS AUTOMATICALLY GENERATED, NO CHANGES WILL APPLY
 *
 * @package quill2
 * @subpackage build
 */

if ($object->xpdo) {
    $modx =& $object->xpdo;
    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:
            /* list of tvs and templates for each */
            $tvs = array (
  'qllAuthor' => 
  array (
    0 => 'Quill',
  ),
  'qllFeaturedImage' => 
  array (
    0 => 'Quill',
  ),
  'qllImageCaption' => 
  array (
    0 => 'Quill',
  ),
  'qllImageCredits' => 
  array (
    0 => 'Quill',
  ),
  'qllLeftFloatbar' => 
  array (
    0 => 'Quill',
  ),
  'qllPageLayout' => 
  array (
    0 => 'Quill',
  ),
  'qllRightFloatbar' => 
  array (
    0 => 'Quill',
  ),
  'qllShowFeaturedImage' => 
  array (
    0 => 'Quill',
  ),
  'qllTwitterAccount' => 
  array (
    0 => 'Quill',
  ),
);
            foreach ($tvs as $tvName => $templateNames) {
                if (!is_array($templateNames) || empty($templateNames)) continue;
                $tv = $modx->getObject('modTemplateVar',array('name' => $tvName));
                if (empty($tv)) {
                    $modx->log(xPDO::LOG_LEVEL_ERROR,'Could not find TV: '.$tvName.' to associate to Templates.');
                    continue;
                }
                $rank = 0;
                foreach ($templateNames as $templateName) {
                    $template = $modx->getObject('modTemplate',array('templatename' => $templateName));
                    if (!empty($template)) {
                        $templateVarTemplate = $modx->getObject('modTemplateVarTemplate',array(
                            'tmplvarid' => $tv->get('id'),
                            'templateid' => $template->get('id'),
                        ));
                        if (!$templateVarTemplate) {
                            $templateVarTemplate = $modx->newObject('modTemplateVarTemplate');
                            $templateVarTemplate->fromArray(array(
                                'tmplvarid' => $tv->get('id'),
                                'templateid' => $template->get('id'),
                                'rank' => $rank,
                            ),'',true,true);
                            if ($templateVarTemplate->save() == false) {
                                $modx->log(xPDO::LOG_LEVEL_ERROR,'An unknown error occurred while trying to associate the TV '.$tvName.' to the Template '.$templateName);
                            }
                        }
                    } else {
                        $modx->log(xPDO::LOG_LEVEL_ERROR,'Could not find Template '.$templateName);
                    }
                    $rank++;
                }
            }
            break;
    }
}
return true;