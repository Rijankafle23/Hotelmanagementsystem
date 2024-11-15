<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

use Illuminate\Support\Collection;

class SortController extends Controller
{
    public function index(Request $request)
    {
        $rooms = Room::all();

        $query = Room::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%');
        }

        $sortOption = $request->get('sort');

        switch ($sortOption) {
            case 'price-low-to-high':
                $rooms = $this->sortAscending($rooms, 'price');
                break;
            case 'price-high-to-low':
                $rooms = $this->sortDescending($rooms, 'price');
                break;
            case 'latest':
                $rooms = $this->sortDescending($rooms, 'created_at'); // Assuming 'created_at' for latest
                break;
            default:
                // Optionally handle default case or sorting
                break;
        }





        return view('user.hotel', compact('rooms'));
    }
    public function sortAscending(Collection $collection, string $attribute): Collection
    {
        $array = $collection->all();

        // If the array has less than 2 elements, it's already sorted
        if (count($array) < 2) {
            return new Collection($array);
        }

        // Perform merge sort
        $sortedArray = $this->mergeSort($array, $attribute, 'asc');
        return new Collection($sortedArray);
    }

    // Sort collection in descending order based on the specified attribute
    public function sortDescending(Collection $collection, string $attribute): Collection
    {
        $array = $collection->all();

        // If the array has less than 2 elements, it's already sorted
        if (count($array) < 2) {
            return new Collection($array);
        }

        // Perform merge sort
        $sortedArray = $this->mergeSort($array, $attribute, 'desc');
        return new Collection($sortedArray);
    }

    // Recursive merge sort algorithm
    private function mergeSort(array $array, string $attribute, string $order): array
    {
        if (count($array) <= 1) {
            return $array;
        }

        // Split the array into two halves
        $mid = (int)(count($array) / 2);
        $left = array_slice($array, 0, $mid);
        $right = array_slice($array, $mid);

        // Recursively sort both halves
        $left = $this->mergeSort($left, $attribute, $order);
        $right = $this->mergeSort($right, $attribute, $order);

        // Merge the sorted halves
        return $this->merge($left, $right, $attribute, $order);
    }

    // Merge two sorted arrays
    private function merge(array $left, array $right, string $attribute, string $order): array
    {
        $result = [];
        $i = 0;
        $j = 0;

        // Compare the elements of both arrays and merge them in sorted order
        while ($i < count($left) && $j < count($right)) {
            if (($order === 'asc' && $left[$i]->{$attribute} <= $right[$j]->{$attribute}) ||
                ($order === 'desc' && $left[$i]->{$attribute} >= $right[$j]->{$attribute})
            ) {
                $result[] = $left[$i];
                $i++;
            } else {
                $result[] = $right[$j];
                $j++;
            }
        }

        // Append the remaining elements of the left array, if any
        while ($i < count($left)) {
            $result[] = $left[$i];
            $i++;
        }

        // Append the remaining elements of the right array, if any
        while ($j < count($right)) {
            $result[] = $right[$j];
            $j++;
        }

        return $result;
    }

    // Filter collection by genre (no changes needed from your original method)
    public function filterByGenre(Collection $collection, string $genre): Collection
    {
        return $collection->filter(function ($movie) use ($genre) {
            return $movie->genres->contains('name', $genre);
        });
    }
}
