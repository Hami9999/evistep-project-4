<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubjectsWhitMarksRequest;
use App\Models\Students;
use App\Models\Subjects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SubjectController extends Controller
{
    public function index()
    {
        $subject = Subjects::all();
        return response()->json([
            "Subjects" => $subject
        ],201);
    }
    public function show(Subjects $subject)
    {
        try {
            $subject->load('subjectMark');
            return response()->json([
                "subject" => $subject,
            ]);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }

    }

    public function subjectsWithMarks(SubjectsWhitMarksRequest $request){
        $data = $request->validated();
        $subjects = Subjects::with('subjectMark')->get();
        $array = [];
        try {
            foreach ($subjects as $subject){
                $subject->load('subjectMark');
                $mark = $subject['subjectMark']->sortBy('mark', SORT_NATURAL, $data['sort'])->first();
                if($mark) {
                    $array[] = [
                        "subject" => $subject['title'],
                        "student" => $mark->student['first_name'] ?? 'not have student',
                        "mark" => $mark['mark'],
                    ];
                } else {
                    $array[] = [
                        "subject" => $subject['title'],
                        "mark" => 'Not have mark',
                    ];
                }


            }
        } catch (\Exception $e) {
            dd($e->getLine(), $e->getMessage());
        }


dd($array);
        return response()->json([
        ],201);
    }
}
