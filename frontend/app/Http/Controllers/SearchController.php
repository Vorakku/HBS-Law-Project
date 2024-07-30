<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Convert the query to lowercase for case-insensitive matching
        $lowercaseQuery = Str::lower($query);

        // Define an associative array where the keys are the search keywords and the values are the corresponding route names
        $expertiseRoutes = [
            'aircraft-leasing' => 'AIRCRAFT LEASING & PURCHASE',
            'banking-finance' => 'BANKING & FINANCE',
            'construction-realestate' => 'CONSTRUCTION & REAL ESTATE DEVELOPMENT',
            'custom-tax' => 'CUSTOMS AND TAX',
            'dispute-resolution' => 'DISPUTE RESOLUTION AND LITIGATION',
            // Add more route names and their corresponding display names
        ];

        // Check if the query matches any route name
        foreach ($expertiseRoutes as $routeName => $displayName) {
            $lowercaseDisplayName = Str::lower($displayName);
            if (Str::contains($lowercaseDisplayName, $lowercaseQuery)) {
                return Redirect::route($routeName);
            }
        }
        return redirect()->route('search.results', ['query' => $query]);
    }
}
