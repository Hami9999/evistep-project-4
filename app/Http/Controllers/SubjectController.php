<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Models\Subjects;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subject=Subjects::with('subjectMark')->get();
        return response()->json([
            "Subjects" => $subject
        ],201);
    }
    public function show(Subjects $subject)
    {
        try {
            $subject['marks'] = $subject->subjectMark()->get();
            $subject['max_mark'] = $subject->subjectMark()->max('mark');
            $subject['min_mark'] = $subject->subjectMark()->min('mark');

            return response()->json([
                "Subject" => $subject,
            ]);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }

    }
}
