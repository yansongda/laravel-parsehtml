<?php

if (! function_exists('parsehtml')) {
    /**
     * convert markdown to html
     *
     * @author yansongda <me@yansongda.cn>
     *
     * @param  string $expression
     *
     * @return string
     */
    function parsehtml($expression)
    {
        return resolve('parsehtml')->convert($expression);
    }
}
