<?php
/**
* Resolves tags for Quill extra.
* Script loosley based flatso theme's sample_content.php resolver
* Special thanks to John Peca (theboxer) and Wayne Roddy (dubrod)
* for the groundwork
*/
if (!$object->xpdo) return false;
/** @var modX $modx */
$modx =& $object->xpdo;

switch ($options[xPDOTransport::PACKAGE_ACTION]) {
    case xPDOTransport::ACTION_INSTALL:
        //if (isset($options['install_resources']) && empty($options['install_resources'])) return true;

        $taggerCorePath = $modx->getOption('tagger.core_path', null, $modx->getOption('core_path', null, MODX_CORE_PATH) . 'components/tagger/');
        /** @var Tagger $tagger */
        $tagger = $modx->getService(
            'tagger',
            'Tagger',
            $taggerCorePath . 'model/tagger/',
            array(
                'core_path' => $taggerCorePath
            )
        );

        $template = $modx->getObject('modTemplate', array('templatename' => 'Quill'));

        /* Create section group */
        $sectionGroup = $modx->getObject('TaggerGroup', array('alias' => 'section'));
        if (!$sectionGroup) {
            $sectionGroup = $modx->newObject('TaggerGroup');
            $sectionGroup->set('name', 'Section');
            $sectionGroup->set('alias', 'section');
            $sectionGroup->set('field_type', 'tagger-combo-tag');
            $sectionGroup->set('allow_new', 0);
            $sectionGroup->set('remove_unused', 0);
            $sectionGroup->set('allow_blank', 1);
            $sectionGroup->set('allow_type', 0);
            $sectionGroup->set('show_autotag', 0);
            $sectionGroup->set('hide_input', 0);
            $sectionGroup->set('tag_limit', 0);
            $sectionGroup->set('show_for_templates', '');
            $sectionGroup->set('place', 'in-tab');
            $sectionGroup->set('description', 'Sections allow broad grouping of post topics.');

            if ($template) {
                $sectionGroup->set('show_for_templates', $template->id);
            }

            $sectionGroup->save();
        }

        /* Create default sections */
        $sections = array('Thoughts','Experiments');

        foreach ($sections as $section) {
            $sectionObject = $modx->newObject('TaggerTag');
            $sectionObject->set('tag', $section);
            $sectionObject->set('alias', strtolower($section));
            $sectionObject->set('group', $sectionGroup->id);
            $sectionObject->save();
        }

        /* Create topic group */
        $topicGroup = $modx->getObject('TaggerGroup', array('alias' => 'key'));
        if (!$topicGroup) {
            $topicGroup = $modx->newObject('TaggerGroup');
            $topicGroup->set('name', 'Topic');
            $topicGroup->set('alias', 'key');
            $topicGroup->set('field_type', 'tagger-field-tags');
            $topicGroup->set('allow_new', 0);
            $topicGroup->set('remove_unused', 0);
            $topicGroup->set('allow_blank', 1);
            $topicGroup->set('allow_type', 0);
            $topicGroup->set('show_autotag', 0);
            $topicGroup->set('hide_input', 0);
            $topicGroup->set('tag_limit', 0);
            $topicGroup->set('show_for_templates', '');
            $topicGroup->set('place', 'in-tab');
            $topicGroup->set('description', 'Blog Post topics (tags)');

            if ($template) {
                $topicGroup->set('show_for_templates', $template->id);
            }

            $topicGroup->save();
        }

        /* Create default topics */
        $topics = array(
          'PSR-7','PSR-3','CMS','Slim','Laravel','Revolution','Evolution','MODX','MODX 3','MODX Next'
        );

        foreach ($topics as $topic) {
            $topicObject = $modx->newObject('TaggerTag');
            $topicObject->set('tag', $topic);
            $topicObject->set('alias', strtolower($topic));
            $topicObject->set('group', $topicGroup->id);
            $topicObject->save();
        }

        break;
    case xPDOTransport::ACTION_UPGRADE:
        break;
    case xPDOTransport::ACTION_UNINSTALL:
        break;
}

return true;
