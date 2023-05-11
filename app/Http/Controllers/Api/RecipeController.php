<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{
    public function getRecipeAuthor($recipe_id) {
        $recipe = Recipe::find($recipe_id);

        return response()->json([
            'user' => $recipe->user
        ]);
    }
}
