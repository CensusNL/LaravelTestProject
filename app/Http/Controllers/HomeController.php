<?php

namespace App\Http\Controllers;

use App\Jobs\ImportUsers;
use App\Http\Requests\ImportExcelRequest;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     *
     @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(ImportExcelRequest $request)
    {
        $file = $request->file;

        if ($file->isValid()) {
            $filename = microtime('.') * 10000 . $file->getClientOriginalName();

            Storage::disk('local')->put($filename, file_get_contents($file->path()));

            Bus::dispatch(new ImportUsers($filename));
        }

        return back();
    }

}
