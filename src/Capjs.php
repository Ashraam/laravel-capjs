<?php

namespace Ashraam\Capjs;

class Capjs
{
    public function script(): string
    {
        return '<script src="'.config('capjs.host').'/assets/widget.js"></script>';
    }
}
