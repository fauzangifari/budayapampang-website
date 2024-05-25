<?php

function getDatabaseConfig(): array {
    return [
        "database" => [
            "production" => [
                "url" => "mysql:host=localhost:3306;dbname=budayapampang",
                "username" => "root",
                "password" => ""
            ]
        ]
    ];
}