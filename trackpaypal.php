<?php

require_once 'trackpaypal.civix.php';
use CRM_Trackpaypal_ExtensionUtil as E;

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function trackpaypal_civicrm_config(&$config) {
  _trackpaypal_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function trackpaypal_civicrm_xmlMenu(&$files) {
  _trackpaypal_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function trackpaypal_civicrm_install() {
  _trackpaypal_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_postInstall
 */
function trackpaypal_civicrm_postInstall() {
  _trackpaypal_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function trackpaypal_civicrm_uninstall() {
  _trackpaypal_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function trackpaypal_civicrm_enable() {
  _trackpaypal_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function trackpaypal_civicrm_disable() {
  _trackpaypal_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function trackpaypal_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _trackpaypal_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function trackpaypal_civicrm_managed(&$entities) {
  _trackpaypal_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function trackpaypal_civicrm_caseTypes(&$caseTypes) {
  _trackpaypal_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_angularModules
 */
function trackpaypal_civicrm_angularModules(&$angularModules) {
  _trackpaypal_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function trackpaypal_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _trackpaypal_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_entityTypes
 */
function trackpaypal_civicrm_entityTypes(&$entityTypes) {
  _trackpaypal_civix_civicrm_entityTypes($entityTypes);
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_preProcess
 *
function trackpaypal_civicrm_preProcess($formName, &$form) {

} // */

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_navigationMenu
 *
function trackpaypal_civicrm_navigationMenu(&$menu) {
  _trackpaypal_civix_insert_navigation_menu($menu, 'Mailings', array(
    'label' => E::ts('New subliminal message'),
    'name' => 'mailing_subliminal_message',
    'url' => 'civicrm/mailing/subliminal',
    'permission' => 'access CiviMail',
    'operator' => 'OR',
    'separator' => 0,
  ));
  _trackpaypal_civix_navigationMenu($menu);
} // */

/**
 * Implements hook_civicrm_buildForm().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_buildForm/
 */
function trackpaypal_civicrm_buildForm($formName, &$form) {
  if ($formName === 'CRM_Contribute_Form_Contribution_Main'
    || $formName === 'CRM_Contribute_Form_Contribution_Confirm') {
    // Is it a PayPal processor?
    $processorTypeId = $form->getVar('_paymentProcessor')['payment_processor_type_id'];

    // Add a hidden field to the form with the id/key 'gcid'
    // JavaScript code in the template will populate it
    // with the Google Analytics client from the visitor's browser
    $templatePath = realpath(dirname(__FILE__)."/templates");
    $form->add('hidden', 'gcid', '');
    CRM_Core_Region::instance('page-body')->add(array(
      'template' => "{$templatePath}/trackpaypal.tpl"
    ));
  }
}

/**
 * Implements hook_civicrm_alterPaymentProcessorParams().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_alterPaymentProcessorParams/
 */
function trackpaypal_civicrm_alterPaymentProcessorParams($paymentObj,&$rawParams, &$cookedParams) {
  $cookedParams['notify_url'] = 'http://mrlavalava.hopto.org:5555/civicrm/payment/ipn/3?';
  watchdog('paypal','Params: %params', array('%params' => print_r($cookedParams, true)), WATCHDOG_DEBUG);
  // Eway Payment Processor sometimes passes $cookedParams as an instance of GatewayRequest class
  // PHP complains if you try and use it as an array and we don't care about it in this instnce so return.
  if ($cookedParams instanceof GatewayRequest) {
    return;
  }
  else {
    if (isset($cookedParams['custom'])) {
      // Add the Google Analytics client ID value
      // to the JSON encoded 'custom' attribute
      // of the payload that goes to PayPal
      $customPayload = json_decode($cookedParams['custom'], true);
      $customPayload += ['gcid' => $rawParams['gcid']];
      $cookedParams['custom'] = json_encode($customPayload);
    }
  }
}

function trackpaypal_civicrm_postIPNProcess(&$IPNData) {
  // We've captured the IPN packet
  // Now we want to retrieve the Google Client ID
  // and transaction details to send to Google Analytics
  // via its REST interface
  watchdog('paypal','IPN payload: %payload', array('%payload' => print_r($IPNData, true)), WATCHDOG_DEBUG);
}
