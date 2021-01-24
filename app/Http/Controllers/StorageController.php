<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StorageController extends Controller
{
    private $fname, $pub_fname;

    public function __construct()
    {
        $this->fname = 'sample.txt';
        $this->pub_fname = 'disk_test.txt';
    }

    public function index()
    {
        $sample_msg = $this->fname;
        $sample_data = Storage::get($this->fname);
        $data = [
            'msg' => $sample_msg,
            'data' => explode(PHP_EOL, $sample_data)
        ];

        return view('configs.index', $data);
    }

    public function put($msg)
    {
        // $data = Storage::get($this->fname) . PHP_EOL . $msg;
        // Storage::put($this->fname, $data);
        Storage::append($this->fname, $msg);
        return redirect()->route('storage');
    }

    public function disk_index()
    {
        $sample_msg = Storage::disk('public')->url($this->pub_fname);
        $sample_data = Storage::disk('public')->get($this->pub_fname);
        $data = [
            'msg' => $sample_msg,
            'data' => explode(PHP_EOL, $sample_data)
        ];

        return view('configs.index', $data);
    }

    public function disk_put($msg)
    {
        Storage::disk('public')->prepend($this->pub_fname, $msg);
        return redirect()->route('disk_storage');
    }
}
