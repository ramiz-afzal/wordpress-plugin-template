<?php

namespace PLUGIN_NAMESPACE;

if (!defined('ABSPATH')) exit;

final class Init
{
    public static function get_services()
    {
        return array(
            Base\Enqueue::class,
            Base\Functions::class,
            Base\Variable::class,
            Core\CustomFields::class,
            Core\WordPressHooks::class,
            Core\WoocommerceFilters::class,
            Core\Shortcode::class,
            Core\AjaxHandler::class,
            Core\BlackHawkHandler::class,
            Core\ScheduledActionsHandler::class,
            Core\CustomAdminColumns::class,
            Core\CustomMetaboxes::class,
            Admin\AdminPages::class,
        );
    }

    public static function register_services()
    {
        foreach (self::get_services() as $class) {

            $service = self::instantiate($class);
            if (method_exists($service, 'register')) {
                $service->register();
            }
        }
    }

    private static function instantiate($class)
    {
        return new $class();
    }
}
