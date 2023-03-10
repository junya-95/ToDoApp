<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Carbon\Carbon;
use App\Http\Requests\CreateFolder;
use Illuminate\Http\Request;

class FolderController extends Controller
{
    public function showCreateForm()
    {
        return view('folders/create');
    }

    public function create(CreateFolder $request)
    {
        // フォルダモデルのインスタンス
        $folder = new Folder();

        // タイトルに入力値を代入
        $folder->title = $request->title;
        // インスタンスの状態をデータベースに書き込む
        $folder->save();

        return redirect()
         ->route('tasks.index')
         ->with([
            'id' => $folder->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
