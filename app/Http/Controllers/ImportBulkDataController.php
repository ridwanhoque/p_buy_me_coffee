<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImportBulkDataController extends Controller
{

    public function index(){
        return view('import_bulk_data.upload-file');
    }

    public function upload(){
        if(request()->has('mycsv')){
            return request()->file('mycsv');
            // return array_map('str_getcsv', request()->file('mycsv'));
        }

        return "please upload a file";
    }
}
