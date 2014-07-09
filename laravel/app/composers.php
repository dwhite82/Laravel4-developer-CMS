<?php
/**
 * This is a place for Custom Composers
 *
 */

/**
 * Bind navigation to the main view
 */

View::composer('layouts._main-nav', function($view) {
    $view->with('navItems', Page::tree()->sortBy("position"));
});


