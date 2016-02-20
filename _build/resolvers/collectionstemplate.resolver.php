<?php
/**
* Resolves custom Collections template for Quill extra.
* Loosely based on Collections' defaulttemplate resolver
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

        $template = $modx->getObject('modTemplate', array('templatename' => 'Quill'));

        /* Create Collections template */
        $collectionsTemplate = $modx->getObject('CollectionTemplate', array('name' => 'Quill'));
        if (!$collectionsTemplate) {
            $collectionsTemplate = $modx->newObject('CollectionTemplate');
            $collectionsTemplate->set('name', 'Quill');
            $collectionsTemplate->set('description', 'A custom view for Quill-themed blogs.');
            $collectionsTemplate->set('global_template', false);
            $collectionsTemplate->set('bulk_actions', true);
            $collectionsTemplate->set('allow_dd', true); // => Allow drag & drop
            $collectionsTemplate->set('page_size', 10);
            $collectionsTemplate->set('sort_field', 'publishedon');
            $collectionsTemplate->set('sort_dir', 'desc');
            $collectionsTemplate->set('child_template', null);
            $collectionsTemplate->set('child_resource_type', 'modDocument');
            $collectionsTemplate->set('resource_type_selection', true);
            $collectionsTemplate->set('tab_label', 'Posts');
            $collectionsTemplate->set('button_label', 'New Post');
            $collectionsTemplate->set('back_to_collection_label', 'All Posts');

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

            $collectionsTemplate->addMany($columns, 'Columns');

            if ($template) {
                $collectionsTemplate->set('child_template', $template->id);

                $resourceTemplates = array();
                $resourceTemplates[0] = $modx->newObject('CollectionResourceTemplate');
                $resourceTemplates[0]->fromArray(array(
                   'resource_template' => $template->id
                ));

                $collectionsTemplate->addMany($resourceTemplates, 'ResourceTemplates');
            }

            $collectionsTemplate->save();
        }

        break;
    case xPDOTransport::ACTION_UNINSTALL:
        break;
}

return true;
