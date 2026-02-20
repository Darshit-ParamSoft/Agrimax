<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Yajra\DataTables\Facades\DataTables;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the applications.
     */
    public function index()
    {
        if (request()->ajax()) {
            try {
                $query = Application::with('career', 'imageFiles')->withoutTrashed()->orderBy('id', 'desc');

                return DataTables::of($query)
                    ->addColumn('fullname', function ($application) {
                        return $application->firstname . ' ' . $application->lastname;
                    })
                    ->addColumn('career_name', function ($application) {
                        return $application->career ? $application->career->name : 'N/A';
                    })
                    ->addColumn('phone_display', function ($application) {
                        return $application->phone;
                    })
                    ->addColumn('qualifications_display', function ($application) {
                        return $application->qualification ?: 'N/A';
                    })
                    ->addColumn('experience_display', function ($application) {
                        return $application->years_of_experience ? $application->years_of_experience . ' years' : 'N/A';
                    })
                    ->addColumn('cover_letter_preview', function ($application) {
                        $preview = substr($application->cover_letter, 0, 50);
                        return strlen($application->cover_letter) > 50 ? $preview . '...' : $preview;
                    })
                    ->addColumn('created_at_display', function ($application) {
                        return $application->created_at->format('d M Y');
                    })
                    ->addColumn('action', function ($application) {
                        return view('backend.application.action', compact('application'))->render();
                    })
                    ->rawColumns(['action', 'cover_letter_preview'])
                    ->toJson();
            } catch (\Exception $e) {
                \Log::error('ApplicationController@index - ' . $e->getMessage());
                \Log::error($e->getTraceAsString());
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }

        $title = 'Applications';
        return view('backend.application.index', compact('title'));
    }

    /**
     * Delete an application.
     */
    public function destroy($id)
    {
        try {
            $application = Application::findOrFail($id);
            $application->delete();

            return redirect()->route('applications.index')
                ->with('success', 'Application deleted successfully.');
        } catch (\Exception $e) {
            \Log::error('ApplicationController@destroy - ' . $e->getMessage());
            return redirect()->route('applications.index')
                ->with('error', 'Failed to delete application.');
        }
    }
}
