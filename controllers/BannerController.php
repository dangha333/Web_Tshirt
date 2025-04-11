<?php
class BannerController
{
    public $modelBanner;

    public function __construct()
    {
        $this->modelBanner = new Banner();
    }
    public function banner()
    {
        $listBanner = $this->modelBanner->getAllBanner();
        require_once "./views/Home.php";
    }
}
