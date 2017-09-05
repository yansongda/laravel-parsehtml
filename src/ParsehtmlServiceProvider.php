<?php

namespace Yansongda\LaravelParsehtml;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
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
     * @return  void
     */
    public function boot()
    {
        if (!file_exists(config_path('markdown.php'))) {
            $this->publishes([
                dirname(__DIR__) . '/config/markdown.php' => config_path('markdown.php'),
            ], 'config');
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
        $this->mergeConfigFrom(dirname(__DIR__) . '/config/markdown.php', 'markdown');

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
