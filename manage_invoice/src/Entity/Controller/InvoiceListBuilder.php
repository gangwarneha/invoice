<?php
namespace Drupal\manage_invoice\Entity\Controller;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Url;

/**
 * Provides a list controller for content_entity_manage_invoice entity.
 *
 * @ingroup manage_invoice
 */
class InvoiceListBuilder extends EntityListBuilder {

  /**
   * {@inheritdoc}
   *
   * We override ::render() so that we can add our own content above the table.
   * parent::render() is where EntityListBuilder creates the table using our
   * buildHeader() and buildRow() implementations.
   */
  public function render() {
    $build['description'] = array(
      '#markup' => $this->t('Content Entity Example implements a Invoice model. These invoices are fieldable entities. You can manage the fields on the <a href="@adminlink">Invoice admin page</a>.', array(
        '@adminlink' => \Drupal::urlGenerator()
          ->generateFromRoute('manage_invoice.invoice_settings'),
      )),
    );
    $build['table'] = parent::render();
    return $build;
  }

  /**
   * {@inheritdoc}
   *
   * to load entity for sortable header
  */  
  public function load() {
    $entity_query = \Drupal::service('entity.query')->get('content_entity_manage_invoice');
    $header = $this->buildHeader();
    $entity_query->pager(10);
    $entity_query->tableSort($header);
    $uids = $entity_query->execute();

    return $this->storage->loadMultiple($uids);
  }

  /**
   * {@inheritdoc}
   *
   * Building the header and content lines for the invoice list.
   *
   * Calling the parent::buildHeader() adds a column for the possible actions
   * and inserts the 'edit' and 'delete' links as defined for the entity type.
   */
  public function buildHeader() {
    $header = array(
	    'id' => array(
            'data' => $this->t('Invoice number'),
            'field' => 'id',
            'specifier' => 'id',
            'class' => array(RESPONSIVE_PRIORITY_LOW),
        ),
		'subject' => array(
            'data' => $this->t('Subject'),
            'field' => 'subject',
            'specifier' => 'subject',
        ),

        'company' => array(
            'data' => $this->t('Company Name'),
            'field' => 'company',
            'specifier' => 'company',
        ),

        'invoice_date' => array(
            'data' => $this->t('Date'),
            'field' => 'invoice_date',
            'specifier' => 'invoice_date',
        ),);
	// $header['subject'] = $this->t('Subject');
	// $header['company'] = $this->t('Company Name');
	// $header['invoice_date'] = $this->t('Date');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var $entity \Drupal\manage_invoice\Entity\Invoice */
    $row['id'] = $entity->id();
    $row['subject'] = $entity->subject->value;
	$row['company'] = $entity->link();
    $row['invoice_date'] = $entity->invoice_date->value;
   
    return $row + parent::buildRow($entity);
  }

}

?>