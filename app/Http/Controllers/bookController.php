<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class bookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Book = new Book;
        // $databook = $Book->all();
        $databook = $Book->paginate(10);
        return view('manage.manageBook')->with(compact('databook'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataCategory = new Category;
        $categories = $dataCategory->all();
        $dataAuthor = new Author;
        $authors = $dataAuthor->all();
        return view('manage.createBook')
        ->with(compact('categories'))
        ->with(compact('authors'));
    }
    // search
    public function search(Request $request)
    {
        $book = new Book;
        $dataBook = $book->where('nameBook','like','%'.$request->nameBook.'%')->get();

        return view('manage.searchBook')
        ->with(compact('dataBook'));
    }
    public function footersearch(){
        $data = Book::all();
        $data1 = Book::orderBy('rate','desc')->limit(3)->get();
        $bookList = Book::orderBy('rate','desc')->limit(5)->get();
        $temp1= new Category;
        $temp= new Author;
        $featureArrayBook=Book::orderBy('Rate','desc')->limit(4)->get();
        $allcategory=Category::all();
        $threenewstbook = Book::orderBy('created_at','desc')->limit(3)->get();
        $top3Author=Author::orderBy('publishedBooks','desc')->limit(3)->get();
        //return

        return view ('template.405footer')->with(compact('data'))->with(compact('data1'))
        ->with(compact('allcategory'))->with(compact('temp1'))->with(compact('temp'))
        ->with(compact('threenewstbook')) ->with(compact('featureArrayBook')) ->with(compact('top3Author'))->with(compact('bookList'));

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $book = new Book;
        $book->nameBook = $request->bookName;
        $book->price = $request->bookPrice;
        $book->idAuthor = $request->author;
        $book->idCategory = $request->categories;
        $book->salePrice = $request->salePrice;
        $book->SoldBooks = $request->bookSold;
        $book->rate = $request->bookRate;
        $book->Description = $request->bookDes;
        $book->Quantity = $request->quantity;
        $book->Feature = $request->feature;
        //Xu ly upload
        $request->validate([
            'bookPhoto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
            //xu ly va upload anh
        $imageName = $request->bookPhoto->getClientOriginalName();
        $request->bookPhoto->move(public_path('images').'/books', $imageName);
        $book->image = $imageName;
        $book->save();
        session()->flash('success', 'add Success!!!');  
        return redirect()->route('book.create');
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
        $dataCategory = new Category;
        $categories = $dataCategory->all();
        $dataAuthor = new Author;
        $authors = $dataAuthor->all();

        $book = new Book;
        $oldBook = $book->where('idBook',$id)->first();
        return view('manage.updateBook')
        ->with(compact('oldBook'))
        ->with(compact('categories'))
        ->with(compact('authors'));
    }
       /**
     * Update the specified rate in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

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
            'bookPhoto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // //xu ly va upload anh
        $imageName = $request->bookPhoto->getClientOriginalName();
        $request->bookPhoto->move(public_path('images').'/books', $imageName);
        $book = new Book;
        $book->where('idBook',$id)->update([
            'nameBook' => $request->bookName,
            'idAuthor' => $request->author,
            'idCategory' => $request->categories,
            'rate' => $request->star,
            'SoldBooks' => $request->bookSold,
            'quantity' => $request->quantity,
            'feature' => $request->feature,
            'salePrice' => $request->salePrice,
            'price' => $request->bookPrice,
            'Description' => $request->bookDes,
            'image' => $imageName
        ]);
        session()->flash('success', 'Update Success!!!');  
        return redirect()->route('book.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $book = new Book;
         $book->where('idBook',$id)->delete();
         session()->flash('success', 'Delete Success!!!');  
         return redirect()->route('book.index');
    }
}
