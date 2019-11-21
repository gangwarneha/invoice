<?php
namespace Drupal\manage_invoice;
use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\user\EntityOwnerInterface;
use Drupal\Core\Entity\EntityChangedInterface;
/**
 * Provides an interface defining a Invoice entity.
 * @ingroup manage_invoice
 */
interface InvoiceInterface extends ContentEntityInterface, EntityOwnerInterface, EntityChangedInterface {
}
?>