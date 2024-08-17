<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('wBSOCKET', function ($user) {
    return true;
});
