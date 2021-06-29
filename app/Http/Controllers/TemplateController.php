<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use App\Models\rating;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\RelationNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TemplateController extends Controller
{
    public function index()
    {
        $data = DB::table('book')
            ->join('author', 'book.idAuthor', '=', 'author.id')
            ->select('book.*', 'author.nameAuthor')
            ->limit(9)
            ->get();
        $data1 = Book::orderBy('rate', 'desc')->limit(3)->get();
        $bookList = DB::table('book')
            ->orderBy('salePrice', 'desc')
            ->join('author', 'book.idAuthor', '=', 'author.id')
            ->select('book.*', 'author.nameAuthor')
            ->limit(5)
            ->get();
        $temp1 = new Category;
        $temp = new Author;
        $featureArrayBook = DB::table('book')
            ->orderBy('price')
            ->join('author', 'book.idAuthor', '=', 'author.id')
            ->select('book.*', 'author.nameAuthor')
            ->limit(4)
            ->get();
        $countAdventure = DB::table('book')
            ->join('category', 'book.idCategory', '=', 'category.id')
            ->where('category.id', 'like', '1')
            ->count();
        $countStudy = DB::table('book')
            ->join('category', 'book.idCategory', '=', 'category.id')
            ->where('category.id', 'like', '2')
            ->count();
        $countProramming = DB::table('book')
            ->join('category', 'book.idCategory', '=', 'category.id')
            ->where('category.id', 'like', '3')
            ->count();
        $countRomance = DB::table('book')
            ->join('category', 'book.idCategory', '=', 'category.id')
            ->where('category.id', 'like', '4')
            ->count();
        $allcategory = Category::all();

        $threenewstbook = DB::table('book')
            ->orderBy('created_at', 'desc')
            ->join('author', 'book.idAuthor', '=', 'author.id')
            ->select('book.*', 'author.nameAuthor')
            ->limit(3)
            ->get();
        $top3Author = Author::orderBy('publishedBooks', 'desc')->limit(3)->get();
        return view('template.index')->with(compact('data'))->with(compact('data1'))
            ->with(compact('allcategory'))->with(compact('temp1'))->with(compact('temp'))
            ->with(compact('threenewstbook'))->with(compact('featureArrayBook'))->with(compact('top3Author'))->with(compact('bookList'))
            ->with(compact('countAdventure'))->with(compact('countStudy'))->with(compact('countProramming'))->with(compact('countRomance'));
    }
    public function contactus()
    {
        $category = new Category;
        $allcategory = Category::all();
        $top3Author = Author::orderBy('publishedBooks', 'desc')->limit(3)->get();
        //return

        return view('email')->with(compact('category'))->with(compact('allcategory'))->with(compact('top3Author'));
    }


    public function r404error()
    {

        //return

        return view('template.404error');
    }
    public function r405footer()
    {

        //return

        return view('template.405footer');
    }
    public function aboutus()
    {
        $allcategory = Category::all();
        $top3Author = Author::orderBy('publishedBooks', 'desc')->limit(3)->get();
        //return

        $category = new Category;
        return view('template.aboutus')->with(compact('category'))->with(compact('allcategory'))->with(compact('top3Author'));
    }
    public function authors()
    {
        $category = new Category;
        $allcategory = Category::all();
        $temp1 = new Author;
        $allAuthor =  DB::table('author')
        ->limit(4)
        ->paginate(5);
        $bookOfAuthor = new Book;
        $top3Author = Author::orderBy('publishedBooks', 'desc')->limit(3)->get();
        //return



        return view('template.authors')->with(compact('allAuthor'))->with(compact('bookOfAuthor'))->with(compact('category'))->with(compact('allcategory'))->with(compact('top3Author'));
    }
    //authordetail
    public function authordetail()
    {
        $temp = new Author;
        $book = new Book;
        $temp1 = new Category;
        $top3Author = Author::orderBy('publishedBooks', 'desc')->limit(3)->get();
        //return

        $allcategory = $temp1->all();
        //return

        return view('template.authordetail')->with(compact('temp'))->with(compact('book'))->with(compact('temp1'))->with(compact('allcategory'))->with(compact('top3Author'));
    }
    public function book_detail()
    {
        $temp = new Author;
        $book = new Book;
        $temp1 = new Category;
        $allcategory = $temp1->all(); //
        $top3Author = Author::orderBy('publishedBooks', 'desc')->limit(3)->get();
        // $review = rating::all();
        $review =  DB::table('ratings')
        ->orderBy('created_at', 'desc')
        ->join('users', 'ratings.idUser', '=', 'users.id')
        ->select('ratings.*', 'users.name')
        ->get();
        $bookData = $book->all();
        //return
        return view('template.book_detail')->with(compact('review'))->with(compact('temp'))->with(compact('book'))->with(compact('temp1'))->with(compact('bookData'))->with(compact('allcategory'))->with(compact('top3Author'));
    }
    public function category($id)
    {
        //Count data
        $countAdventure = DB::table('book')
            ->join('category', 'book.idCategory', '=', 'category.id')
            ->where('category.id', 'like', '1')
            ->count();
        $countStudy = DB::table('book')
            ->join('category', 'book.idCategory', '=', 'category.id')
            ->where('category.id', 'like', '2')
            ->count();
        $countProramming = DB::table('book')
            ->join('category', 'book.idCategory', '=', 'category.id')
            ->where('category.id', 'like', '3')
            ->count();
        $countRomance = DB::table('book')
            ->join('category', 'book.idCategory', '=', 'category.id')
            ->where('category.id', 'like', '4')
            ->count();
        $countComedy = DB::table('book')
            ->join('category', 'book.idCategory', '=', 'category.id')
            ->where('category.id', 'like', '5')
            ->count();
        $countAll = DB::table('book')
            ->join('category', 'book.idCategory', '=', 'category.id')
            ->count();
        //
        $book = DB::table('book')
            ->join('author', 'book.idAuthor', '=', 'author.id')
            ->select('book.*', 'author.nameAuthor')
            ->paginate(5);
        $temp = new Author;
        $temp1 = new Category;

        $allcategory = $temp1->all();
        $allBook = DB::table('book')
            ->join('author', 'book.idAuthor', '=', 'author.id')
            ->join('category', 'book.idCategory', '=', 'category.id')
            ->select('book.*', 'author.nameAuthor')
            ->where('category.id', 'like', $id)
            ->paginate(5);
        $top3Author = Author::orderBy('publishedBooks', 'desc')->limit(3)->get();
        //return

        return view('template.category_book')->with(compact('allBook'))->with(compact('temp'))->with(compact('book'))->with(compact('temp1'))->with(compact('allcategory'))->with(compact('top3Author'))
            ->with(compact('countAdventure'))->with(compact('countStudy'))->with(compact('countProramming'))->with(compact('countRomance'))->with(compact('countComedy'))->with(compact('countAll'));
    }

    public function category_book()
    {
        return view('template.category_book');
    }


    //KHI NAO MA USER RATE LAN DAU THI VAO STORE BANG LENH FINDORFAIL
    public function store(Request $request)
    {
        $user = auth()->user();
        if (!isset($user)) {
            return back()->with('warning', 'You must to login before comment this book');
        } else { 
            $idUser = $user->id;
            $rate = new rating;
            $rate->idUser = $idUser;
            $rate->idBook = $request->idBook;
            $rate->rate = $request->star;
            $rate->comment = $request->comment;
            try {
                $rate->save();
                return back()->with('success', 'Thank you your comment');
            } catch (Exception $exception) {
                return back()->with('error', 'You must rating before comment this book');
            }
        }
    }
    //getAUth
    public function getAuth()
    {
        $role = Auth::user()->role;
        $checkemail = Auth::user()->email_verified_at;
        if ($checkemail == '') {
            return redirect()->route('dashboard');
        } else {
            if ($role == '1') {
                return redirect()->route('book.index');
            } else {
                return redirect()->route('template.index');
            }
        }
    }
    //Search
    public function new_book(Request $request)
    {
        //Count data
        $countAdventure = DB::table('book')
            ->join('category', 'book.idCategory', '=', 'category.id')
            ->where('category.id', 'like', '1')
            ->count();
        $countStudy = DB::table('book')
            ->join('category', 'book.idCategory', '=', 'category.id')
            ->where('category.id', 'like', '2')
            ->count();
        $countProramming = DB::table('book')
            ->join('category', 'book.idCategory', '=', 'category.id')
            ->where('category.id', 'like', '3')
            ->count();
        $countRomance = DB::table('book')
            ->join('category', 'book.idCategory', '=', 'category.id')
            ->where('category.id', 'like', '4')
            ->count();
        $countComedy = DB::table('book')
            ->join('category', 'book.idCategory', '=', 'category.id')
            ->where('category.id', 'like', '5')
            ->count();
        $countAll = DB::table('book')
            ->join('category', 'book.idCategory', '=', 'category.id')
            ->count();
        //
        $allcategory = Category::all();
        $book = DB::table('book')
            ->join('author', 'book.idAuthor', '=', 'author.id')
            ->select('book.*', 'author.nameAuthor')
            ->paginate(5);
        $temp1 = new Category;
        $allcategory = $temp1->all();
        $search = $request->input('search');
        $temp = new Author;
        $data = DB::table('book')
            ->join('author', 'book.idAuthor', '=', 'author.id')
            ->where('book.nameBook', 'like', '%' . $search . '%')
            ->orWhere('book.description', 'like', '%' . $search . '%')
            ->orWhere('author.nameAuthor', 'like', '%' . $search . '%')
            ->select('book.*', 'author.nameAuthor')
            ->paginate(5);
        $top3Author = Author::orderBy('publishedBooks', 'desc')->limit(3)->get();
        return view('template.search')->with(compact('book'))->with(compact('allcategory'))->with(compact('data'))->with(compact('temp'))->with(compact('top3Author'))
            ->with(compact('countAdventure'))->with(compact('countStudy'))->with(compact('countProramming'))->with(compact('countRomance'))->with(compact('countComedy'))->with(compact('countAll'));
    }
    //Search
    public function topSell(Request $request)
    {
        //Count data
        $countAdventure = DB::table('book')
            ->join('category', 'book.idCategory', '=', 'category.id')
            ->where('category.id', 'like', '1')
            ->count();
        $countStudy = DB::table('book')
            ->join('category', 'book.idCategory', '=', 'category.id')
            ->where('category.id', 'like', '2')
            ->count();
        $countProramming = DB::table('book')
            ->join('category', 'book.idCategory', '=', 'category.id')
            ->where('category.id', 'like', '3')
            ->count();
        $countRomance = DB::table('book')
            ->join('category', 'book.idCategory', '=', 'category.id')
            ->where('category.id', 'like', '4')
            ->count();
        $countComedy = DB::table('book')
            ->join('category', 'book.idCategory', '=', 'category.id')
            ->where('category.id', 'like', '5')
            ->count();
        $countAll = DB::table('book')
            ->join('category', 'book.idCategory', '=', 'category.id')
            ->count();
        //
        $allcategory = Category::all();
        $book = DB::table('book')
            ->join('author', 'book.idAuthor', '=', 'author.id')
            ->select('book.*', 'author.nameAuthor')
            ->paginate(5);
        $temp1 = new Category;
        $allcategory = $temp1->all();
        $search = $request->input('search');
        $temp = new Author;
        $allBook = DB::table('book')
            ->join('author', 'book.idAuthor', '=', 'author.id')
            ->where('book.nameBook', 'like', '%' . $search . '%')
            ->orWhere('book.description', 'like', '%' . $search . '%')
            ->orWhere('author.nameAuthor', 'like', '%' . $search . '%')
            ->select('book.*', 'author.nameAuthor')
            ->orderBy('SoldBooks', 'desc')
            ->paginate(5);
        $top3Author = Author::orderBy('publishedBooks', 'desc')->limit(3)->get();
        return view('template.topSell')->with(compact('book'))->with(compact('allcategory'))->with(compact('allBook'))->with(compact('temp'))->with(compact('top3Author'))
            ->with(compact('countAdventure'))->with(compact('countStudy'))->with(compact('countProramming'))->with(compact('countRomance'))->with(compact('countComedy'))->with(compact('countAll'));
    }
    //logout
    public function logoutUser()
    {
        Auth::logout();
        return redirect()->route('template.index');
    }
    //profile
    public function profileUser($id)
    {
        $category = new Category;
        $allcategory = Category::all();
        $top3Author = Author::orderBy('publishedBooks', 'desc')->limit(3)->get();
        $data = User::find($id);
        //return
        return view('template.profile')->with(compact('category'))->with(compact('allcategory'))->with(compact('top3Author'))->with(compact('data'));
    }
    public function updateProfile(Request $req)
    {
        $data = User::find($req->id);
        $data->name = $req->name;
        $data->email = $req->email;
        $data->phone = $req->phone;
        $data->address = $req->address;
        try {
            $data->save();
            return back()->with('success', 'You updated infomation successfull');
        } catch (Exception $exception) {
            return back()->with('error', 'Phone number already exists');
        }
    }
}
