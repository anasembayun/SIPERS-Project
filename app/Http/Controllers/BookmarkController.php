<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;
use App\Bookmark;
use file;
use Image;

class BookmarkController extends Controller
{
    /**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();

		$this->middleware('auth');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$bookmark = Bookmark::where('user_id', \Auth::user()->id)
			->orderBy('created_at', 'desc')->paginate(10);
		
		$this->data['bookmark'] = $bookmark;

		return $this->loadTheme('bookmark.index', $this->data);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request request params
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$request->validate(
			[
				'seo_book' => 'required',
			]
		);

		$buku = Buku::where('buku_seo', $request->get('seo_book'))->firstOrFail();
		
		$bookmark = Bookmark::where('user_id', \Auth::user()->id)
			->where('buku_id', $buku->id)
			->first();
		if ($bookmark) {
			return response('Buku sudah ada di Bookmark Anda!', 422);
		}

		Bookmark::create(
			[
				'user_id' => \Auth::user()->id,
				'buku_id' => $buku->id,
			]
		);

		return response('Buku berhasil ditambahkan ke Bookmark', 200);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param int $id favorite id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$bookmark = Bookmark::findOrFail($id);
		$bookmark->delete();

		\Session::flash('success', 'buku berhasil di hapus dari bookmark');
		
		return redirect('bookmark');
	}
}
