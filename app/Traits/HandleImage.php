<?php

namespace App\Traits;

trait HandleImage{

    public function handleimage($request)
    {
        $imageName = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('public/images', $imageName);
        return $imageName; 
    }

}