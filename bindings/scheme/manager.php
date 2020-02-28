<?php

App::share(Scheme\Manager::class, function($app) {
    return new FlatfileSchemeManager($app['schemes']);
});