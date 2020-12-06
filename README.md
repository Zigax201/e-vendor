# PERSEWAAN VENDOR E-COMMERCE

## List Content

- [USER](#user)
  - [Login User](#login-user)
  - [Register User](#register-user)
  - [Logout User](#logout-user)
  - [Get User](#get-user)
  - [Update User](#update-user)
- [ITEM](#item)
  - [Create Item](#create-item)
  - [Get Item](#get-item-by-id)
  - [Get List Item](#get-list-item)
  - [Edit Item By Id](#edit-item-by-id)
  - [Delete Item](#delete-item)
- [TRANSACTION](#transaction) 
  - [Get Transaction](#get-transaction)
  - [Get List Transaction](#get-list-transactions)
  - [Update Transaction](#update-transaction)

<br>

---

<h2 id="user" style="text-align : center;">ACCOUNT USER</h2>

---

<br>

> ### Login User

Request :

- Method : POST
- Endpoint : `/users/login`
- Body :
  - email : string
  - password : string

Response :

```json
{
  "code": "integer",
  "result": {
    "access_token": "string",
    "token_type": "string",
    "expires_in": "number"
  }
}
```

> ### Register User

Request :

- Method : POST
- Endpoint : `/users/register`
- Body :
  - email : string
  - username : string
  - password : string
  - gender : string
  - phone_number : string
  - address : string

Response :

```json
{
  "code": "integer",
  "result": {
    "id": "integer",
    "email": "string",
    "username": "string",
    "gender": "string",
    "phone_number": "string",
    "address": "string",
    "created_at": "date",
    "updated_at": "date"
  }
}
```

> ### Logout User

Request :

- Method : POST
- Endpoint : `/users/logout`

Response :

```json
{
  "code": "integer",
  "result": "boolean"
}
```

> ### Get User

Request :

- Method : POST
- Endpoint : `/users`
- Header :
  - Authorization : Bearer string

Response :

```json
{
  "code": "integer",
  "result": {
    "id": "integer",
    "email": "string",
    "username": "string",
    "gender": "string",
    "phone_number": "string",
    "address": "string",
    "created_at": "date",
    "updated_at": "date"
  }
}
```

> ### Update User

Request :

- Method : PUT
- Endpoint : `/users/{user_id}`
- Header :
  - Authorization : Bearer string
- Body :
  - username : string
  - password : string
  - gender : string
  - phone_number : string
  - address : string

Response :

```json
{
  "code": "integer",
  "result": {
    "id": "integer",
    "email": "string",
    "username": "string",
    "gender": "string",
    "phone_number": "string",
    "address": "string",
    "created_at": "date",
    "updated_at": "date"
  }
}
```

<br>

---

<h2 id="item" style="text-align : center;">ITEM</h2>

---

<br>

> ### CREATE Item

Request :

- Method : POST
- Endpoint : `/items`
- Header :
  - Authorization : Bearer string
- Body :
  - name : string
  - quantity : integer
  - desc : string
  - img : file
  - price : integer
  
Response :

```json
{
  "code": "integer",
  "result": {
    "id": "integer",
    "name": "string",
    "quantity": "integer",
    "desc": "string",
    "img_url": "string",
    "price": "integer",
    "created_at": "date",
    "updated_at": "date"
  }
}
```

> ### GET Item by ID

Request :

- Method : GET
- Endpoint : `/items/{item_id}`

Response :

```json
{
  "code": "integer",
  "result": {
    "id": "integer",
    "name": "string",
    "quantity": "integer",
    "desc": "string",
    "img_url": "string",
    "price": "integer",
    "created_at": "date",
    "updated_at": "date"
  }
}
```

> ### GET List Item

Request :

- Method : GET
- Endpoint : `/items`

Response :

```json
{
  "code": "integer",
  "result": [
    {
      "id": "integer",
      "name": "string",
      "quantity": "integer",
      "desc": "string",
      "img_url": "string",
      "price": "integer",
      "created_at": "date",
      "updated_at": "date"
    }
  ]
}
```

> ### Edit Item by ID

Request :

- Method : PUT
- Endpoint : `/items/{item_id}`
- Header :
  - Authorization : Bearer string
- Body :
  - name : string
  - quantity : integer
  - desc : string
  - img_url : string
  - price ; integer

Response :

```json
{
  "code": "integer",
  "result": {
    "id": "integer",
    "name": "string",
    "quantity": "integer",
    "desc": "string",
    "img_url": "string",
    "created_at": "date",
    "updated_at": "date"
  }
}
```

> ### Delete Item

Request :

- Method : DELETE
- Endpoint : `/items/{item_id}`
- Header :
  - Authorization : Bearer string

Response :

```json
{
  "code": "integer",
  "result": "string"
}
```

<br>

---

<h2 id="transaction" style="text-align : center;">TRANSACTION</h2>

---

<br>

> ### Create Transaction

Request :

- Method : POST
- Endpoint : `/transactions`
- Header :
  - Authorization : Bearer string
- Body : 
  - user_id : integer 
  - item_id : integer 
  - quantity : integer
  
Response :

```json
{
  "code": "integer",
  "result": {
    "id": "integer",
    "user_id": "integer",
    "item_id": "integer",
    "quantity": "string",
    "status": "string",
    "total": "integer",
    "address":"string",
    "created_at": "date",
    "updated_at": "date"
  }
}
```

> ### Get Transaction

Request :

- Method : GET
- Endpoint : `/transactions/{transaction_id}`
- Header :
  - Authorization : Bearer string

Response :

```json
{
  "code": "integer",
  "result": {
    "id": "integer",
    "user_id": "integer",
    "item_id": "integer",
    "quantity": "string",
    "status": "string",
    "total": "integer",
    "address":"string",
    "created_at": "date",
    "updated_at": "date"
  }
}
```

> ### Get List Transactions

Request :

- Method : GET
- Endpoint : `/transactions`
- Header :
  - Authorization : Bearer string

Response :

```json
{
  "code": "integer",
  "result": [
    {
      "id": "integer",
      "user_id": "integer",
      "item_id": "integer",
      "quantity": "string",
      "status": "string",
      "total": "integer",
      "address":"string",
      "created_at": "date",
      "updated_at": "date"
    }
  ]
}
```

> ### Update Transaction

Request :

- Method : PUT
- Endpoint : `/transaction/{transaction_id}`
- Header :
  - Authorization : Bearer string
- Body :
  - status : string

Response :

```json
{
  "code": "integer",
  "result": {
    "id": "integer",
    "user_id": "integer",
    "item_id": "integer",
    "quantity": "string",
    "status": "string",
    "total": "integer",
    "address":"string",
    "created_at": "date",
    "updated_at": "date"
  }
}
```
