<?php

use App\Models\Post;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Facades\Route;
use League\CommonMark\Extension\FrontMatter\Data\LibYamlFrontMatterParser;
use Spatie\Backtrace\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Symfony\Component\Yaml\Yaml;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('posts', [
        'posts' => Post::all()
    ]);
});

Route::get('posts/{post}', function ($slug) {
    return view('post', [
        'post' => Post::findorfail($slug)
    ]);
})
