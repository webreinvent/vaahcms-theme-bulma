<?php namespace VaahCms\Themes\BulmaBlogTheme\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class ContentController extends Controller
{


    public function __construct()
    {

    }

    public function index()
    {
        return view('bulmablogtheme::backend.pages.index');
    }

    public function getAssets(Request $request)
    {
        $data=[];

        $response['status'] = 'success';
        $response['data'] = $data;

        return response()->json($response);

    }

}
