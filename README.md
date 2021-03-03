<p align="center">        
    <h2 align="center">Simple example of api rest</h2>
    <br>
</p>

- Controller class extends yii\rest\ActiveController.
- Parsers and rules in components.
- Authorization checkAccess method and HttpBearerAuth in behaviors.
- create invoice:
    POST yii2-api-invoice-simple-example.test/invoices
- create invoice detail:
    POST yii2-api-invoice-simple-example.test/invoice-details
- update invoice with id 4:
    PUT yii2-api-invoice-simple-example.test/invoices/4
    Headers:
        KEY: Content-Type    VALUE: application/json
        Body:
        {
                "date": "2021-01-14",
                "document": "#4b/2021",
                "customer_name": "Customer 4",
                "customer_address": "Some Address 4"
        }
- get page number 2:
    GET yii2-api-invoice-simple-example.test/invoices?page=2

- get page 1 and give 5 items per page:
    GET yii2-api-invoice-simple-example.test/invoices?per-page=5

- return each invoice with invoice_detail:
    First we add property of Invoice model class in extraFields() method ('invoiceDetails'),
    which is getInvoiceDetails() method in Invoice class.
    GET yii2-api-invoice-simple-example.test/invoices?expand=invoiceDetails
    params:
    KEY: expand    VALUE: invoiceDetails

- return each invoice with invoice_detail where fields in invoice_details is specified (means not all fields).
  We override method getInvoiceDetails() in frontend/api_res/Invoice class
  where InvoiceDetail class reference InvoiceDetail class which is in same namespace.
  First we add property of Invoice model class in extraFields() method ('invoiceDetails'),
  which is method getInvoiceDetails() method in Invoice class.
  GET yii2-api-invoice-simple-example.test/invoices?expand=invoiceDetails
  params:
  KEY: expand    VALUE: invoiceDetails

- get invoice-detail with belongs invoice (we added invoice property into frontend/api_res/InvoiceDetail extraFields() method):
  GET yii2-api-invoice-simple-example.test/invoice-details/1?expand=invoice

- get invoice details for specific invoice:
  GET yii2-api-invoice-simple-example.test/invoices/3/invoice-details

- update invoice with authorization:
  PUT yii2-api-invoice-simple-example.test/invoices/33

  Authorization: BearerToken
  Token: table user, access_token field

  Headers:
  KEY Content-type   VALUE application/json

  Body:
  {
    "date": "2021-02-22", 
    "document" : "#43234 updated", 
    "customer_name" : "Customer 2233", 
    "customer_address": "Some Address"
  }



    