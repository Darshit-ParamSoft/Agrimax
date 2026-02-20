<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Services\ImageManager;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            try {
                $query = Certificate::with(['logoImages', 'certificateFiles'])->withoutTrashed();

                return DataTables::of($query)
                    ->addColumn('logo_preview', function ($certificate) {
                        // Get compressed variant for faster loading, fallback to thumbnail, then any variant
                        $logoImage = $certificate->logoImages()
                            ->where('image_variant', 'compressed')
                            ->first();

                        if (!$logoImage) {
                            $logoImage = $certificate->logoImages()
                                ->where('image_variant', 'thumbnail')
                                ->first();
                        }

                        if (!$logoImage) {
                            $logoImage = $certificate->logoImages()->first();
                        }

                        if ($logoImage) {
                            return '<img src="' . $logoImage->url . '" alt="' . $certificate->name . '" style="max-width: 80px; max-height: 60px; object-fit: contain;">';
                        }
                        return '<span class="text-muted">No Logo</span>';
                    })
                    ->addColumn('pdf_preview', function ($certificate) {
                        // Get only base files (original variants) to avoid showing all 3 variants of same file
                        $files = $certificate->certificateFiles()
                            ->where('image_variant', 'original')
                            ->get();

                        if ($files->count() > 0) {
                            $html = '';
                            foreach ($files as $file) {
                                if ($file->isPdf()) {
                                    $html .= '<a href="' . $file->url . '" target="_blank" class="btn btn-sm btn-info me-1"><i class="uil uil-file-pdf"></i> PDF</a>';
                                } else {
                                    // Get compressed variant for display, fallback to thumbnail
                                    $displayFile = $certificate->certificateFiles()
                                        ->where('filename', 'like', '%' . str_replace(['or_', 'th_', 'cr_'], '', $file->filename) . '%')
                                        ->where('image_variant', 'compressed')
                                        ->first();

                                    if (!$displayFile) {
                                        $displayFile = $certificate->certificateFiles()
                                            ->where('filename', 'like', '%' . str_replace(['or_', 'th_', 'cr_'], '', $file->filename) . '%')
                                            ->where('image_variant', 'thumbnail')
                                            ->first();
                                    }

                                    if (!$displayFile) {
                                        $displayFile = $file;
                                    }

                                    $html .= '<img src="' . $displayFile->url . '" alt="' . $certificate->name . '" style="max-width: 60px; max-height: 50px; object-fit: contain; margin-right: 5px; border: 1px solid #ddd; border-radius: 3px;">';
                                }
                            }
                            return $html;
                        }
                        return '<span class="text-muted">No Files</span>';
                    })
                    ->addColumn('action', function ($certificate) {
                        return view('backend.certificate.action', compact('certificate'))->render();
                    })
                    ->addColumn('created_at', function ($certificate) {
                        return $certificate->created_at->format('M d, Y');
                    })
                    ->rawColumns(['logo_preview', 'pdf_preview', 'action'])
                    ->toJson();
            } catch (\Exception $e) {
                \Log::error('CertificateController@index - ' . $e->getMessage());
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }

        $title = 'Certificates';
        return view('backend.certificate.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Create Certificate';
        $certificate = null;

        return view('backend.certificate.form', compact('title', 'certificate'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'pdf.*' => 'nullable|mimes:pdf,jpeg,png,jpg,gif,svg|max:5120',
        ]);

        // Create certificate
        $certificate = Certificate::create([
            'name' => $request->input('name'),
            'created_by' => auth()->id(),
            'updated_by' => auth()->id(),
        ]);

        // Upload logo using ImageManager
        if ($request->hasFile('logo')) {
            ImageManager::upload(
                $request->file('logo'),
                'certificate_logo',
                $certificate->id,
                Certificate::class,
                'certificates'
            );
        }

        // Upload PDF & Images using ImageManager
        if ($request->hasFile('pdf')) {
            ImageManager::uploadMultiple(
                $request->file('pdf'),
                'certificate_pdf',
                $certificate->id,
                Certificate::class,
                'certificates'
            );
        }

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Certificate created successfully!'
            ]);
        }

        return redirect()->route('certificates.index')
            ->with('success', 'Certificate created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Certificate $certificate)
    {
        $title = 'View Certificate';

        return view('backend.certificate.show', compact('certificate', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Certificate $certificate)
    {
        $title = 'Edit Certificate';

        return view('backend.certificate.form', compact('certificate', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Certificate $certificate)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'pdf.*' => 'nullable|mimes:pdf,jpeg,png,jpg,gif,svg|max:5120',
        ]);

        // Update certificate fields
        $certificate->update([
            'name' => $request->input('name'),
            'updated_by' => auth()->id(),
        ]);

        // Handle logo upload
        if ($request->hasFile('logo')) {
            // Delete old logos
            $certificate->logoImages()->delete();

            // Upload new logo
            ImageManager::upload(
                $request->file('logo'),
                'certificate_logo',
                $certificate->id,
                Certificate::class,
                'certificates'
            );
        }

        // Handle PDF & Images upload
        if ($request->hasFile('pdf')) {
            // Delete old files
            $certificate->certificateFiles()->delete();

            // Upload new files
            ImageManager::uploadMultiple(
                $request->file('pdf'),
                'certificate_pdf',
                $certificate->id,
                Certificate::class,
                'certificates'
            );
        }

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Certificate updated successfully!'
            ]);
        }

        return redirect()->route('certificates.index')
            ->with('success', 'Certificate updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Certificate $certificate)
    {
        // Delete all associated images through the ImageManager
        ImageManager::deleteByModel($certificate->id, Certificate::class);

        // Soft delete the certificate
        $certificate->update([
            'deleted_by' => auth()->id(),
        ]);
        $certificate->delete();

        return redirect()->route('certificates.index')
            ->with('success', 'Certificate deleted successfully!');
    }
}
