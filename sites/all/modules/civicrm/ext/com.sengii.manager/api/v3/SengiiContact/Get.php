<?php
use CRM_Updates_ExtensionUtil as E;

/**
 * SengiiContact.Get API specification (optional)
 * This is used for documentation and validation.
 *
 * @param array $spec description of fields supported by this API call
 * @return void
 * @see http://wiki.civicrm.org/confluence/display/CRMDOC/API+Architecture+Standards
 */
function _civicrm_api3_sengii_contact_Get_spec(&$spec) {
  $spec['date']['api.required'] = 1;
}

/**
 * SengiiContact.Get API
 *
 * @param array $params
 * @return array API result descriptor
 * @see civicrm_api3_create_success
 * @see civicrm_api3_create_error
 * @throws API_Exception
 */
function civicrm_api3_sengii_contact_Get($params) {
  if (array_key_exists('date', $params)) {
    try{
    $result = civicrm_api3('Contact', 'get', [
      'sequential' => 1,
      'return' => [
                   "id",
                   "do_not_email",
                   "do_not_sms",
                   "is_opt_out",
                   "display_name",
                   "nick_name",
                   "image_URL",
                   "first_name",
                   "middle_name",
                   "last_name",
                   "formal_title",
                   "birth_date",
                   "is_deceased",
                   "job_title",
                   "is_deleted",
                   "created_date",
                   "modified_date",
                   "employer_id",
                   "organization_name",
                   "contact_type",
                   "contact_sub_type",
                   "gender_id",
                   "street_address",
                   "city",
                   "state_province_name",
                   "country",
                   "postal_code",
                   "email"],
      'modified_date' => ['>=' => $params["date"]]
    ]);
  }catch(CiviCRM_API3_Exception $e){
    $error = $e->getMessage();
  }

    // Spec: civicrm_api3_create_success($values = 1, $params = array(), $entity = NULL, $action = NULL)
    return civicrm_api3_create_success($result, $params, 'NewEntity', 'NewAction');
  }
  else {
    throw new API_Exception(/*errorMessage*/ 'Please specify a date.', /*errorCode*/ 1234);
  }
}
