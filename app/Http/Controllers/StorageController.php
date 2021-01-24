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
        $url = Storage::disk('public')->url($this->pub_fname);
        $size = Storage::disk('public')->size($this->pub_fname);
        $modified = Storage::disk('public')->LastModified($this->pub_fname);
        $modified_time = date('y-m-d H:i:s', $modified);
        $sample_keys = ['url', 'size', 'modified'];
        $sample_meta = [$url, $size, $modified_time];
        $result = '<table><tr><th>' . implode('</th><th>', $sample_keys) . '</th></tr>';
        $result .= '<tr><td>' . implode('</td><td>', $sample_meta) . '</td></tr></table>';

        $sample_data = Storage::disk('public')->get($this->pub_fname);
        $data = [
            'msg' => $result,
            'data' => explode(PHP_EOL, $sample_data)
        ];

        return view('configs.index', $data);
    }

    public function disk_put($msg)
    {
        Storage::disk('public')->prepend($this->pub_fname, $msg);
        return redirect()->route('disk_storage');
    }

    public function backup()
    {
        if(Storage::disk('public')->exists('bk_' . $this->pub_fname)) {
            Storage::disk('public')->delete('bk_' . $this->pub_fname);
        }

        Storage::disk('public')->copy($this->pub_fname, 'bk_' . $this->pub_fname);

        if(Storage::disk('local')->exists('bk_' . $this->pub_fname)) {
            Storage::disk('local')->delete('bk_' . $this->pub_fname);
        }

        Storage::disk('local')->move('public/bk_' . $this->pub_fname, 'bk_' . $this->pub_fname);

        return redirect()->route('disk_storage');
    }

    public function download()
    {
        return Storage::disk('public')->download($this->pub_fname);
    }

    public function upload(Request $request)
    {
        $ext = '.' . $request->file('file')->extension();
        Storage::disk('local')->putFileAs('files', $request->file('file'), 'uploaded' . $ext);
        return redirect()->route('disk_storage');
    }
}
