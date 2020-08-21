<?php declare(strict_types = 1);

namespace App;

use Nette;
use Nette\Application\Routers\RouteList;
use Nette\Application\Routers\Route;

class RouterFactory
{

    use Nette\StaticClass;

    public static function createRouter(): Nette\Routing\Router
    {
        $router = new RouteList;

        /* AdminModule */
        $router[] = $backend = new RouteList('Admin');
        $backend[] = new Route('admin/<presenter>/<action>[/<id>]', 'Homepage:default');

        /* ProjectModule */
        $router[] = $project = new RouteList('Project');

        // Basic Routes
        $project[] = new Route('[<lang=cs [a-z]{2}>/]', 'Homepage:default');
        $project[] = new Route('[<lang=cs [a-z]{2}>/]pestounska-pece', 'Homepage:fosterCare');
        $project[] = new Route('[<lang=cs [a-z]{2}>/]bez-dluhu', 'Homepage:withoutDebts');
        $project[] = new Route('[<lang=cs [a-z]{2}>/]podporuji-nas', 'Homepage:sponsors');
        $project[] = new Route('[<lang=cs [a-z]{2}>/]dokumenty', 'Homepage:documents');
        $project[] = new Route('[<lang=cs [a-z]{2}>/]kontakt', 'Homepage:contact');




        // services and activities
        $project[] = new Route('[<lang=cs [a-z]{2}>/]aktuality', 'New:default');
        $project[] = new Route('[<lang=cs [a-z]{2}>/]aktuality/<slug>', 'New:show');
        // services and activities
        $project[] = new Route('[<lang=cs [a-z]{2}>/]udalosti', 'Event:default');
        $project[] = new Route('[<lang=cs [a-z]{2}>/]udalosti/<slug>', 'Event:show');
        // services and activities
        $project[] = new Route('[<lang=cs [a-z]{2}>/]aktivity-a-sluzby', 'Service:default');
        $project[] = new Route('[<lang=cs [a-z]{2}>/]aktivity-a-sluzby/<slug>', 'Service:show');

        $project[] = new Route('[<lang=cs [a-z]{2}>/]<presenter>/<action>', 'Error:404');

        return $router;
    }

}
