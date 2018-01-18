<?php

if (!function_exists('parsehtml')) {
    /**
     * convert html to markdown.
     *
     * @author yansongda <me@yansongda.cn>
     *
     * @param string $expression
     *
     * @return string
     */
    function parsehtml($expression)
    {
        return app('parsehtml')->convert($expression);
    }
}
