<?php

namespace App\Http\Controllers\Backend;

/**
 * EXAMPLE: Updated CertificateController using centralized ImageManager
 *
 * Replace the store() and update() methods in your existing CertificateController with these examples
 */

use App\Services\ImageManager;
use App\Models\Certificate;

class CertificateControllerExample extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'pdf.*' => 'nullable|file|mimes:pdf,jpeg,png,jpg,gif,svg',
            'description' => 'nullable|string',
        ]);

        // Create certificate first
        $certificate = Certificate::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
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
     * Update the specified resource in storage.
     */
    public function update(Request $request, Certificate $certificate)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'pdf.*' => 'nullable|file|mimes:pdf,jpeg,png,jpg,gif,svg',
            'description' => 'nullable|string',
        ]);

        // Update certificate fields
        $certificate->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'updated_by' => auth()->id(),
        ]);

        // Handle logo upload
        if ($request->hasFile('logo')) {
            // Delete old logo(s)
            ImageManager::deleteByModel($certificate->id, Certificate::class . ' logo');

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
            ImageManager::deleteByModel($certificate->id, Certificate::class . ' pdf');

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
        // Delete all images associated with this certificate
        ImageManager::deleteByModel($certificate->id, Certificate::class);

        // Soft delete the certificate
        $certificate->update([
            'deleted_by' => auth()->id(),
        ]);
        $certificate->delete();

        return redirect()->route('certificates.index')
            ->with('success', 'Certificate deleted successfully!');
    }

    /**
     * Display the DataTable with image previews
     */
    public function index()
    {
        if (request()->ajax()) {
            try {
                $query = Certificate::with(['logoImages', 'certificateFiles'])->withoutTrashed();

                return DataTables::of($query)
                    ->addColumn('logo_preview', function ($certificate) {
                        $logoImage = $certificate->logoImages()->first();
                        if ($logoImage) {
                            return '<img src="' . $logoImage->url . '" alt="' . $certificate->name . '" style="max-width: 80px; max-height: 60px; object-fit: contain;">';
                        }
                        return '<span class="text-muted">No Logo</span>';
                    })
                    ->addColumn('pdf_images_preview', function ($certificate) {
                        $files = $certificate->certificateFiles()->get();
                        if ($files->count() > 0) {
                            $html = '';
                            foreach ($files as $file) {
                                if ($file->isPdf()) {
                                    $html .= '<a href="' . $file->url . '" target="_blank" class="btn btn-sm btn-info me-1"><i class="uil uil-file-pdf"></i> PDF</a>';
                                } else {
                                    $html .= '<img src="' . $file->url . '" alt="' . $certificate->name . '" style="max-width: 60px; max-height: 50px; object-fit: contain; margin-right: 5px; border: 1px solid #ddd; border-radius: 3px;">';
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
                    ->rawColumns(['logo_preview', 'pdf_images_preview', 'action'])
                    ->toJson();
            } catch (\Exception $e) {
                \Log::error('CertificateController@index - ' . $e->getMessage());
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }

        $title = 'Certificates';
        return view('backend.certificate.index', compact('title'));
    }
}
