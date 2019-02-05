<?php
/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
| Первое это создание нового экземпляра приложения Laravel,
| который служит «связующим звеном» для всех компонентов Laravel и является
| контейнером IOC для системы, связывающей все различные части.
*/
$app = new Illuminate\Foundation\Application(
    realpath(__DIR__.'/../')
);
/*
|--------------------------------------------------------------------------
| Bind Important Interfaces
|--------------------------------------------------------------------------
| Далее нужно связать некоторые важные интерфейсы в контейнере, чтобы
| мы могли разрешать их при необходимости. Kernel обслуживает входящие
| запросы к этому приложению как из Интернета, так и из CLI.
*/
$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
    App\Http\Kernel::class
);
$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);
$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);
/*
|--------------------------------------------------------------------------
| Return The Application
|--------------------------------------------------------------------------
| Этот скрипт возвращает экземпляр приложения. Экземпляр передается
| вызывающему сценарию, поэтому можно отделить создание экземпляров от
| фактического запуска приложения и отправки ответов.
*/
return $app;