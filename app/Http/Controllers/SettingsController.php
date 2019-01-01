<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Settings;
use DB;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('settings.index');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            Settings::truncate();

            Settings::create( [
                'key' => 'date',
                'value' => $request['date'],
            ]);

            Settings::create( [
                'key' => 'max_allow_absence_hours',
                'value' => $request['max_allow_absence_hours'],
            ]);

            Settings::create( [
                'key' => 'class_standing',
                'value' => $request['class_standing'],
            ]);

            Settings::create( [
                'key' => 'academy_staff_officer',
                'value' => $request['academy_staff_officer'],
            ]);

            Settings::create( [
                'key' => 'evaluation_start_date',
                'value' => $request['evaluation_start_date'],
            ]);

            Settings::create( [
                'key' => 'evaluation_end_date',
                'value' => $request['evaluation_end_date'],
            ]);

            DB::commit();
            return redirect('settings');
        } catch (\Exception $e) {
            DB::rollback();
            die($e->getMessage());
            return false;
        }
    }
}
