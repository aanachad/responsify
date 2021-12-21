<?php
/**
 * Created by PhpStorm.
 * User: devco
 * Date: 04/08/2019
 * Time: 22:33
 */
namespace DevcorpIt\ResponseCode\Http;
use \Illuminate\Contracts\Foundation\Application;
use \Illuminate\Routing\Router;
trait ResponseCodeKernelExtender
{
    public function __construct(Application $app, Router $router)
    {
        parent::__construct($app, $router);
        // use only for local environment
        if(env( 'APP_ENV' ) !== 'production')
        {
            $this->middleware[] = \DevcorpIt\ResponseCode\Http\Middleware\ResponseCodeUnicity::class;
        }
    }
}