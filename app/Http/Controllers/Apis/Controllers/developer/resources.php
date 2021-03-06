<?php
   return [
    "location"=>[
        "id"=>"int",
        "longitude"=>"double",
        "latitude"=>"double",
        "address"=>"string",
    ],
    "category"=>[
        "id"=>"int",
        "name"=>"string",
    ],
    "day"=>[
        "id"=>"int",
        "name"=>"string",
    ],
    "service"=>[
        "id"=>"int",
        "name"=>"string",
        "gender"=>"string",
        "price"=>"double?"
    ],
    "account"=>[
        "id"=>"int",
        "type"=>"string['user','provider']",
        "apiToken"=>"string",
        "name"=>"string",
        "image"=>"string?",
        "phone"=>"string",
        "email"=>"string",
        "createdAt"=>"int"
    ],
    "store"=>[
        "id"=>"int",
        "logo"=>"logo?",
        "name"=>"string",
        "images"=>"string[]",
        "isOpen"=>"string",
        "rate"=>"float",
        "distance"=>"double",
        "description"=>"string",
        "location" =>"location{}",
        "category"=>"category{}",
        "fromDay"=>"day{}",
        "toDay"=>"day{}",
        "fromTime"=>"int",
        "toTime"=>"int",
        "phones"=>"string[]",
        "emails"=>"string[]",
        "facebook"=>"string",
        "twitter"=>"string",
        "instagram"=>"string",
        "createdAt"=>"int"
    ],
    "order"=>[
        "id"=>"int",
        "message"=>"string",
        "status"=>"string",
        "price"=>"float",
        "fees" =>"string",
        "totalPrice"=>"float",
        "orderDate" =>"int?" ,  
        "phone" =>"string?" ,  
        "address" =>"string?" ,  
        "services"=>"service{}",
        "createdAt"=>"int"
    ],
    "appInfo"=>[
        "phones"=>"string[]",
        "emails"=>"string[]",
        "aboutUs"=>"string",
        "policyTerms"=>"string",
    ],
    "notification"=>[
        "id"=>"int",
        "type"=>"string['order','dashboard']",
        "order"=>"order{}?",
        "content"=>"string",
        "isSeen"=>"bolean",
        "createdAt"=>"int"
    ]
 ];
