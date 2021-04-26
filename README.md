# Transaction REST API
REST API example for transaction using PHP

### How to run this project locally?
1. Clone this repo
2. Create database and import `transaction` table from `transaction.sql` file
3. Run your local server

### Features
1. Create payment transaction <br>
You can access it from endpoint `http://localhost:8000/api/create.php` [POST] <br>
Add params body with following example:
```
{
    "invoice_id": "DET54321",
    "item_name": "Kemeja",
    "amount": 1,
    "payment_type": "credit_card",
    "number_va": "123",
    "customer_name": "Imam",
    "merchant_id": "12345"
}
```

2. Get payment transaction status <br>
You can access it from endpoint `http://localhost:8000/api/get_status.php/?references_id={references_id}&merchant_id={merchant_id}` [GET] <br>
Example:<br>
`http://localhost:8080/api/get_status.php/?references_id=1&merchant_id=12345`

3. Database migration (create table and insert data dummy) via CLI <br>
Write following script in your terminal: <br>
`php migration.php {table_name}` <br>
Example: <br>
`php migration.php merchant` <br><br>
After run above script, migration file will automatically created and located at migration folder. File name will follow the table name. Open the new migration file and edit it with adding column in that table. <br><br>
After adding column, run following script to create table: <br>
`php migration/{table_name}.php`<br>
Example:<br>
`php migration/{table_name}.php`

4. Change transaction status using CLI <br>
Write following script in your terminal: <br>
`php seeder.php {table_name} '{json_of_column_value_pair}'` <br>
Example: <br>
`php seeder.php invoice '{"firstname":"Imam","lastname":"Sutonno","email":"imams@email.com"}'`
