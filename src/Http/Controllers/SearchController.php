<?php

namespace Mawdoo3\Search\Http\Controllers;

use \Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Mawdoo3\Search\Models\SavedResults;

class SearchController extends Controller
{
    public function index()
    {
        return view('search::search');
    }

    public function searchTopic(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'topic' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json(
                [
                    'status' => 'failure',
                    'data' => [
                        'errors' => $validator->errors()
                    ],
                ],
                400
            );
        }

        $topic = $request->get('topic');
        $configurations = config('sp_mawdoo3_laravel.google_custom_search_api');
        $results = json_decode(file_get_contents('https://www.googleapis.com/customsearch/v1?key=' . $configurations['api_key']
            . '&cx=' . $configurations['engine_id'] . '&q=' . $request->get('topic')), true)['items'];


        foreach($results as $key => $result) {
            $searchData[$key] = [
                'title' => $result['title'],
                'link' => $result['link'],
                'description' => $result['snippet'],
            ];
        }

        return view('search::search_results')->with(compact('searchData', 'topic'));
    }

    public function save(Request $request)
    {
        $data = $request->all()['data'];

        foreach($data as $key => $datum) {
            if(array_key_exists('should_save', $datum)) {
                SavedResults::create([
                    'title' => $datum['title'],
                    'description' => $datum['description'],
                    'link' => $datum['link'],
                    'comment' => $datum['comment']
                ]);
            }
        }

        return redirect()->route('get_saved_results');
    }

    public static function getSavedResults()
    {
        $savedResults = SavedResults::all()->toArray();

        return view('search::saved_results')->with(compact('savedResults'));
    }

    public function delete($id)
    {
        if(SavedResults::where('id', $id)->delete()) {
            return redirect()->route('get_saved_results');
        }

        return response()->json(
            [
                'status' => 'failure',
                'message' => 'failed to delete record'
            ],
            400
        );
    }

    public function update(Request $request)
    {
        if(SavedResults::where('id', $request->get('id'))->update(['comment' => $request->get('comment')])) {
            return redirect()->route('get_saved_results');
        }

        return response()->json(
            [
                'status' => 'failure',
                'message' => 'failed to update record'
            ],
            400
        );
    }
}
