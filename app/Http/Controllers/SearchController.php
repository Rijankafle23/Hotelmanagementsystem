<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $rooms = Room::all(); // Retrieve all rooms with related data

        // Fields to search in
        $fields = 'name';

        // Perform the search using regex
        $rooms = $this->search($rooms, $query, $fields);

        return view('user.search', compact('rooms', 'query'));
    }


    public function search($items, $query, $field)
    {
        // Sort the collection based on the search field (e.g. title)
        $sortedItems = $items->sortBy(function ($item) use ($field) {
            return strtolower($this->getFieldValue($item, $field));
        })->values(); // Sort and reset keys

        return $this->binarySearch($sortedItems, $query, $field);
    }

    /**
     * Perform binary search on the sorted collection of items.
     * @param \Illuminate\Support\Collection $items
     * @param string $query
     * @param string $field
     * @return \Illuminate\Support\Collection
     */
    private function binarySearch($items, $query, $field)
    {
        $low = 0;
        $high = $items->count() - 1;
        $query = strtolower($query); // Case-insensitive search

        $results = collect(); // Collection to store the result

        while ($low <= $high) {
            $mid = intdiv($low + $high, 2);
            $midValue = strtolower($this->getFieldValue($items[$mid], $field));

            if ($midValue === $query) {
                // Exact match found, add it to the results collection
                $results->push($items[$mid]);

                // Look for possible duplicates to the left and right
                $left = $mid - 1;
                $right = $mid + 1;

                // Check for more matches to the left
                while ($left >= 0 && strtolower($this->getFieldValue($items[$left], $field)) === $query) {
                    $results->push($items[$left]);
                    $left--;
                }

                // Check for more matches to the right
                while ($right < $items->count() && strtolower($this->getFieldValue($items[$right], $field)) === $query) {
                    $results->push($items[$right]);
                    $right++;
                }

                return $results; // Return all matches
            } elseif ($midValue < $query) {
                // Mid value is less than the query, search in the right half
                $low = $mid + 1;
            } else {
                // Mid value is greater than the query, search in the left half
                $high = $mid - 1;
            }
        }

        // If no match is found, return an empty collection
        return $results;
    }

    /**
     * Helper method to get the value of a field from an item.
     * @param $item
     * @param string $field
     * @return mixed|null
     */
    private function getFieldValue($item, $field)
    {
        $fieldParts = explode('.', $field);

        foreach ($fieldParts as $part) {
            if (is_object($item)) {
                $item = $item->$part;
            } elseif (is_array($item)) {
                $item = $item[$part];
            } else {
                return null;
            }
        }
        return $item;
    }
}
