<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use App\Models\FormModel;

class FormController extends Controller
{
    //
    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|unique:forms|integer',
            'name' => 'required|string',
            'appeal' => 'required|string',
        ]);


        if ($validator->fails())
            return Response('bad request', 400);

        $id = $request->input('id');
        $name = $request->input('name');
        $appeal = $request->input('appeal');

        FormModel::factory()->save($id, $name, $appeal);
        return 'ok';
    }
}