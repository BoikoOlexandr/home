<?php


namespace controller;


use core\controller;

class adminController extends controller
{
    private $admin;
    public function __construct($di)
    {
        $this->InitComponents($di);
        $this->admin = $this->model->Get('admin', $di);
    }

    public function ShowFeedBacks()
    {

        $this->view->Render(
            'admin'.ds.'showFeedBacks',

            );
    }
    public function GetFeedBacks()
    {
        //print_r($this->admin->GetFeedBacks());
        print_r('sd');
      //  return 'er';
    }
}