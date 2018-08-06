---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)
<!-- END_INFO -->

#general
<!-- START_dad65efa4de78aa41631136d2aa6b536 -->
## api/v1/product

> Example request:

```bash
curl -X POST "http://localhost/api/v1/product" \
-H "Accept: application/json" \
    -d "name"="dolor" \
    -d "price"="dolor" \
    -d "type"="dolor" \
    -d "size"="dolor" \
    -d "color"="dolor" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/product",
    "method": "POST",
    "data": {
        "name": "dolor",
        "price": "dolor",
        "type": "dolor",
        "size": "dolor",
        "color": "dolor"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/v1/product`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | Maximum: `255`
    price | string |  required  | Must match this regular expression: `/^\d*(\.\d{1,2})?$/` Not in: `0`
    type | string |  required  | Maximum: `255`
    size | string |  required  | Maximum: `255`
    color | string |  required  | Maximum: `255`

<!-- END_dad65efa4de78aa41631136d2aa6b536 -->

<!-- START_ae2b07b1c0f2a49f23cd89c5eef4e418 -->
## api/v1/order

> Example request:

```bash
curl -X GET "http://localhost/api/v1/order" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/order",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "success": true,
    "data": [
        {
            "id": 1,
            "total": 99.4,
            "products": {
                "data": [
                    {
                        "id": 2,
                        "name": "leggings commodi",
                        "type": "leg",
                        "color": "PowderBlue",
                        "size": "xs",
                        "price": 99.4
                    }
                ]
            }
        },
        {
            "id": 2,
            "total": 211.26,
            "products": {
                "data": [
                    {
                        "id": 3,
                        "name": "swimwear voluptatibus",
                        "type": "swimwear",
                        "color": "Blue",
                        "size": "xs",
                        "price": 17.3
                    },
                    {
                        "id": 4,
                        "name": "mug sint",
                        "type": "mug",
                        "color": "LavenderBlush",
                        "size": "l",
                        "price": 14.49
                    },
                    {
                        "id": 5,
                        "name": "leggings quidem",
                        "type": "leggings",
                        "color": "DodgerBlue",
                        "size": "m",
                        "price": 18.01
                    },
                    {
                        "id": 6,
                        "name": "swimwear beatae",
                        "type": "swimwear",
                        "color": "Lavender",
                        "size": "l",
                        "price": 60.06
                    },
                    {
                        "id": 7,
                        "name": "swimwear totam",
                        "type": "swimwear",
                        "color": "Moccasin",
                        "size": "m",
                        "price": 49.42
                    },
                    {
                        "id": 8,
                        "name": "backpack est",
                        "type": "backpack",
                        "color": "DeepSkyBlue",
                        "size": "m",
                        "price": 51.98
                    }
                ]
            }
        },
        {
            "id": 3,
            "total": 60.79,
            "products": {
                "data": [
                    {
                        "id": 9,
                        "name": "leggings fuga",
                        "type": "leggings",
                        "color": "LightPink",
                        "size": "xs",
                        "price": 60.79
                    }
                ]
            }
        },
        {
            "id": 4,
            "total": 144.44,
            "products": {
                "data": [
                    {
                        "id": 10,
                        "name": "swimwear adipisci",
                        "type": "swimwear",
                        "color": "DarkSlateBlue",
                        "size": "xs",
                        "price": 25.21
                    },
                    {
                        "id": 11,
                        "name": "shirt error",
                        "type": "shirt",
                        "color": "Magenta",
                        "size": "xl",
                        "price": 48.77
                    },
                    {
                        "id": 12,
                        "name": "leggings et",
                        "type": "leggings",
                        "color": "LightGreen",
                        "size": "m",
                        "price": 32.16
                    },
                    {
                        "id": 13,
                        "name": "leggings officia",
                        "type": "leggings",
                        "color": "LightSlateGray",
                        "size": "m",
                        "price": 38.3
                    }
                ]
            }
        },
        {
            "id": 5,
            "total": 324.22,
            "products": {
                "data": [
                    {
                        "id": 14,
                        "name": "leggings dignissimos",
                        "type": "leggings",
                        "color": "Yellow",
                        "size": "m",
                        "price": 47.79
                    },
                    {
                        "id": 15,
                        "name": "shirt qui",
                        "type": "shirt",
                        "color": "SpringGreen",
                        "size": "l",
                        "price": 61.01
                    },
                    {
                        "id": 16,
                        "name": "swimwear porro",
                        "type": "swimwear",
                        "color": "SlateGray",
                        "size": "m",
                        "price": 51.79
                    },
                    {
                        "id": 17,
                        "name": "leggings facilis",
                        "type": "leggings",
                        "color": "CornflowerBlue",
                        "size": "xl",
                        "price": 55.6
                    },
                    {
                        "id": 18,
                        "name": "shirt veritatis",
                        "type": "shirt",
                        "color": "Aqua",
                        "size": "xl",
                        "price": 53.04
                    },
                    {
                        "id": 19,
                        "name": "backpack cumque",
                        "type": "backpack",
                        "color": "LightSalmon",
                        "size": "m",
                        "price": 54.99
                    }
                ]
            }
        },
        {
            "id": 6,
            "total": 270.89,
            "products": {
                "data": [
                    {
                        "id": 20,
                        "name": "leggings deleniti",
                        "type": "leggings",
                        "color": "DarkSeaGreen",
                        "size": "s",
                        "price": 49.7
                    },
                    {
                        "id": 21,
                        "name": "leggings laudantium",
                        "type": "leggings",
                        "color": "GhostWhite",
                        "size": "l",
                        "price": 90.46
                    },
                    {
                        "id": 22,
                        "name": "mug tempore",
                        "type": "mug",
                        "color": "SaddleBrown",
                        "size": "s",
                        "price": 41.17
                    },
                    {
                        "id": 23,
                        "name": "shirt officiis",
                        "type": "shirt",
                        "color": "GreenYellow",
                        "size": "xs",
                        "price": 24.72
                    },
                    {
                        "id": 24,
                        "name": "backpack quo",
                        "type": "backpack",
                        "color": "OliveDrab",
                        "size": "s",
                        "price": 64.84
                    }
                ]
            }
        },
        {
            "id": 7,
            "total": 174.60000000000002,
            "products": {
                "data": [
                    {
                        "id": 25,
                        "name": "leggings qui",
                        "type": "leggings",
                        "color": "SkyBlue",
                        "size": "xl",
                        "price": 87.09
                    },
                    {
                        "id": 26,
                        "name": "backpack est",
                        "type": "backpack",
                        "color": "Blue",
                        "size": "s",
                        "price": 87.51
                    }
                ]
            }
        },
        {
            "id": 8,
            "total": 202.4,
            "products": {
                "data": [
                    {
                        "id": 27,
                        "name": "swimwear et",
                        "type": "swimwear",
                        "color": "Gray",
                        "size": "xl",
                        "price": 50.72
                    },
                    {
                        "id": 28,
                        "name": "swimwear et",
                        "type": "swimwear",
                        "color": "Orchid",
                        "size": "m",
                        "price": 26.81
                    },
                    {
                        "id": 29,
                        "name": "backpack facilis",
                        "type": "backpack",
                        "color": "Crimson",
                        "size": "s",
                        "price": 27.49
                    },
                    {
                        "id": 30,
                        "name": "shirt illo",
                        "type": "shirt",
                        "color": "Maroon",
                        "size": "s",
                        "price": 22.37
                    },
                    {
                        "id": 31,
                        "name": "swimwear rem",
                        "type": "swimwear",
                        "color": "Green",
                        "size": "l",
                        "price": 75.01
                    }
                ]
            }
        },
        {
            "id": 9,
            "total": 260.44,
            "products": {
                "data": [
                    {
                        "id": 32,
                        "name": "mug quidem",
                        "type": "mug",
                        "color": "MediumPurple",
                        "size": "xs",
                        "price": 35.64
                    },
                    {
                        "id": 33,
                        "name": "mug nihil",
                        "type": "mug",
                        "color": "Pink",
                        "size": "l",
                        "price": 52.81
                    },
                    {
                        "id": 34,
                        "name": "shirt praesentium",
                        "type": "shirt",
                        "color": "SaddleBrown",
                        "size": "s",
                        "price": 59.98
                    },
                    {
                        "id": 35,
                        "name": "swimwear molestiae",
                        "type": "swimwear",
                        "color": "SkyBlue",
                        "size": "l",
                        "price": 88.35
                    },
                    {
                        "id": 36,
                        "name": "leggings ut",
                        "type": "leggings",
                        "color": "SeaGreen",
                        "size": "s",
                        "price": 23.66
                    }
                ]
            }
        },
        {
            "id": 10,
            "total": 156.63,
            "products": {
                "data": [
                    {
                        "id": 37,
                        "name": "swimwear beatae",
                        "type": "swimwear",
                        "color": "LightSlateGray",
                        "size": "xl",
                        "price": 29.77
                    },
                    {
                        "id": 38,
                        "name": "shirt minima",
                        "type": "shirt",
                        "color": "Beige",
                        "size": "xs",
                        "price": 67.58
                    },
                    {
                        "id": 39,
                        "name": "leggings nemo",
                        "type": "leggings",
                        "color": "MediumPurple",
                        "size": "m",
                        "price": 45.18
                    },
                    {
                        "id": 40,
                        "name": "leggings commodi",
                        "type": "leggings",
                        "color": "DeepPink",
                        "size": "l",
                        "price": 14.1
                    }
                ]
            }
        }
    ]
}
```

### HTTP Request
`GET api/v1/order`

`HEAD api/v1/order`


<!-- END_ae2b07b1c0f2a49f23cd89c5eef4e418 -->

<!-- START_dccb15eb3789546b33d63f236c413842 -->
## api/v1/order

> Example request:

```bash
curl -X POST "http://localhost/api/v1/order" \
-H "Accept: application/json" \
    -d "id"="laborum" \
    -d "count"="1312381922" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/order",
    "method": "POST",
    "data": {
        "id": "laborum",
        "count": 1312381922
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/v1/order`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    id | string |  required  | Valid product id
    count | integer |  required  | Minimum: `1`

<!-- END_dccb15eb3789546b33d63f236c413842 -->

