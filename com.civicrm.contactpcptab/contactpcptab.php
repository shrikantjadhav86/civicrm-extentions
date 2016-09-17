<?php

require_once 'contactpcptab.civix.php';





/**
* Implements hook_civicrm_tab().
*
*
**/

function contactpcptab_civicrm_tabset($tabsetName, &$tabs, $context) {
  //check if the tabset is Contact Summary Page
  if ($tabsetName == 'civicrm/contact/view') {
    // unset the contribition tab, i.e. remove it from the page
    unset( $tabs[1] );
    $contactId = $context['contact_id'];
    // let's add a new "contribution" tab with a different name and put it last
    // this is just a demo, in the real world, you would create a url which would
    // return an html snippet etc.
    $url = CRM_Utils_System::url( 'civicrm/contact/view/pcp',
                                  "reset=1&cid=$contactId" );
    // $url should return in 4.4 and prior an HTML snippet e.g. '<div><p>....';
    // in 4.5 and higher this needs to be encoded in json. E.g. json_encode(array('content' => <html form snippet as previously provided>));
    // or CRM_Core_Page_AJAX::returnJsonResponse($content) where $content is the html code
    // in the first cases you need to echo the return and then exit, if you use CRM_Core_Page method you do not need to worry about this.
    $tabs[] = array( 'id'    => 'pcpTab',
      'url'   => $url,
      'title' => 'Personal Contact Page',
      'weight' => 300,
    );
  }
  }

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function contactpcptab_civicrm_config(&$config) {
  _contactpcptab_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @param array $files
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function contactpcptab_civicrm_xmlMenu(&$files) {
  _contactpcptab_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function contactpcptab_civicrm_install() {
  _contactpcptab_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function contactpcptab_civicrm_uninstall() {
  _contactpcptab_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function contactpcptab_civicrm_enable() {
  _contactpcptab_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function contactpcptab_civicrm_disable() {
  _contactpcptab_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @param $op string, the type of operation being performed; 'check' or 'enqueue'
 * @param $queue CRM_Queue_Queue, (for 'enqueue') the modifiable list of pending up upgrade tasks
 *
 * @return mixed
 *   Based on op. for 'check', returns array(boolean) (TRUE if upgrades are pending)
 *                for 'enqueue', returns void
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function contactpcptab_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _contactpcptab_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function contactpcptab_civicrm_managed(&$entities) {
  _contactpcptab_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * @param array $caseTypes
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function contactpcptab_civicrm_caseTypes(&$caseTypes) {
  _contactpcptab_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function contactpcptab_civicrm_angularModules(&$angularModules) {
_contactpcptab_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function contactpcptab_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _contactpcptab_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Functions below this ship commented out. Uncomment as required.
 *

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_preProcess
 *
function contactpcptab_civicrm_preProcess($formName, &$form) {

} // */

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_navigationMenu
 *
function contactpcptab_civicrm_navigationMenu(&$menu) {
  _contactpcptab_civix_insert_navigation_menu($menu, NULL, array(
    'label' => ts('The Page', array('domain' => 'com.civicrm.contactpcptab')),
    'name' => 'the_page',
    'url' => 'civicrm/the-page',
    'permission' => 'access CiviReport,access CiviContribute',
    'operator' => 'OR',
    'separator' => 0,
  ));
  _contactpcptab_civix_navigationMenu($menu);
} // */
