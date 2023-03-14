<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivityRequest;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ActivityController extends Controller
{
    public function index()
    {
        return view('activities.index', [
            'activity'   => new Activity,
            'activities' => Activity::orderBy('id', 'desc')->get()
        ]);
    }

    public function store(ActivityRequest $request)
    {
        $uuid = strtolower(Str::uuid(32));

        Activity::create([
            'uuid'          => $uuid,
            'activity_code' => $request->activity_code,
            'activity_name' => $request->activity_name,
        ]);

        return back()->with('success', 'Data sudah berhasil disimpan.');
    }

    public function edit($uuid)
    {
        $activity = Activity::where('uuid', $uuid)->first();

        return view('activities.edit', [
            'activity' => $activity
        ]);
    }

    public function update(ActivityRequest $request, $uuid)
    {
        Activity::where('uuid', $uuid)->update([
            'activity_code' => $request->activity_code,
            'activity_name' => $request->activity_name
        ]);

        return redirect('activities')->with('update', 'Data berhasil diupdate.');
    }

    public function destroy($uuid)
    {
        Activity::where('uuid', $uuid)->first()->delete();
        
        return back()->with('delete', 'Data berhasil dihapus.');
    }
}
