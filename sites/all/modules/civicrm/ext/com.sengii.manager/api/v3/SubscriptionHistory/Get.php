<?php
use CRM_Manager_ExtensionUtil as E;

/**
 * SubscriptionHistory.Get API specification (optional)
 * This is used for documentation and validation.
 *
 * @param array $spec description of fields supported by this API call
 * @return void
 * @see http://wiki.civicrm.org/confluence/display/CRMDOC/API+Architecture+Standards
 */
function _civicrm_api3_subscription_history_Get_spec(&$spec) {
  //$spec['magicword']['api.required'] = 1;
}

/**
 * SubscriptionHistory.Get API
 *
 * @param array $params
 * @return array API result descriptor
 * @see civicrm_api3_create_success
 * @see civicrm_api3_create_error
 * @throws API_Exception
 */
function civicrm_api3_subscription_history_Get($params) {
  //if (array_key_exists('magicword', $params) && $params['magicword'] == 'sesame') {
    $result = civicrm_api3('SubscriptionHistory', 'get', [
        //'sequential' => 1,
        //'date' => ['>=' => $params["date"]]
      ]);
    // ALTERNATIVE: $returnValues = array(); // OK, success
    // ALTERNATIVE: $returnValues = array("Some value"); // OK, return a single value

    // Spec: civicrm_api3_create_success($values = 1, $params = array(), $entity = NULL, $action = NULL)
    return civicrm_api3_create_success($result, $params, 'NewEntity', 'NewAction');
  //}
  //else {
  //  throw new API_Exception(/*errorMessage*/ 'Everyone knows that the magicword is "sesame"', /*errorCode*/ 1234);
  //}
}
