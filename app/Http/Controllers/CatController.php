<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cat as Cat;
use App\Gender;
use App\Color;

class CatController extends Controller
{
    public function insertOne(Request $request)
    {
        $cat = new Cat;
        $cat->name = $request->name;
        $cat->size=$request->size;
        $cat->weight=$request->age;
        $cat->gender_id=$request->genders;
        $cat->age=$request->age;
        $cat->save();//Prend les infos qu'on lui a passé et les enregistres dans la bdd.
        $cat->colors()->attach($request->colors);
        return redirect('/');

    }
    public function deleteOne(Request $request, $id)
    {
        $cat = Cat::find($id);
        $cat->colors()->detach();
        $cat->delete();
        return redirect('/');
    }
    public function updateOne(Request $request, $id)
    {
            $gendersAll = Gender::all();
            $genders = [];
            foreach ($gendersAll as $value) {
                $genders[$value->id] = $value->gender;
            }

            $colorsAll = Color::all();
            $colors = [];
            foreach ($colorsAll as $value) {
                $colors[$value->id] = $value->color;
            }

            $cat = Cat::find($id);
        return view('update', ['genders' => $genders, 'colors' => $colors, 'cat' => $cat]);
    }
    public function updateOneAction(Request $request, $id)
    {
        $cat = Cat::find($request->id);
        $cat->name = $request->name;
        $cat->size = $request->size;
        $cat->weight = $request->weight;
        $cat->age = $request->age;
        $cat->gender_id = $request->gender;
        $cat->save();
        $cat->colors()->detach();
        $cat->colors()->attach($request->colors);
        return redirect('/');
    }
}
