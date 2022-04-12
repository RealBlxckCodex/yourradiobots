<?php
/**
 * Created by PhpStorm.
 * User: rexlManu
 * Date: 30.03.2019
 * Time: 00:17
 */

// Home

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('/', function ($trail) {
    $trail->push('Dashboard', route('dashboard'));
});
Breadcrumbs::for('bots', function ($trail) {
    $trail->push('Bots', route('bots'));
});

Breadcrumbs::for('settings', function ($trail) {
    $trail->push('Einstellungen', route('settings'));
});

Breadcrumbs::for('botView', function ($trail, $bot) {
    $trail->parent('bots');
    $trail->push('Bot-' . $bot->id, route('bot.view', [$bot]));
});
Breadcrumbs::for('music', function ($trail, $bot) {
    $trail->parent('botView', $bot);
    $trail->push('Musik', route('bot.music', [$bot]));
});
Breadcrumbs::for('commandView', function ($trail, $bot) {
    $trail->parent('botView', $bot);
    $trail->push('Commands', route('bot.command', [$bot]));
});

Breadcrumbs::for('admin', function ($trail) {
    $trail->push('Dashboard', route('admin.dashboard'));
});
Breadcrumbs::for('support', function ($trail) {
    $trail->push('Support', route('support'));
});
Breadcrumbs::for('support.create', function ($trail) {
    $trail->parent('support');
    $trail->push('Erstellen', route('support.create'));
});
