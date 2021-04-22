<?php
class PageController extends Module
{
    public function home()
    {
        $this->name = 'best_sellers';
        parent::install();
    }
    public function test()
    {
        echo 'mundo';
    }
}
