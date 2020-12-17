# API Endpoint

## Login
Request
- Method : POST
- Endpoint : `api/user/login`
- Body:
    - email : string
    - password : string

Response
```json
{
    "meta": {
        "code": 200,
        "status": "success",
        "message": "Authenticated"
    },
    "data": {
        "access_token": "5|YGxcOglrkl72jbneNANJnxxmdyKvSpXI9ipqFIiB",
        "token_type": "Bearer",
        "user": {
            "id": 1,
            "name": "admin",
            "email": "admin@admin.com",
            "phone_number": "089765890876",
            "email_verified_at": "2020-12-09T03:25:08.000000Z",
            "current_team_id": null,
            "profile_photo_path": null,
            "created_at": 1607484308,
            "updated_at": 1607484308,
            "profile_photo_url": "https://ui-avatars.com/api/?name=admin&color=7F9CF5&background=EBF4FF"
        }
    }
}
```

## Register
Request
- Method : POST
- Endpoint : `api/user/register`
- Body:
    - name : string
    - email : string
    - password : string
    - password_confirm : string
    - phone_number : string

Response
```json
{
    "meta": {
        "code": 200,
        "status": "success",
        "message": null
    },
    "data": {
        "access_token": "6|0jRApj8rLL8XVehwyzTBFOKYZBwIfFsFw2h7YHGQ",
        "token_type": "Bearer",
        "user": {
            "name": "user4",
            "email": "user4@user.com",
            "phone_number": "3456789",
            "updated_at": 1608047611,
            "created_at": 1608047611,
            "id": 5,
            "profile_photo_url": "https://ui-avatars.com/api/?name=user4&color=7F9CF5&background=EBF4FF",
            "roles": [
                {
                    "id": 1,
                    "name": "user",
                    "guard_name": "web",
                    "created_at": "2020-12-09T03:22:59.000000Z",
                    "updated_at": "2020-12-09T03:22:59.000000Z",
                    "pivot": {
                        "model_id": 5,
                        "role_id": 1,
                        "model_type": "App\\Models\\User"
                    }
                }
            ]
        }
    }
}
```

## Logout
Request
- Method : POST
- Endpoint : `api/user/logout`
- Header :
    - Authorization : Bearer Token

Response
```json
{
    "meta": {
        "code": 200,
        "status": "success",
        "message": "Token Revoked"
    },
    "data": true
}
```

## List Product
Request
- Method : GET
- Endpoint : `api/product`

Response
```json
{
    "meta": {
        "code": 200,
        "status": "success",
        "message": "product fetched"
    },
    "data": {
        "current_page": 1,
        "data": [
            {
                "id": 1,
                "name": "ID Card",
                "description": "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Incidunt, ducimus aliquam quod necessitatibus dolorum eos? Harum odio beatae quasi adipisci.",
                "image_url": "http://127.0.0.1:8000/storage/assets/products/U274yLFFQkR1AuJlYrASDiTHc2KajEzYnLbvLTve.jpg",
                "price": 5000,
                "rating": 6,
                "quantity": 200,
                "sold": 0,
                "created_at": 1608044920,
                "updated_at": 1608044920
            }
        ],
        "first_page_url": "http://127.0.0.1:8000/api/product?page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "http://127.0.0.1:8000/api/product?page=1",
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/product?page=1",
                "label": 1,
                "active": true
            },
            {
                "url": null,
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "next_page_url": null,
        "path": "http://127.0.0.1:8000/api/product",
        "per_page": 6,
        "prev_page_url": null,
        "to": 1,
        "total": 1
    }
}
```

## Create Product
Request
- Method : POST
- Endpoint : `api/product`
- Header :
    - Authorization : Bearer Token
- Body :
    - name : string
    - description : string
    - image : file image
    - price : integer
    - rating : integer
    - quantity : integer
    - sold : integer
Response
```json
{
    "meta": {
        "code": 200,
        "status": "success",
        "message": "Token Revoked"
    },
    "data": true
}
```

