<?php

/**
* @file
* Contains \Drupal\lotus\Controller\InvoiceController.php
*/
namespace Drupal\invoice\Controller;

use Drupal\Core\Controller\ControllerBase;

class InvoiceController extends ControllerBase {
  public function content() {

    return array(
      '#theme' => 'invoice',
      '#invoice_var' => $this->t('Test Value'),
    );
  }
}