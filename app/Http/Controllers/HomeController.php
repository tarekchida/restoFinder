<?php

namespace App\Http\Controllers;

use Log;
use Illuminate\Http\Request;

class HomeController extends Controller {

    public function home() {
        return view('home');
    }

    /**
     * Rest Api handler
     * @param Request $request
     * @return type
     */
    public function getRestaurants(Request $request) {
        $favorites = $request->input("favorites", array());
        $search = $request->input("search", NULL);
        $sortKey = $request->input("sortKey", Null);

        Log::info('Api request params :');
        Log::info('Favorites : ' . implode(',', $favorites));
        Log::info('Search :' . $search);
        Log::info('sortKey : ' . $sortKey);

        $restaurants = $this->getSortedRestaurants($sortKey, $search, $favorites);
        return response()->json($restaurants);
    }

    /**
     * Sort and filter restaurants
     * @param type $sortKey
     * @param type $search
     * @param type $favorites
     * @return type
     */
    private function getSortedRestaurants($sortKey, $search = NULL, $favorites = array()) {

        $filtredRestaurants = array(
            'open' => array(),
            'order ahead' => array(),
            'closed' => array()
        );
        $favoritesArray = array();
        $sortedRestaurants = array();

        // Load data
        $restaurants = $this->loadJson();

        // Filter data by restaurant name
        if (!empty($search)) {
            $restaurants = array_filter($restaurants, function ($restaurant) use ($search) {
                if (stripos($restaurant->name, $search) !== false) {
                    return true;
                }
                return false;
            });
        }

        // Split restaurants in groups by status & Filter user favorites²
        foreach ($restaurants as $restaurant) {
            $favorite = FALSE;
            if (in_array($restaurant->name, $favorites)) {
                $favorite = TRUE;
            }
            $restaurant->favorite = $favorite;
            $group = $restaurant->status;
            $sortingValues = $restaurant->sortingValues;
            $restaurant->sortingValues->topRestaurants = ($sortingValues->distance * $sortingValues->popularity) + $sortingValues->ratingAverage;
            $filtredRestaurants[$group][] = $restaurant;
        }

        // Sort restaurants groups by selected sort
        if (!empty($sortKey)) {
            $this->arraySort($filtredRestaurants['open'], $sortKey);
            $this->arraySort($filtredRestaurants['order ahead'], $sortKey);
            $this->arraySort($filtredRestaurants['closed'], $sortKey);
        }

        // Merge restaurants groups
        $sortedRestaurants = array_merge($sortedRestaurants, $filtredRestaurants['open']);
        $sortedRestaurants = array_merge($sortedRestaurants, $filtredRestaurants['order ahead']);
        $sortedRestaurants = array_merge($sortedRestaurants, $filtredRestaurants['closed']);



        return $sortedRestaurants;
    }

    /**
     * Sort array with sortKey
     * @param type $array
     * @param type $sortKey
     */
    private function arraySort(&$array, $sortKey) {
        if (!empty($array)) {
            usort($array, function($a, $b) use($sortKey) {
                return $a->sortingValues->{$sortKey} <=> $b->sortingValues->{$sortKey};
            });
            $array = array_reverse($array);
        }
    }

    /**
     * Load restaurant JSON
     * @return type array
     */
    private function loadJson() {
        $filePath = storage_path('app') . "/Sample.json";

        if (file_exists($filePath)) {
            $string = file_get_contents($filePath);
            $restaurantList = json_decode($string);
        } else {
            Log::error('File JSON not found');
        }
        return $restaurantList->restaurants;
    }

}
