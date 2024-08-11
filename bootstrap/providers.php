<?php

use Modules\Page\Providers\WidgetServiceProvider;

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\ConfigServiceProvider::class,
    App\Providers\FileUploadServiceProvider::class,
    App\Providers\TelescopeServiceProvider::class,
    WidgetServiceProvider::class,
];