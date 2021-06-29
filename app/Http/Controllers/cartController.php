<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Book;
use App\Models\Category;
use App\Models\Author;
use App\Models\orders;
use App\Models\book_orders;
use Cart;
use Exception;

class cartController extends Controller
{
    //
    public function index()
    {
        $allcategory = Category::all();
        $dataCart = Cart::content();
        $top3Author = Author::orderBy('publishedBooks', 'desc')->limit(3)->get();
        return view('template.cart')->with(compact('dataCart'))->with(compact('allcategory'))->with(compact('top3Author'));
    }
    public function addItem($id)
    {
        $idBook = '';
        $nameBook = '';
        $priceBook = '';
        $linkImage = '';
        $bookItem = DB::table('book')->where('idBook', $id)->get();
        foreach ($bookItem as $item) {
            $idBook = $item->idBook;
            $nameBook = $item->nameBook;
            $priceBook = $item->price;
            $linkImage = $item->image;
        }
        $data = Cart::add([
            'id' => $idBook,
            'name' => $nameBook,
            'qty' => 1,
            'price' => $priceBook,
            'weight' => 0,
            'options' => [
                'img' => $linkImage,
            ]
        ]);
        if ($data) {
            return back()->with('success', 'You added book in cart successfull.');
        }
    }
    public function removeItem($id)
    {
        Cart::remove($id);
        return back()->with('success', 'You deleted sucessfull');
    }
    public function inceaseItem($id)
    {
        $data = Cart::get($id);
        $inQty = $data->qty + 1;
        Cart::update($id, $inQty);
        return back();
    }
    public function deceaseItem($id)
    {
        $data = Cart::get($id);
        $deQty = $data->qty - 1;
        Cart::update($id, $deQty);
        return back();
    }
    //Checkout 
    public function checkout()
    {
        orders::createOrder();
        $allcategory = Category::all();
        $dataCart = Cart::content();
        $top3Author = Author::orderBy('publishedBooks', 'desc')->limit(3)->get();
        return view('template.checkout')->with(compact('dataCart'))->with(compact('allcategory'))->with(compact('top3Author'));
    }
    //history
    public function  historycart()
    {
        $user = auth()->user();
        // $order = DB::select('select * from orders where user_id = ?', [$user->id]);
        $order = DB::table('orders')->where('user_id', 'like', $user->id)->orderBy('created_at', 'desc')->paginate(5);
        $count = DB::table('orders')->where('user_id', [$user->id])->count();
        $allcategory = Category::all();
        $top3Author = Author::orderBy('publishedBooks', 'desc')->limit(3)->get();
        return view('template.historycart')->with(compact('allcategory'))->with(compact('top3Author'))->with(compact('order'))->with(compact('count'));
    }
    //history detail
    public function  historydetail($id)
    {
        $book = new Book;
        $dataDetail = DB::select('select  book_orders.id, book_orders.orders_id, book_orders.qty, book_orders.total, book.image, book.price, book.nameBook,book.idBook FROM book_orders, 
        book where book_orders.book_id= book.idBook AND book_orders.orders_id=?', [$id]);
        $allcategory = Category::all();
        $top3Author = Author::orderBy('publishedBooks', 'desc')->limit(3)->get();
        return view('template.historydetail')->with(compact('allcategory'))->with(compact('top3Author'))->with(compact('dataDetail'))->with(compact('book'));
    }
    //Managa carts
    public function manageCarts()
    {
        $orders = DB::table('orders')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->orderBy('created_at', 'desc')
            ->select('orders.*', 'orders.user_id', 'users.email')
            ->paginate(5);
        return view('manage.manageCart')->with(compact('orders'));
    }
    //detail order
    public function detailOrder($id)
    {
        $orders = DB::table('book_orders')
            ->join('book', 'book_orders.book_id', '=', 'book.idBook')
            ->join('orders', 'book_orders.orders_id', '=', 'orders.id')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->where('book_orders.orders_id', $id)
            ->select(
                'book_orders.*',
                'book.image',
                'book.nameBook',
                'book.idBook',
                'book.price',
                'users.name',
                'users.address',
                'users.phone',
                'users.email',
                'orders.created_at',
                'orders.status',
                'orders.total'
            )
            ->get();
        return view('manage.detailOrder')->with(compact('orders'));
    }
    //update status order
    public function updateorder(Request $req)
    {
        $orders = orders::find($req->id);
        $orders->status = $req->status;
        try {
            $orders->save();
            return back()->with('success', 'You updated status this order successfull');
        } catch (Exception $exception) {
            return back()->with('error', 'Phone number already exists');
        }
    }
    //update status order for user
    public function updateorderuser(Request $req)
    {
        $orders = orders::find($req->idO);
        $orders->status = 'Canceled';
        $orders->save();
        return back()->with('success', 'You have successfully canceled this order');
    }
    //search order id
    public function searchOrders(Request $request)
    {
        $search = $request->input('idCart');
        $orders = DB::table('orders')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->orderBy('created_at', 'desc')
            ->select('orders.*', 'orders.user_id', 'users.email')
            ->where('orders.id', 'like', $search)
            ->paginate(5);

        $count = DB::table('orders')->where('id', 'like', $search)->count();

        return view('manage.searchIdOrder')->with(compact('orders'))->with(compact('count'));
    }
    //sort 
    public function sortByPending(Request $request)
    {
        $orders = DB::table('orders')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->orderBy('created_at', 'desc')
            ->select('orders.*', 'orders.user_id', 'users.email')
            ->where('orders.status', 'like', 'pending')
            ->paginate(5);



        return view('manage.sortByPending')->with(compact('orders'));
    }
    public function sortByTrasport(Request $request)
    {
        $search = $request->input('idCart');
        $orders = DB::table('orders')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->orderBy('created_at', 'desc')
            ->select('orders.*', 'orders.user_id', 'users.email')
            ->where('orders.status', 'like', 'Transpoting')
            ->paginate(5);

        return view('manage.sortByTrasport')->with(compact('orders'));
    }
    public function sortByConfirm(Request $request)
    {
        $search = $request->input('idCart');
        $orders = DB::table('orders')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->orderBy('created_at', 'desc')
            ->select('orders.*', 'orders.user_id', 'users.email')
            ->where('orders.status', 'like', 'Confirmed')
            ->paginate(5);


        return view('manage.sortByConfirm')->with(compact('orders'));
    }
    public function sortByCancel(Request $request)
    {
        $search = $request->input('idCart');
        $orders = DB::table('orders')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->orderBy('created_at', 'desc')
            ->select('orders.*', 'orders.user_id', 'users.email')
            ->where('orders.status', 'like', 'Canceled')
            ->paginate(5);


        return view('manage.sortByCancel')->with(compact('orders'));
    }
}
