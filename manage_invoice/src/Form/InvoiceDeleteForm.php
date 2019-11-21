<?php


namespace Drupal\manage_invoice\Form;

use Drupal\Core\Entity\ContentEntityConfirmFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

/**
 * Provides a form for deleting a manage_invoice entity.
 *
 * @ingroup manage_invoice
 */
class InvoiceDeleteForm extends ContentEntityConfirmFormBase {

  /**
   * {@inheritdoc}
   */
  public function getQuestion() {
    return $this->t("Are you sure you want to delete this invoice. This can't be undo");
  }

  /**
   * {@inheritdoc}
   *
   * If the delete command is canceled, return to the invoice list.
   */
  public function getCancelURL() {
    return new Url('entity.content_entity_manage_invoice.collection');
  }

  /**
   * {@inheritdoc}
   */
  public function getConfirmText() {
    return $this->t('Delete');
  }

  /**
   * {@inheritdoc}
   *
   * Delete the entity and log the event. log() replaces the watchdog.
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $entity = $this->getEntity();
    $entity->delete();

    \Drupal::logger('manage_invoice')->notice('@type: deleted %title.',
      array(
        '@type' => $this->entity->bundle(),
        '%title' => $this->entity->label(),
      ));
    $form_state->setRedirect('entity.content_entity_manage_invoice.collection');
  }

}

?>