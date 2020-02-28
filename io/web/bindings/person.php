<?php

App::share(person::class, function() {
    return new person(Sess::get('person', 'Aron'));
});