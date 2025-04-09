<?php

return [
    'paths' => ['api/*', 'images/*', 'storage/*'],
    'allowed_methods' => ['*'],
    'allowed_origins' => ['http://localhost:3000'], // Cambia '*' por el dominio específico si es necesario
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => false,
];
