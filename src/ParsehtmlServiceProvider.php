<?php

namespace Yansongda\LaravelParsehtml;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Application as LaravelApplication;
use Laravel\Lumen\Application as LumenApplication;
use League\HTMLToMarkdown\HtmlConverter;

class ParsehtmlServiceProvider extends ServiceProvider
{
    /**
     * delay to load service.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * boot a service.
     *
     * @author yansongda <me@yansongda.cn>
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([
                dirname(__DIR__).'/config/markdown.php' => config_path('markdown.php'),
            ], 'laravel-html-config');
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure('markdown');
        }

        Blade::directive('parsehtml', function ($expression) {
            return "<?php echo parsehtml($expression); ?>";
        });
    }

    /**
     * registe the service.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(dirname(__DIR__).'/config/markdown.php', 'markdown');

        $this->app->singleton(HtmlConverter::class, function ($app) {
            return new HtmlConverter(config('markdown.parsehtml'));
        });

        $this->app->alias(HtmlConverter::class, 'parsehtml');
    }

    /**
     * providers.
     *
     * @return array
     */
    public function provides()
    {
        return [HtmlConverter::class, 'parsehtml'];
    }
}
