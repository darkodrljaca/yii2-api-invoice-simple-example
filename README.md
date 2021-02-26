<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Advanced Project Template</h1>
    <h2 align="center">Simple example of api rest</h2>
    <br>
</p>
Short notes:

- Controller class extends yii\rest\ActiveController.
- Parsers and rules in components.
- Authorization checkAccess method and HttpBearerAuth in behaviors.
- For example, GET invoice details with invoice_id = 3 and with the corresponding invoice: <br />
    http: // yii2-api-invoice-simple-example.test / invoices / 3 / invoice-details?expand=invoice

    
    <pre><code> 

    [
        {
            "id": 1,
            "item": "item_1",
            "quantity": 11,
            "price": "200",
            "note": null,
            "invoice_id": 3,
            "invoice": {
                "id": 3,
                "date": "2021-01-13",
                "document": "#3/2021",
                "customer_name": "Customer_3",
                "customer_address": "Address_3"
            }
        },
        {
            "id": 2,
            "item": "item_2",
            "quantity": 22,
            "price": "243",
            "note": null,
            "invoice_id": 3,
            "invoice": {
                "id": 3,
                "date": "2021-01-13",
                "document": "#3/2021",
                "customer_name": "Customer_3",
                "customer_address": "Address_3"
            }
        },
        {
            "id": 3,
            "item": "item_3",
            "quantity": 5,
            "price": "300",
            "note": null,
            "invoice_id": 3,
            "invoice": {
                "id": 3,
                "date": "2021-01-13",
                "document": "#3/2021",
                "customer_name": "Customer_3",
                "customer_address": "Address_3"
            }
        }
    ]

    </code></pre>

    