<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;
class authorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $author = new Author;
        // $data = $author->all();
        $data = $author->paginate(6);
        return view('manage.manageAuthor')->with(compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataAuthor = new Author;
        $authors = $dataAuthor->all();
        return view('manage.createAuthor')
        ->with(compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $author = new Author;
        $author->nameAuthor = $request->nameAuthor;
        $author->publishedBooks = $request->publishedBooks;
        $author->Description = $request->authorDes;
        $author->facebook = $request->facebook;
        $author->Twitter = $request->twitter;
        //Xu ly upload
        $request->validate([
            'authorPhoto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
            //xu ly va upload anh
        $imageName = $request->authorPhoto->getClientOriginalName();
        $request->authorPhoto->move(public_path('images').'/author', $imageName);
        $author->image = $imageName;
        $author->save();
        session()->flash('success', 'add Success!!!');  
        return redirect()->route('author.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataAuthor = new Author;
        $author = $dataAuthor->where('id',$id)->first();
        return view('manage.updateAuthor')
        ->with(compact('author'));
    }
    // search
    public function search(Request $request)
    {
        $author = new Author;
        $data = $author->where('nameAuthor','like','%'.$request->nameAuthor.'%')->get();
        return view('manage.searchAuthor')
        ->with(compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'authorPhoto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // //xu ly va upload anh
        $imageName = $request->authorPhoto->getClientOriginalName();
        $request->authorPhoto->move(public_path('images').'/author', $imageName);

        $author = new Author;
        $author->where('id',$id)->update([
            'publishedBooks' => $request->publishedBooks,
            'nameAuthor' => $request->nameAuthor,
            'Description' => $request->authorDes,
            'image' => $imageName,
            'facebook' => $request->facebook,
            'Twitter' => $request->twitter                         
        ]);       
        session()->flash('success', 'Update Success!!!');  
        return redirect()->route('author.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author = new Author;
        $author->where('id','=',$id)->delete();

        $book = new Book;
        $dataBook = $book->where('idAuthor',$id)->get();
        foreach ($dataBook as $book1) 
        {
           $book1->where('idAuthor',$id)->delete();
        }
        session()->flash('success', 'Delete Success!!!');  
        return redirect()->route('author.index');
    }
}
