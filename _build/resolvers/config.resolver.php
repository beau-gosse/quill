<?php
/**
* Resolves Client configs for Quill extra.
* Script loosley based on flatso theme's config.php resolver
* Special thanks to John Peca (theboxer) and Wayne Roddy (dubrod)
* for the groundwork.
*/

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

if (!function_exists('createQuillCgSettings')) {
    function createQuillCgSettings() {
        global $modx;

        /* Load clientConfig package*/
        $clientConfigCorePath = $modx->getOption('clientconfig.core_path', null, $modx->getOption('core_path', null, MODX_CORE_PATH) . 'components/clientconfig/');
        /** @var ClientConfig $clientConfig */
        $clientConfig = $modx->getService(
            'clientconfig',
            'ClientConfig',
            $clientConfigCorePath . 'model/clientconfig/',
            array(
                'core_path' => $clientConfigCorePath
            )
        );

        /* Create setting groups */
        $groups = array();

        // Content
        $group = $modx->getObject('cgGroup', array('label' => 'Content'));
        if (!$group) {
           $group = $modx->newObject('cgGroup');
           $group->set('label', 'Content');
           $group->set('description', 'Global content settings.');
           $group->set('sortorder', '0');
           $group->save();
        }
        $groups['content'] = $group->id;

        // Images
        $group = $modx->getObject('cgGroup', array('label' => 'Images'));
        if (!$group) {
           $group = $modx->newObject('cgGroup');
           $group->set('label', 'Images');
           $group->set('description', 'Image settings.');
           $group->set('sortorder', '1');
           $group->save();
        }
        $groups['images'] = $group->id;

        // Navigation
        $group = $modx->getObject('cgGroup', array('label' => 'Navigation'));
        if (!$group) {
           $group = $modx->newObject('cgGroup');
           $group->set('label', 'Navigation');
           $group->set('description', 'Settings for navigational elements.');
           $group->set('sortorder', '2');
           $group->save();
        }
        $groups['navigation'] = $group->id;

        // CSS
        $group = $modx->getObject('cgGroup', array('label' => 'CSS'));
        if (!$group) {
           $group = $modx->newObject('cgGroup');
           $group->set('label', 'CSS');
           $group->set('description', 'CSS settings.');
           $group->set('sortorder', '3');
           $group->save();
        }
        $groups['css'] = $group->id;

        // JS
        $group = $modx->getObject('cgGroup', array('label' => 'JS'));
        if (!$group) {
           $group = $modx->newObject('cgGroup');
           $group->set('label', 'JS');
           $group->set('description', 'JavaScript settings.');
           $group->set('sortorder', '4');
           $group->save();
        }
        $groups['js'] = $group->id;

        // Fonts
        $group = $modx->getObject('cgGroup', array('label' => 'Fonts'));
        if (!$group) {
           $group = $modx->newObject('cgGroup');
           $group->set('label', 'Fonts');
           $group->set('description', 'Global font settings.');
           $group->set('sortorder', '5');
           $group->save();
        }
        $groups['fonts'] = $group->id;

        // Social Media
        $group = $modx->getObject('cgGroup', array('label' => 'Social Media'));
        if (!$group) {
           $group = $modx->newObject('cgGroup');
           $group->set('label', 'Social Media');
           $group->set('description', 'Social Media settings.');
           $group->set('sortorder', '6');
           $group->save();
        }
        $groups['socialmedia'] = $group->id;

        // Quill
        $group = $modx->getObject('cgGroup', array('label' => 'Quill'));
        if (!$group) {
           $group = $modx->newObject('cgGroup');
           $group->set('label', 'Quill');
           $group->set('description', 'Quill Project settings.');
           $group->set('sortorder', '7');
           $group->save();
        }
        $groups['quill'] = $group->id;

        /* Get Tagger Group ids */
        $sectionGroup = $modx->getObject('TaggerGroup', array('alias' => 'section'));
        $sgid = ($sectionGroup) ? $sectionGroup->get('id') : '';

        $topicGroup = $modx->getObject('TaggerGroup', array('alias' => 'key'));
        $tgid = ($topicGroup) ? $topicGroup->get('id') : '';

        /* Create settings */
        $settings = array(
            array(
                'key' => 'quill_blog_name',
                'label' => 'Blog Name',
                'xtype' => 'textfield',
                'description' => 'The name/title of your blog.',
                'is_required' => '0',
                'sortorder' => '1',
                'value' => '[[++site_name]]',
                'default' => '',
                'group' => $groups['content'],
                'options' => ''
            ),
            array(
                'key' => 'quill_blog_description',
                'label' => 'Blog Description',
                'xtype' => 'textfield',
                'description' => 'A short description for your blog.',
                'is_required' => '0',
                'sortorder' => '2',
                'value' => '[[*description]]',
                'default' => '',
                'group' => $groups['content'],
                'options' => ''
            ),
            array(
                'key' => 'quill_section_group',
                'label' => 'Section Tag Group',
                'xtype' => 'textfield',
                'description' => 'The id assigned by Tagger to the Section tag group. (See: Extras > Tagger)',
                'is_required' => '0',
                'sortorder' => '4',
                'value' => $sgid,
                'default' => '',
                'group' => $groups['content'],
                'options' => ''
            ),
            array(
                'key' => 'quill_topic_group',
                'label' => 'Topic Tag Group',
                'xtype' => 'textfield',
                'description' => 'The id assigned by Tagger to the Topic tag group. (See: Extras > Tagger)',
                'is_required' => '0',
                'sortorder' => '6',
                'value' => $tgid,
                'default' => '',
                'group' => $groups['content'],
                'options' => ''
            ),
            array(
                'key' => 'quill_footer_content',
                'label' => 'Footer Content',
                'xtype' => 'textfield',
                'description' => 'The content displayed in the left end side of the footer.',
                'is_required' => '1',
                'sortorder' => '14',
                'value' => 'Themed by <a href="[[++quill_download_url]]?src=footer" target="_blank">Quill</a>. Powered by "<a href="http://modx.com" target="_blank">MODX</a>.',
                'default' => '',
                'group' => $groups['content'],
                'options' => ''
            ),
            array(
                'key' => 'quill_copyright',
                'label' => 'Copyright',
                'xtype' => 'textfield',
                'description' => 'The blog\'s footer copyright notice.',
                'is_required' => '0',
                'sortorder' => '15',
                'value' => 'Copyright &copy; [[qllGetTime? &format=`Y`]] [[++site_name]]. All rights reserved.',
                'default' => '',
                'group' => $groups['content'],
                'options' => ''
            ),
            array(
                'key' => 'quill_logo',
                'label' => 'Logo',
                'xtype' => 'modx-panel-tv-image',
                'description' => 'The blog\'s logo.',
                'is_required' => '0',
                'sortorder' => '16',
                'value' => 'http://cdn.kleverr.com/pjx/quill/img/quill-logo.svg',
                'default' => '',
                'group' => $groups['images'],
                'options' => ''
            ),
            array(
                'key' => 'quill_favicon',
                'label' => 'Favicon',
                'xtype' => 'textfield',
                'description' => 'Path to the site\'s favicon.',
                'is_required' => '0',
                'sortorder' => '17',
                'value' => '/favicon.png',
                'default' => '',
                'group' => $groups['images'],
                'options' => ''
            ),
            array(
                'key' => 'quill_favicon_type',
                'label' => 'Favicon Type',
                'xtype' => 'textfield',
                'description' => 'The MIME type for the site\'s favicon.',
                'is_required' => '0',
                'sortorder' => '18',
                'value' => 'image/png',
                'default' => '',
                'group' => $groups['images'],
                'options' => ''
            ),
            array(
                'key' => 'quill_pagination_page',
                'label' => 'Pagination Page',
                'xtype' => 'textfield',
                'description' => 'The layout of the pagination item.',
                'is_required' => '0',
                'sortorder' => '20',
                'value' => '<li class="page-item"><a href="[[+href]]" class="page-link">[[+pageNo]]</a></li>',
                'default' => '',
                'group' => $groups['navigation'],
                'options' => ''
            ),
            array(
                'key' => 'quill_pagination_page_active',
                'label' => 'Page Active Page',
                'xtype' => 'textfield',
                'description' => 'The layout of the pagination active page item.',
                'is_required' => '0',
                'sortorder' => '21',
                'value' => '<li class="page-item active"><span class="page-link">[[+pageNo]]</span></li>',
                'default' => '',
                'group' => $groups['navigation'],
                'options' => ''
            ),
            array(
                'key' => 'quill_pagination_page_next',
                'label' => 'Pagination Next Page',
                'xtype' => 'textfield',
                'description' => 'The layout of the pagination next page item.',
                'is_required' => '0',
                'sortorder' => '22',
                'value' => '<li class="page-item"><a href="[[+href]]" class="page-link">Next &rarr;</a></li>',
                'default' => '',
                'group' => $groups['navigation'],
                'options' => ''
            ),
            array(
                'key' => 'quill_pagination_page_prev',
                'label' => 'Page Previous Page',
                'xtype' => 'textfield',
                'description' => 'The layout of the pagination previous page item.',
                'is_required' => '0',
                'sortorder' => '23',
                'value' => '<li class="page-item"><a href="[[+href]]" class="page-link">&larr; Previous</a></li>',
                'default' => '',
                'group' => $groups['navigation'],
                'options' => ''
            ),
            array(
                'key' => 'quill_pagination_wrapper',
                'label' => 'Pagination Wrapper',
                'xtype' => 'textfield',
                'description' => 'The pagination wrapper.',
                'is_required' => '0',
                'sortorder' => '24',
                'value' => '<h3 class="section-title top-spacer">Show more</h3><ul class="pagination m-b-0">[[+prev]][[+pages]][[+next]]</ul>',
                'default' => '',
                'group' => $groups['navigation'],
                'options' => ''
            ),
            array(
                'key' => 'quill_css',
                'label' => 'CSS File',
                'xtype' => 'textfield',
                'description' => 'Path to Quill\'s CSS file.',
                'is_required' => '0',
                'sortorder' => '25',
                'value' => 'assets/components/quill/css/all.min.css',
                'default' => '',
                'group' => $groups['css'],
                'options' => ''
            ),
            array(
                'key' => 'quill_css_mgr',
                'label' => 'Manager CSS',
                'xtype' => 'textfield',
                'description' => 'Path to the CSS file used with RTEs.',
                'is_required' => '0',
                'sortorder' => '26',
                'value' => 'assets/components/quill/css/mgr.min.css',
                'default' => '',
                'group' => $groups['css'],
                'options' => ''
            ),
            array(
                'key' => 'quill_js',
                'label' => 'JS File',
                'xtype' => 'textfield',
                'description' => 'Path to Quill\'s JS file.',
                'is_required' => '1',
                'sortorder' => '27',
                'value' => 'assets/components/quill/js/quill.app.js',
                'default' => '',
                'group' => $groups['js'],
                'options' => ''
            ),
            array(
                'key' => 'quill_js_bootstrap',
                'label' => 'Bootstrap JS',
                'xtype' => 'textfield',
                'description' => 'Path to Bootstrap\'s JS file used by Quill.',
                'is_required' => '1',
                'sortorder' => '28',
                'value' => '//cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.min.js',
                'default' => '',
                'group' => $groups['js'],
                'options' => ''
            ),
            array(
                'key' => 'quill_bootstrap_url',
                'label' => 'Bootstrap URL',
                'xtype' => 'textfield',
                'description' => 'Bootstrap download URL.',
                'is_required' => '0',
                'sortorder' => '28',
                'value' => 'http://v4-alpha.getbootstrap.com/',
                'default' => '',
                'group' => $groups['js'],
                'options' => ''
            ),
            array(
                'key' => 'quill_bootstrap_version',
                'label' => 'Bootstrap Version',
                'xtype' => 'textfield',
                'description' => 'The version of Bootstrap used by Quill.',
                'is_required' => '0',
                'sortorder' => '29',
                'value' => 'V4 (alpha)',
                'default' => '',
                'group' => $groups['js'],
                'options' => ''
            ),
            array(
                'key' => 'quill_js_jquery',
                'label' => 'JQuery',
                'xtype' => 'textfield',
                'description' => 'Path to JQuery.',
                'is_required' => '1',
                'sortorder' => '30',
                'value' => '//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js',
                'default' => '',
                'group' => $groups['js'],
                'options' => ''
            ),
            array(
                'key' => 'quill_js_unveil',
                'label' => 'Jquery Unveil',
                'xtype' => 'textfield',
                'description' => 'Path to jQuery Unveil (used to lazy load images).',
                'is_required' => '1',
                'sortorder' => '31',
                'value' => '//cdnjs.cloudflare.com/ajax/libs/unveil/1.3.0/jquery.unveil.min.js',
                'default' => '',
                'group' => $groups['js'],
                'options' => ''
            ),
            array(
                'key' => 'quill_js_tether',
                'label' => 'Tether JS',
                'xtype' => 'textfield',
                'description' => 'Path to tether.js. This file is required by Bootstrap to display tooltips.',
                'is_required' => '0',
                'sortorder' => '32',
                'value' => '//cdnjs.cloudflare.com/ajax/libs/tether/1.1.1/js/tether.min.js',
                'default' => '',
                'group' => $groups['js'],
                'options' => ''
            ),
            array(
                'key' => 'quill_font_family',
                'label' => 'Sans-serif Font Family',
                'xtype' => 'textfield',
                'description' => 'Quill\'s main sans-serif font family (loaded with Web Font Loader). This is used in Headlines.',
                'is_required' => '1',
                'sortorder' => '33',
                'value' => 'Lato:300,400,700,900',
                'default' => '',
                'group' => $groups['fonts'],
                'options' => ''
            ),
            array(
                'key' => 'quill_disqus_shortname',
                'label' => 'Disqus Shortname',
                'xtype' => 'textfield',
                'description' => 'The blog\'s unique Disqus identifier.',
                'is_required' => '1',
                'sortorder' => '34',
                'value' => 'quilltheme',
                'default' => '',
                'group' => $groups['socialmedia'],
                'options' => ''
            ),
            array(
                'key' => 'quill_demo_url',
                'label' => 'Demo URL',
                'xtype' => 'textfield',
                'description' => 'Quill\'s demo site.',
                'is_required' => '1',
                'sortorder' => '35',
                'value' => 'http://quill.kleverr.modxcloud.com',
                'default' => '',
                'group' => $groups['quill'],
                'options' => ''
            ),
            array(
                'key' => 'quill_github_url',
                'label' => 'Github URL',
                'xtype' => 'textfield',
                'description' => 'Quill\'s Github URL.',
                'is_required' => '1',
                'sortorder' => '36',
                'value' => 'https://github.com/beau-gosse/quill',
                'default' => '',
                'group' => $groups['quill'],
                'options' => ''
            ),
            array(
                'key' => 'quill_download_url',
                'label' => 'Download URL',
                'xtype' => 'textfield',
                'description' => 'Quill Download URL.',
                'is_required' => '1',
                'sortorder' => '37',
                'value' => 'http://modx.com/extras/package/quill',
                'default' => '',
                'group' => $groups['quill'],
                'options' => ''
            ),

        );

        /* Save settings */
        foreach ($settings as $setting) {
            $settingObject = $modx->getObject('cgSetting', array('key' => $setting['key']));
            if (!$settingObject) {
                $settingObject = $modx->newObject('cgSetting');
                $settingObject->set('key', $setting['key']);
                $settingObject->set('label', $setting['label']);
                $settingObject->set('xtype', $setting['xtype']);
                $settingObject->set('description', $setting['description']);
                $settingObject->set('is_required', $setting['is_required']);
                $settingObject->set('sortorder', $setting['sortorder']);
                $settingObject->set('value', $setting['value']);
                $settingObject->set('default', $setting['default']);
                $settingObject->set('group', $setting['group']);
                $settingObject->set('options', $setting['options']);
                $settingObject->save();
            }
        }

      }
  }


switch ($options[xPDOTransport::PACKAGE_ACTION]) {
  case xPDOTransport::ACTION_INSTALL:

    createQuillCgSettings();

    break;
  case xPDOTransport::ACTION_UPGRADE:

    //$resourceMap = getResourceMap();
    createQuillCgSettings();

    break;
  case xPDOTransport::ACTION_UNINSTALL:

    break;
}

return true;
