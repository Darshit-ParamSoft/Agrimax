<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Career;
use App\Services\ImageManager;
use Illuminate\Http\Request;

class JoinUsController extends Controller
{
    /**
     * Show the join us page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $careers = Career::where('status', 1)->get();
        return view('frontend.join-us.index', compact('careers'));
    }

    /**
     * Store a newly created application.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:20',
                'career_id' => 'required|exists:careers,id',
                'years_of_experience' => 'required|integer|min:0',
                'qualification' => 'required|string|max:255',
                'cover_letter' => 'nullable|string',
                'resume' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
                'terms' => 'required|accepted',
            ]);

            // Create application first
            $application = Application::create([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'phone' => $request->phone,
                'career_id' => $request->career_id,
                'years_of_experience' => $request->years_of_experience,
                'qualification' => $request->qualification,
                'cover_letter' => $request->cover_letter,
            ]);

            // Handle PDF/Resume upload if present
            if ($request->hasFile('resume')) {
                try {
                    $file = $request->file('resume');

                    // Save using ImageManager - for PDFs it will only create original variant
                    $uploadedFiles = ImageManager::upload(
                        $file,
                        'application_resume',
                        $application->id,
                        Application::class,
                        'applications'
                    );

                    if (empty($uploadedFiles)) {
                        \Log::warning('Application resume upload failed for application ID: ' . $application->id);
                    }
                } catch (\Exception $e) {
                    \Log::error('JoinUsController - Resume upload error: ' . $e->getMessage());
                    // Don't fail the application if resume upload fails
                }
            }

            if ($request->expectsJson() || $request->header('X-Requested-With') === 'XMLHttpRequest') {
                return response()->json([
                    'success' => true,
                    'message' => 'Thank you for applying! Our HR team will review your application and contact you soon.'
                ], 200);
            }

            return back()->with('success', 'Thank you for applying! Our HR team will review your application and contact you soon.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            if ($request->expectsJson() || $request->header('X-Requested-With') === 'XMLHttpRequest') {
                return response()->json([
                    'success' => false,
                    'errors' => $e->errors()
                ], 422);
            }
            throw $e;
        } catch (\Exception $e) {
            \Log::error('JoinUsController@store - ' . $e->getMessage() . ' - ' . $e->getFile() . ':' . $e->getLine());
            \Log::error('JoinUsController@store Stack: ' . $e->getTraceAsString());

            if ($request->expectsJson() || $request->header('X-Requested-With') === 'XMLHttpRequest') {
                return response()->json([
                    'success' => false,
                    'message' => 'Error submitting application. Please try again.'
                ], 500);
            }

            return back()
                ->withInput()
                ->with('error', 'Error submitting application: ' . $e->getMessage());
        }
    }
}
