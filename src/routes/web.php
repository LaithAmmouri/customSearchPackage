<?php

Route::group(['namespace' => 'Mawdoo3\Search\Http\Controllers'],function (){
    Route::get('search', 'SearchController@index')->name('search');
    Route::post('search', 'SearchController@searchTopic');
    Route::post('save', 'SearchController@save')->name('save');
    Route::get('get_saved_results', 'SearchController@getSavedResults')->name('get_saved_results');
    Route::get('delete/{id}', 'SearchController@delete')->name('delete');
    Route::post('update', 'SearchController@update')->name('update');
});


