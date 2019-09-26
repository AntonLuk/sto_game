<?php

namespace App\Http\Controllers;

use App\PrizeType;
use Illuminate\Http\Request;

class PrizeTypeController extends Controller
{
    public function list() {
        $types = PrizeType::all();
        return $types;
    }

    public function add(Request $request) {
        $type = new PrizeType();
        $type->name = $request->name;
        $type->save();
        return $this->list();
    }

    public function editForm($id) {
        $type = PrizeType::find($id);
        return $type;
    }

    public function edit(Request $request) {
        $type = PrizeType::find($request->id);
        $type->name = $request->name;
        $type->save();
        return $type;
    }
}
