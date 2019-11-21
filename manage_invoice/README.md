This module provides a Invoice entity with admin configuration to manage/display fields. 
Provide form to add/edit/delete invoice field values.The view form allows user to download pdf version of invoice. 
Also contains listing page of all the invoices in tableular format.

## Installation

- Copy manage_invoice module directory to /modules/custom
- Enable module at /modules/custom
- Need to enable dependencies module entity_print as well.
- Copy entity_theme theme directory to /themes/custom
- Enable Entity Theme.
- Go to entity print module configuration /admin/config/content/entityprint
  - select default engine as "CDomPdf" and save
- Go to manage_invoice admin settings /admin/structure/content_entity_manage_invoice_settings
  - go to manage display and place 'view pdf' field under enabled fields.
- Go to the listing page /content_entity_manage_invoice/list
  - Add new invoice and save
  - edit/delete invoices
  - On view page you can see view pdf link. it helps to download generated pdf.


