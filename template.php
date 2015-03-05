<?php

/**
* Implements hook_entity_info_alter().
*/
function davepietro_entity_info_alter(&$entity_info) {
  $entity_info['node']['view modes']['another_teaser'] = array(
    'label' => t('Another teaser'),
    'custom settings' => TRUE,
  );
}


/**
 * Returns HTML for a date element formatted as a range.
 */
function davepietro_date_display_range($variables) {
  $date1 = $variables['date1'];
  $date2 = $variables['date2'];
  $timezone = $variables['timezone'];
  $attributes_start = $variables['attributes_start'];
  $attributes_end = $variables['attributes_end'];

  $start_date = '<span class="date-display-start"' . drupal_attributes($attributes_start) . '>' . $date1 . '</span>';
  $end_date = '<span class="date-display-end"' . drupal_attributes($attributes_end) . '>' . $date2 . $timezone . '</span>';

  // If microdata attributes for the start date property have been passed in,
  // add the microdata in meta tags.
  if (!empty($variables['add_microdata'])) {
    $start_date .= '<meta' . drupal_attributes($variables['microdata']['value']['#attributes']) . '/>';
    $end_date .= '<meta' . drupal_attributes($variables['microdata']['value2']['#attributes']) . '/>';
  }

  // Wrap the result with the attributes.
  // This whole thing is just to rewrite this line!
  return t('!start-date-!end-date', array(
    '!start-date' => $start_date,
    '!end-date' => $end_date,
  ));
}

?>