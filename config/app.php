<?php
return [
    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    | Название приложения. Используется, когда
    | Фреймворк должен поместить имя приложения в уведомлении или
    | любое другое местоположение, как требуется приложением или его пакетами.
    */
    'name' => env('APP_NAME', 'Laravel'),
    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    | Контекст, в которой приложение работает в настоящее время.
    | Определяет настройку различных услуг, которые использует ваше приложение.
    | Устанавливается в файле .env.
    */
    'env' => env('APP_ENV', 'production'),
    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    | Когда приложение находится в режиме отладки, здесь будут отображаться сообщения
    | об ошибках внутри приложения. Если приложение отключено, отображается простая
    | страница общих ошибок.
    */
    'debug' => env('APP_DEBUG', false),
    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    | URL-адрес используется консолью для правильной генерации URL-адресов при использовании
    | инструмент командной строки Artisan. Необходимо установить это в корень
    | приложения, чтобы оно использовалось при выполнении задач Artisan.
    */
    'url' => env('APP_URL', 'http://localhost'),
    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    | Укажите часовой пояс по умолчанию для приложения, который
    | будет использоваться PHP-функцией date и date-time.
    | Установите нужное значение.
    */
    'timezone' => 'UTC',
    /*
    |--------------------------------------------------------------------------
    | Application Local Configuration
    |--------------------------------------------------------------------------   |
    | Локальное приложение определяет язык по умолчанию. Установите это значение
    | на любой из языков, которые будут поддерживаться приложением.
    */
    'locale' => 'en',
    /*
    |--------------------------------------------------------------------------
    | Application Fallback Local
    |--------------------------------------------------------------------------
    | Резервный язык по умолчанию будет использоваться, когда выбранный другой язык
    | не доступен. Возможно изменить значение, чтобы соответствовать любому из
    | языковые папки, которые предоставляются через ваше приложение.
    */
    'fallback_locale' => 'en',
    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    | Этот ключ используется сервисом Illuminate encrypter и должен быть установлен
    | в случайную строку из 32 символов, в противном случае эти зашифрованные строки
    | не будут в безопасности. Необходимо сделать это перед развертыванием приложения!
    */
    'key' => env('APP_KEY'),
    'cipher' => 'AES-256-CBC',
    /*
    |--------------------------------------------------------------------------
    | Logging Configuration
    |--------------------------------------------------------------------------
    | Настройка параметров журнала для вашего приложения.
    | В этом поле Laravel использует библиотеку журналов Monolog PHP. Это дает
    | Вы можете использовать множество мощных обработчиков / форматеров журналов.
    | Доступные настройки: «single», «daily», «syslog», «errorlog»
    */
    'log' => env('APP_LOG', 'single'),
    'log_level' => env('APP_LOG_LEVEL', 'debug'),
    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    | Провайдеры услуг, перечисленные здесь, будут автоматически загружены на
    | запрос к вашей заявке. Добавляйте свои собственные услуги в
    | этот массив для предоставления расширенной функциональности вашим приложениям.
    */
    'providers' => [
        /*
         * Laravel Framework Service Providers...
         */
        Illuminate\Auth\AuthServiceProvider::class,
        Illuminate\Broadcasting\BroadcastServiceProvider::class,
        Illuminate\Bus\BusServiceProvider::class,
        Illuminate\Cache\CacheServiceProvider::class,
        Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
        Illuminate\Cookie\CookieServiceProvider::class,
        Illuminate\Database\DatabaseServiceProvider::class,
        Illuminate\Encryption\EncryptionServiceProvider::class,
        Illuminate\Filesystem\FilesystemServiceProvider::class,
        Illuminate\Foundation\Providers\FoundationServiceProvider::class,
        Illuminate\Hashing\HashServiceProvider::class,
        Illuminate\Mail\MailServiceProvider::class,
        Illuminate\Notifications\NotificationServiceProvider::class,
        Illuminate\Pagination\PaginationServiceProvider::class,
        Illuminate\Pipeline\PipelineServiceProvider::class,
        Illuminate\Queue\QueueServiceProvider::class,
        Illuminate\Redis\RedisServiceProvider::class,
        Illuminate\Auth\Passwords\PasswordResetServiceProvider::class,
        Illuminate\Session\SessionServiceProvider::class,
        Illuminate\Translation\TranslationServiceProvider::class,
        Illuminate\Validation\ValidationServiceProvider::class,
        Illuminate\View\ViewServiceProvider::class,
        /*
         * Package Service Providers...
         */
        Laravel\Tinker\TinkerServiceProvider::class,
        /*
         * Application Service Providers...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,
    ],
    /*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    | Этот массив псевдонимов классов будет добавлен после запуска этого приложения.
    | Возможно загрузить сколько угодно классов, при загрузке они не мешают работе приложения.
    */
    'aliases' => [
        'App' => Illuminate\Support\Facades\App::class,
        'Artisan' => Illuminate\Support\Facades\Artisan::class,
        'Auth' => Illuminate\Support\Facades\Auth::class,
        'Blade' => Illuminate\Support\Facades\Blade::class,
        'Broadcast' => Illuminate\Support\Facades\Broadcast::class,
        'Bus' => Illuminate\Support\Facades\Bus::class,
        'Cache' => Illuminate\Support\Facades\Cache::class,
        'Config' => Illuminate\Support\Facades\Config::class,
        'Cookie' => Illuminate\Support\Facades\Cookie::class,
        'Crypt' => Illuminate\Support\Facades\Crypt::class,
        'DB' => Illuminate\Support\Facades\DB::class,
        'Eloquent' => Illuminate\Database\Eloquent\Model::class,
        'Event' => Illuminate\Support\Facades\Event::class,
        'File' => Illuminate\Support\Facades\File::class,
        'Gate' => Illuminate\Support\Facades\Gate::class,
        'Hash' => Illuminate\Support\Facades\Hash::class,
        'Lang' => Illuminate\Support\Facades\Lang::class,
        'Log' => Illuminate\Support\Facades\Log::class,
        'Mail' => Illuminate\Support\Facades\Mail::class,
        'Notification' => Illuminate\Support\Facades\Notification::class,
        'Password' => Illuminate\Support\Facades\Password::class,
        'Queue' => Illuminate\Support\Facades\Queue::class,
        'Redirect' => Illuminate\Support\Facades\Redirect::class,
        'Redis' => Illuminate\Support\Facades\Redis::class,
        'Request' => Illuminate\Support\Facades\Request::class,
        'Response' => Illuminate\Support\Facades\Response::class,
        'Route' => Illuminate\Support\Facades\Route::class,
        'Schema' => Illuminate\Support\Facades\Schema::class,
        'Session' => Illuminate\Support\Facades\Session::class,
        'Storage' => Illuminate\Support\Facades\Storage::class,
        'URL' => Illuminate\Support\Facades\URL::class,
        'Validator' => Illuminate\Support\Facades\Validator::class,
        'View' => Illuminate\Support\Facades\View::class,
    ],
];