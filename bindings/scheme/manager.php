<?php

App::share(scheme\manager::class, function($app) {
    return new FlatfileSchemeManager($app['schemes']);
});