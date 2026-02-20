<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ContactSetting;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ContactSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            try {
                $query = ContactSetting::withoutTrashed();

                return DataTables::of($query)
                    ->addColumn('value_truncated', function ($setting) {
                        $value = $setting->value ?? '';
                        $preview = strlen($value) > 100 ? substr($value, 0, 100) . '...' : $value;
                        return '<small>' . htmlspecialchars($preview) . '</small>';
                    })
                    ->addColumn('created_by_name', function ($setting) {
                        if ($setting->created_by) {
                            $user = \App\Models\User::find($setting->created_by);
                            return $user ? $user->name : 'N/A';
                        }
                        return 'N/A';
                    })
                    ->addColumn('updated_by_name', function ($setting) {
                        if ($setting->updated_by) {
                            $user = \App\Models\User::find($setting->updated_by);
                            return $user ? $user->name : 'N/A';
                        }
                        return 'N/A';
                    })
                    ->addColumn('action', function ($setting) {
                        return view('backend.contact-setting.action', compact('setting'))->render();
                    })
                    ->rawColumns(['value_truncated', 'action'])
                    ->toJson();
            } catch (\Exception $e) {
                \Log::error('ContactSettingController@index - ' . $e->getMessage());
                \Log::error($e->getTraceAsString());
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }

        $title = 'Contact Settings';
        return view('backend.contact-setting.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Create Contact Setting';
        $setting = null;

        return view('backend.contact-setting.form', compact('title', 'setting'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'key' => 'required|string|max:255|unique:contact_settings,key,NULL,id,deleted_at,NULL',
            'value' => 'required|string',
        ]);

        try {
            ContactSetting::create([
                'key' => $request->key,
                'value' => $request->value,
                'created_by' => auth()->id(),
                'updated_by' => auth()->id(),
            ]);

            return redirect()->route('contact-settings.index')
                ->with('success', 'Contact setting created successfully.');
        } catch (\Exception $e) {
            \Log::error('ContactSettingController@store - ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->with('error', 'Error creating setting: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactSetting $contactSetting)
    {
        $title = 'View Setting - ' . $contactSetting->key;
        return view('backend.contact-setting.show', compact('title', 'contactSetting'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactSetting $contactSetting)
    {
        $title = 'Edit Contact Setting';
        $setting = $contactSetting;
        return view('backend.contact-setting.form', compact('title', 'setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContactSetting $contactSetting)
    {
        $request->validate([
            'key' => 'required|string|max:255|unique:contact_settings,key,' . $contactSetting->id . ',id,deleted_at,NULL',
            'value' => 'required|string',
        ]);

        try {
            $contactSetting->update([
                'key' => $request->key,
                'value' => $request->value,
                'updated_by' => auth()->id(),
            ]);

            return redirect()->route('contact-settings.index')
                ->with('success', 'Contact setting updated successfully.');
        } catch (\Exception $e) {
            \Log::error('ContactSettingController@update - ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->with('error', 'Error updating setting: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactSetting $contactSetting)
    {
        try {
            $contactSetting->update(['deleted_by' => auth()->id()]);
            $contactSetting->delete();

            return redirect()->route('contact-settings.index')
                ->with('success', 'Contact setting deleted successfully.');
        } catch (\Exception $e) {
            \Log::error('ContactSettingController@destroy - ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Error deleting setting: ' . $e->getMessage());
        }
    }
}
