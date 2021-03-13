<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use App\Jobs\MyJob;
use Illuminate\Support\Facades\Storage;

class JobController extends Controller
{
    public function index(Person $person = null)
    {
        $msg = 'Show People records.';
        $result = Person::get();

        $data = [
            'input' => '',
            'msg' => $msg,
            'data' => $result,
        ];

        return view('job.index', $data);
    }

    public function send(Request $request)
    {
        $id = $request->input('id');
        $person = Person::find($id);

        dispatch(function() use ($person) {
            Storage::append('person_access_log.txt', $person->all_data);
        });
        return redirect('/job');
    }

    public function suffix(Person $person = null)
    {
        if ($person != null) {
            MyJob::dispatch($person)->delay(now()->addMinutes(1));
        }
        $msg = 'Show People records.';
        $result = Person::get();

        $data = [
            'input' => '',
            'msg' => $msg,
            'data' => $result,
        ];

        return view('job.index', $data);
    }

    public function even_odd(Person $person = null)
    {
        if ($person != null) {
            $qname = $person->id % 2 == 0 ? 'even' : 'odd';
            MyJob::dispatch($person)->onQueue($qname);
        }
        $msg = 'Show People records.';
        $result = Person::get();

        $data = [
            'input' => '',
            'msg' => $msg,
            'data' => $result,
        ];

        return view('job.index', $data);
    }
}
