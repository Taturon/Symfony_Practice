<?php
// config/packages/security.php
use Symfony\Config\SecurityConfig;

return static function (SecurityConfig $security) {
    $security->firewall('main')
        ->pattern('^/*')
        ->lazy(true)
        ->anonymous();

    $security
        ->roleHierarchy('ROLE_ADMIN', ['ROLE_USER'])
        ->roleHierarchy('ROLE_SUPER_ADMIN', ['ROLE_ADMIN', 'ROLE_ALLOWED_TO_SWITCH'])
        ->accessControl()
            ->path('^/user')
            ->role('ROLE_USER');

    $security->accessControl(['path' => '^/admin', 'roles' => 'ROLE_ADMIN']);
};
