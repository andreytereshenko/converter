<?php

return [
    '~^$~' => [\Http\Controllers\indexController::class, 'home'],
    '~^ajax$~' => [\Http\Controllers\indexController::class, 'ajax'],
];