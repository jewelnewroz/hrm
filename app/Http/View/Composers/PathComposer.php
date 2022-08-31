<?php

namespace App\Http\View\Composers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PathComposer
{
    private Request $request;

    public function __construct( Request $request)
    {
        $this->request = $request;
    }

    public function compose(View $view)
    {
        $view->with([
            'current_route_name' => $this->request->route() ? $this->request->route()->getName() : '',
            'current_path' => $this->request->route() ? $this->request->route()->uri() : '',
            'current_action' => $this->request->route() ? $this->request->route()->getActionName() : ''
        ]);
    }
}
