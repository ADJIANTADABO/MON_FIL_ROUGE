<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private '.service_locator.ZgRhH2J' shared service.

return $this->privates['.service_locator.ZgRhH2J'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
    'adminpartenaire' => ['privates', '.errored..service_locator.ZgRhH2J.App\\Entity\\Adminpartenaire', NULL, 'Cannot autowire service ".service_locator.ZgRhH2J": it references class "App\\Entity\\Adminpartenaire" but no such service exists.'],
], [
    'adminpartenaire' => 'App\\Entity\\Adminpartenaire',
]);