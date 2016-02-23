<?php
/**
* Resolves custom Collections template for Quill extra.
*/
if (!$object->xpdo) return false;
/** @var modX $modx */
$modx =& $object->xpdo;

switch ($options[xPDOTransport::PACKAGE_ACTION]) {
    case xPDOTransport::ACTION_INSTALL:

    case xPDOTransport::ACTION_UPGRADE:

        $collectionsCorePath = $modx->getOption('collections.core_path', null, $modx->getOption('core_path', null, MODX_CORE_PATH) . 'components/collections/');
        /** @var Collections $collections */
        $collections = $modx->getService(
            'collections',
            'Collections',
            $collectionsCorePath . 'model/collections/',
            array(
                'core_path' => $collectionsCorePath
            )
        );

        $resTemplate = $modx->getObject('modTemplate', array('templatename' => 'Quill'));
        $container = $modx->getObject('modSystemSetting', array('key' => 'quill2.blog_container'));

        $ct = $modx->getObject('CollectionTemplate', array('name' => 'Quill'));

        /* Create Collections template object if it doesn't exitst */
        if (!$ct) {
            $ct = $modx->newObject('CollectionTemplate');
            $ct->set('name', 'Quill');
            $ct->set('description', 'A custom view for Quill-themed blogs.');
            $ct->set('global_template', false);
            $ct->set('bulk_actions', true);
            $ct->set('allow_dd', true); // => Allow drag & drop
            $ct->set('page_size', 10);
            $ct->set('sort_field', 'publishedon');
            $ct->set('sort_dir', 'desc');
            $ct->set('child_template', null);
            $ct->set('child_resource_type', 'modDocument');
            $ct->set('resource_type_selection', true);
            $ct->set('tab_label', 'Posts');
            $ct->set('button_label', 'New Post');
            $ct->set('back_to_collection_label', 'All Posts');

            if ($resTemplate) {
                $ct->set('child_template', $resTemplate->id);
            }

            /* Add Columns */
            $columns = array();
            $columns[0] = $modx->newObject('CollectionTemplateColumn');
            $columns[0]->fromArray(array(
                'label' => 'id',
                'name' => 'id',
                'hidden' => true,
                'sortable' => true,
                'width' => 40,
                'editor' => '',
                'renderer' => '',
                'position' => 0,
            ));

            $columns[1] = $modx->newObject('CollectionTemplateColumn');
            $columns[1]->fromArray(array(
                'label' => 'Date',
                'name' => 'publishedon',
                'hidden' => false,
                'sortable' => true,
                'width' => 40,
                'editor' => '',
                'renderer' => 'Collections.renderer.datetimeTwoLines',
                'position' => 1,
            ));

            $columns[2] = $modx->newObject('CollectionTemplateColumn');
            $columns[2]->fromArray(array(
                'label' => 'Title',
                'name' => 'pagetitle',
                'hidden' => false,
                'sortable' => true,
                'width' => 170,
                'editor' => '',
                'renderer' => 'Collections.renderer.pagetitleWithButtons',
                'position' => 2,
            ));

            $columns[3] = $modx->newObject('CollectionTemplateColumn');
            $columns[3]->fromArray(array(
                'label' => 'Alias',
                'name' => 'alias',
                'hidden' => true,
                'sortable' => true,
                'width' => 100,
                'editor' => '',
                'renderer' => '',
                'position' => 3,
            ));

            $columns[4] = $modx->newObject('CollectionTemplateColumn');
            $columns[4]->fromArray(array(
                'label' => 'resource_menuindex',
                'name' => 'menuindex',
                'hidden' => true,
                'sortable' => true,
                'width' => 50,
                'editor' => '{"xtype":"numberfield","allowNegative":false,"allowDecimal":false}',
                'renderer' => '',
                'position' => 4,
            ));

            $ct->addMany($columns, 'Columns');
            $ct->save();
        }

        /* Assign the template to the blog container */
        $csTemplate = $ct->get('id');
        $cs = $modx->getObject('CollectionSetting', array('collection' => $container));
        $cs->set('template', $csTemplate);
        $cs->save();

        break;
    case xPDOTransport::ACTION_UNINSTALL:
        break;
}

return true;
