<?php

class BreadcrumbLink extends Eloquent
{
    use TranslateTrait,
        \Yaro\Jarboe\Helpers\Traits\ImageTrait;
        
    protected $table = 'breadcrumb_links';
}