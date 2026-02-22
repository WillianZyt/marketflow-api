<?php

return [
    'driver' => 'argon2id',

    'bcrypt' => [
        'rounds' => 10,
    ],

    'argon' => [
        'memory' => 65536,
        'threads' => 2,
        'time' => 4,
    ],

    'argon2id' => [
        'memory' => 65536,
        'threads' => 2,
        'time' => 4,
    ],
];
