<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class EnquiryController extends Controller
{
    /**
     * Display a listing of enquiries.
     */
    public function index()
    {
        if (request()->ajax()) {
            try {
                $query = Enquiry::withoutTrashed()->orderBy('id', 'desc');

                return DataTables::of($query)
                    ->addColumn('product_name', function ($enquiry) {
                        return $enquiry->product ? $enquiry->product->name : 'N/A';
                    })
                    ->addColumn('message_preview', function ($enquiry) {
                        $message = $enquiry->message ?? '';
                        $preview = strlen($message) > 20 ? substr($message, 0, 20) . '...' : $message;
                        return '<small>' . htmlspecialchars($preview) . '</small>';
                    })
                    ->addColumn('created_at', function ($enquiry) {
                        return $enquiry->created_at->format('F d, Y');
                    })
                    ->addColumn('actions', function ($enquiry) {
                        return view('backend.enquiry.action', compact('enquiry'))->render();
                    })
                    ->rawColumns(['message_preview', 'actions'])
                    ->toJson();
            } catch (\Exception $e) {
                \Log::error('EnquiryController@index - ' . $e->getMessage());
                \Log::error($e->getTraceAsString());
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }

        $title = 'Enquiries';
        return view('backend.enquiry.index', compact('title'));
    }

    /**
     * Display the specified enquiry.
     */
    public function show(Enquiry $enquiry)
    {
        $title = 'View Enquiry - ' . $enquiry->name;
        return view('backend.enquiry.show', compact('title', 'enquiry'));
    }
}
