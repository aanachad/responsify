<?php
namespace DevcorpIt\ResponseCode\Http\Controllers;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DevcorpIt\ResponseCode\Http\JsonResp;
use Illuminate\Support\Facades\Crypt;

class ResponseController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /** @var JsonResponse */
    protected $resp;
    function __construct()
    {
        $this->resp = new JsonResp();
    }
    public function row_number(){
        $row_number = request()->input('rows');
        return is_numeric($row_number) && $row_number <=100 ? request()->input('rows') : 20;
    }

    public function decrypt($data){
        try {
            $data = Crypt::decrypt($data);
        } catch (DecryptException $e) {
            return null;
        }
        return $data;
    }

    public function encrypt($data){
        return Crypt::encrypt($data);
    }


}
