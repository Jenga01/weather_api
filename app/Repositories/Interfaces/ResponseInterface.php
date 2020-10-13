<?php
namespace App\Repositories\Interfaces;


use Illuminate\Http\Request;

interface ResponseInterface
{
public function getMeteoData(Request $request, $placecode);
}
