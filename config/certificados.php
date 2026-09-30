<?php

return [
    'ubicacion' => [
        'url' => env('URL_MAP'),
        // Los certificados de Machupicchu se emiten en WGS 84 / UTM 18S.
        'srid' => 32718,
        'timeout' => 12,
        'cache_segundos' => 300,
    ],
];
