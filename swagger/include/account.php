<?php

return [
    'paths' => [
       
        "/login" => [
            "post" => [
                "tags" => [
                    "account"
                ],
                "summary" => "login",
                "description" => "login",
                "consumes" => [
                    "application/json"
                 ],
                 "produces" => [
                     "application/json"
                 ],
                 "parameters" => [
                     [
                         "in" => "body",
                         "name" => "body",
                         "description" => "Login",
                         "required" => true,
                         "schema" => [
                                 '$ref' => "#/definitions/login"
                         ]
                     ],
                 ],
                "responses" => [
                    "default" => [
                        "description" => "successful operation"
                    ]
                ]
            ]
        ],
        "/getstudents" => [
            "get" => [
                "tags" => [
                    "account"
                ],
                "summary" => "get students ",
                "description" => "get students",
                "consumes" => [
                    "application/json"
                ],
                "produces" => [
                    "application/json"
                ],
                "parameters" => [
                    [
                        "name" => "token",
                        "in" => "header",
                        "description" => "token",
                        "required" => true,
                        "type" => "string",
                        "format" => "int64"
                    ],
                    [
                        "name" => "class",
                        "in" => "query",
                        "description" => "class",
                        "required" => false,
                        "type" => "string",
                        "format" => "int64"
                    ],
                    [
                        "name" => "roll_number",
                        "in" => "query",
                        "description" => "Roll No",
                        "required" => false,
                        "type" => "string",
                        "format" => "int64"
                    ],
                ],
                "responses" => [
                    "default" => [
                        "description" => "successful operation"
                    ]
                ]
            ]
        ],

    ],
    'definitions' => [
       
       
        'login' => [
            "type" => "object",
            'properties' => [               
                "email" => [
                    "type" => "string"
                ],
                "password" => [
                    "type" => "string",
                ],
            ],
        ],
        
      
        

      
      
    ]
];



