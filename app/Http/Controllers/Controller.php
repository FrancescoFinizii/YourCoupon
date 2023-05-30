<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function save($req, $model)
    {
        if ($req->hasFile('ProPic')) {
            $propic = $req->file('ProPic');
            $propicname = $propic->getClientOriginalName();
            $propic->move(public_path() . '/img/user', $propicname);
        }
        else {
            $propicname = null;
        }

        $model->fill($req->validated());
        $model->ProPic = $propicname;
        $model->save();
    }

}
