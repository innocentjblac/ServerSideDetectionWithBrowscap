<?php
use phpbrowscap\Browscap;

/**
 * Device-based layout switching.
 */
class LayoutSwitcherMiddleware extends \Slim\Middleware
{
    public function call() {
        // get reference to application
        $app = $this->app;

        // create a new Browscap object (loads or creates the cache)
        $bc = new Browscap('../cache');

        // Get information about the current browser's user agent
        $current_browser = $bc->getBrowser();

        // switch to the corresponding layout if this is mobile
        if ($current_browser->isMobileDevice) {
            $app->config('layout', 'layouts/mobile.php');
        }

        // call the next middleware
        $this->next->call();
    }
}
