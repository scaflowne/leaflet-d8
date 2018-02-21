<?php

namespace Drupal\leafletcustomsettings\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class locationsSettings.
 */
class locationsSettings extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'leafletcustomsettings.locationssettings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'locations_settings';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('leafletcustomsettings.locationssettings');
    $form['disable_marketcruster_paths_loca'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Disable Marketcruster Paths Locations'),
      '#default_value' => $config->get('disable_marketcruster_paths_loca'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('leafletcustomsettings.locationssettings')
      ->set('disable_marketcruster_paths_loca', $form_state->getValue('disable_marketcruster_paths_loca'))
      ->save();
  }

}
