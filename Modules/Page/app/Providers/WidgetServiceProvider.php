<?php

namespace Modules\Page\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Page\Pagebuilder\Widgets\ImageWidget;
use Modules\Page\Pagebuilder\Widgets\TextWidget;
use Modules\Page\Pagebuilder\Widgets\VideoWidget;
use Modules\Page\Pagebuilder\Widgets\WidgetRegistry;

class WidgetServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     */
    public function register(): void
    {
        WidgetRegistry::register(new TextWidget());
        WidgetRegistry::register(new ImageWidget());
        WidgetRegistry::register(new VideoWidget());
    }

    /**
     * Get the services provided by the provider.
     */
    public function provides(): array
    {
        return [];
    }
}
