<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentPostRequest;
use App\Models\Students;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function store(StudentPostRequest $request)
    {
        try {
            $data = $request->validated();
            $student = Students::create($data);
            return response()->json([
                "message" => "New Student Added.",
                "student" => $student
            ],201);
        }
        catch (\Exception $e) {
            return $e;
        }

    }
    public function updateStudent(StudentPostRequest $request,Students $student)
    {
        $data = $request->validated();
        if($data){
            $student->first_name = is_null($data['first_name']) ? $student->first_name : $data['first_name'];
            $student->last_name = is_null($data['last_name']) ? $student->last_name : $data['last_name'];
            $student->group_id = is_null($data['group_id']) ? $student->group_id : $data['group_id'];
            $student->save();
            return response()->json([
                "message" => "Student Updated.",
                "Student" => $student,
            ],404);
        }else{
            return response()->json([
                "message" => "Student Not Found."
            ],404);
        }
    }
    public function destroy(Students $student)
    {
        try {
            $student->delete();
            return response()->json([
                "message" => "Student Deleted."
            ],202);
        } catch (\Exception $e) {
            return $e;
        }
    }
}
