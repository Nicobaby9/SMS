<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\{Book, BookCategory};

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::paginate(10);

        return view('admin.book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = BookCategory::all();

        return view('admin.book.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'publish_date' => 'required',
            'language' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pages' => 'required',
            'code' => 'required|unique:books',
            'status' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('/storage/books');
            $file->move($destinationPath, $filename);
            $insert['image'] = "$filename";

            $book = Book::create([
                'category_id' => $request->category_id,
                'title' => $request->title,
                'author' => $request->author,
                'publisher' => $request->publisher,
                'publish_date' => $request->publish_date,
                'language' => $request->language,
                'pages' => $request->pages,
                'code' => $request->code,
                'status' => $request->status,
                'image' => $filename,
            ]);

            return redirect(route('books.index'))->with(['success' => 'Data was successfully created.']);
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);
        $categories = BookCategory::all();

        return view('admin.book.show', compact('book', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('/storage/books');
            $file->move($destinationPath, $filename);
            $insert['image'] = "$filename";

            $book = Book::findOrFail($id);

            $book->update([
                'category_id' => $request->category_id,
                'title' => $request->title,
                'author' => $request->author,
                'publisher' => $request->publisher,
                'publish_date' => $request->publish_date,
                'language' => $request->language,
                'pages' => $request->pages,
                'code' => $request->code,
                'status' => $request->status,
                'image' => $filename,
            ]);

            $a = File::delete($destinationPath . $book->photo); 

            return redirect(route('books.index'))->with(['success' => 'Data was successfully updated.']);
        }else {
            $book = Book::findOrFail($id);

            $book->update([
                'category_id' => $request->category_id,
                'title' => $request->title,
                'author' => $request->author,
                'publisher' => $request->publisher,
                'publish_date' => $request->publish_date,
                'language' => $request->language,
                'pages' => $request->pages,
                'code' => $request->code,
                'status' => $request->status,
            ]);

            return redirect(route('books.index'))->with(['success' => 'Data was successfully updated.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        $book->delete();

        return redirect(route('books.index'))->with(['success' => 'Data was successfully deleted.']);
    }
}
