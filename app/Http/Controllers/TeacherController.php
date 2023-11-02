<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherPostRequest;
use App\Models\Teachers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    public function store(TeacherPostRequest $request)
    {
        try {
            $data = $request->validated();
            $teacher = Teachers::create($data);
            DB::table('subject_teacher')->insert([
                'subject_id' =>$data['subject_id'],
                'teacher_id' =>$teacher->id,
                'group_id' =>$data['group_id'],
            ]);
            return response()->json([
                "message" => "New Teacher Added.",
                "teacher" => $teacher
            ],201);
        }
        catch (\Exception $e) {
            return $e;
        }

    }
    public function updateTeacher(TeacherPostRequest $request,Teachers $teacher)
    {
        $data = $request->validated();
        if($data){
            $teacher->first_name = is_null($data['first_name']) ? $teacher->first_name : $data['first_name'];
            $teacher->last_name = is_null($data['last_name']) ? $teacher->last_name : $data['last_name'];
            $teacher->save();
            DB::table('subject_teacher')->where('teacher_id', $teacher->id)->update([
                'subject_id' =>$data['subject_id'],
                'teacher_id' =>$teacher->id,
                'group_id' =>$data['group_id'],
            ]);
            return response()->json([
                "message" => "Teacher Updated.",
                "Teacher" => $teacher,
            ],404);
        }else{
            return response()->json([
                "message" => "Teacher Not Found."
            ],404);
        }
    }
    public function destroy(Teachers $teacher){
        try {
            $teacher->delete();
            return response()->json([
                "message" => "Teacher Deleted."
            ],202);
        } catch (\Exception $e) {
            return $e;
        }
    }
}
