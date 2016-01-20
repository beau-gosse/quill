<?php
/**
* Resolves System Settings for Quill extra.
* Script loosley based on flatso theme's sample_settings.php resolver
* Special thanks to John Peca (theboxer) and Wayne Roddy (dubrod)
* for the groundwork.
*/
if (!$object->xpdo) return false;
/** @var modX $modx */
$modx =& $object->xpdo;
if (!function_exists('getResourceMap')) {
    function getResourceMap() {
        global $modx;
        $assetsPath = rtrim($modx->getOption('quill.assets_path',null,$modx->getOption('assets_path').'components/quill/'), '/') . '/';
        $rmf = $assetsPath . 'resourcemap.php';
        if (is_readable($rmf)) {
            $map = include $rmf;
        } else {
            $map = array();
        }
        return $map;
    }
}
switch ($options[xPDOTransport::PACKAGE_ACTION]) {
    case xPDOTransport::ACTION_INSTALL:
        //if (isset($options['install_resources']) && empty($options['install_resources'])) return true;

        $resourceMap =  getResourceMap();

        // Set Default Author's related user id
        $authorPageUser = $modx->getObject('modResource', $resourceMap['Default Author']);
        if ($authorPageUser) {
            $currentUser = ($modx->user->hasSessionContext('mgr')) ? $modx->user->get('id') : 1;
            $authorPageUser->setTVValue('qllAuthor', $currentUser);
        }

        // Update Defaut Author resource
        $authorPage = $modx->getObject('modResource', $resourceMap['Default Author']);
        if ($authorPage) {
            $authorPage->set('pagetitle', $options['default_author_name']);
            $authorPage->set('alias', 'authors/' .preg_replace('/[\s-]+/', '-', strtolower($options['default_author_name'])));
            $authorPage->save();
        }

        $quill = $modx->getObject('modSystemSetting', array('key' => 'quill.doc_container'));
        if ($quill && !empty($resourceMap['Quill'])) {
            $quill->set('value', $resourceMap['Quill']);
            $quill->save();
        }

        $blog = $modx->getObject('modSystemSetting', array('key' => 'quill.blog_container'));
        if ($blog && !empty($resourceMap['Blog'])) {
            $blog->set('value', $resourceMap['Blog']);
            $blog->save();
        }

        $sections = $modx->getObject('modSystemSetting', array('key' => 'quill.sections_page'));
        if ($sections && !empty($resourceMap['Sections'])) {
            $sections->set('value', $resourceMap['Sections']);
            $sections->save();
        }

        $topics = $modx->getObject('modSystemSetting', array('key' => 'quill.topics_page'));
        if ($topics && !empty($resourceMap['Topics'])) {
            $topics->set('value', $resourceMap['Topics']);
            $topics->save();
        }

        $authors = $modx->getObject('modSystemSetting', array('key' => 'quill.authors_page'));
        if ($authors && !empty($resourceMap['Authors'])) {
            $authors->set('value', $resourceMap['Authors']);
            $authors->save();
        }

        $archive = $modx->getObject('modSystemSetting', array('key' => 'quill.archives_page'));
        if ($archive && !empty($resourceMap['Archives'])) {
            $archive->set('value', $resourceMap['Archives']);
            $archive->save();
        }

        $defaultAuthor = $modx->getObject('modSystemSetting', array('key' => 'quill.default_author_page'));
        if ($defaultAuthor && !empty($resourceMap['Default Author'])) {
            $defaultAuthor->set('value', $resourceMap['Default Author']);
            $defaultAuthor->save();
        }

        // Set Tagger's Tab titles
        $taggerTab = $modx->getObject('modSystemSetting', array('key' => 'tagger.place_in_tab_label'));
        if ($taggerTab) {
            $taggerTab->set('value', $resourceMap['Sections']);
            $taggerTab->save();
        }

        // Set error_page
        $error = $modx->getObject('modSystemSetting', array('key' => 'error_page'));
        if ($error && !empty($resourceMap['Page not found'])) {
            $error->set('value', $resourceMap['Page not found']);
            $error->save();
        }

        // Set site_unavailable_page
        $unavailable = $modx->getObject('modSystemSetting', array('key' => 'site_unavailable_page'));
        if ($unavailable && !empty($resourceMap['Site unavailable'])) {
            $unavailable->set('value', $resourceMap['Site unavailable']);
            $unavailable->save();
        }

        $search = $modx->getObject('modSystemSetting', array('key' => 'quill.search_page'));
        if ($search && !empty($resourceMap['Search'])) {
            $search->set('value', $resourceMap['Search']);
            $search->save();
        }

        $rss = $modx->getObject('modSystemSetting', array('key' => 'quill.rss_page'));
        if ($rss && !empty($resourceMap['RSS'])) {
            $rss->set('value', $resourceMap['RSS']);
            $rss->save();
        }

        // Set site default_template
        $tempSys = $modx->getObject('modSystemSetting', array('key' => 'default_template'));
        $tempNew = $modx->getObject('modTemplate', array('templatename' => 'Quill'));
        if ($tempSys && $tempNew) {
            $tempId = $tempNew->get('id');
            $tempSys->set('value', $tempId);
            $tempSys->save();
        }

        break;
    case xPDOTransport::ACTION_UPGRADE:
        break;
    case xPDOTransport::ACTION_UNINSTALL:
        break;
}
return true;
