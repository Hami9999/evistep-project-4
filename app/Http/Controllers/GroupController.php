<?php

namespace App\Http\Controllers;

use App\Models\Groups;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        $group=Groups::all();
        return response()->json([
            "group" => $group
        ],201);
    }
    public function show(Groups $group)
    {
        try {

            $group['students'] = $group->students()->get();
            return response()->json([
                "group" => $group,
            ]);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }

    }
}
