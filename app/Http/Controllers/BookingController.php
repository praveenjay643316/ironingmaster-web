<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BookingController extends Controller
{
    public function index()
    {
        try {
            // Fetch data from API
            $response = Http::when(
                app()->environment('local'),
                fn ($http) => $http->withoutVerifying()
            )
            ->timeout(30)
            ->get(config('services.admin_api.url') . '/subcategories', [
                'category_id' => 2
            ]);

            if ($response->successful()) {
                $data = $response->json();
                
                // Group products by subcategory
                $productsBySubcategory = collect($data['data']['products'])
                    ->groupBy('subcategory_id');
                
                return view('booking', [
                    'subcategories' => $data['data']['subcategories'],
                    'products' => $data['data']['products'],
                    'productsBySubcategory' => $productsBySubcategory
                ]);
            }

            // Handle API error
            return view('booking')->with('error', 'Failed to load products');
            
        } catch (\Exception $e) {
            return view('booking')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}