<?php

namespace App\Http\Controllers\admin;

use  Auth;
use App\Category;
use  App\Product;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Validator;
class AdminController extends Controller
{

        /* controller for category  */

       function users(){
           $user=User::get();
        return view('admin.user.index',compact('user'));

       }

       public function changeStatus(Request $request)
    {
        //dd($request->all());
        $user = User::find($request->user_id);
        $user->status = $request->status;
       $user->save();

        return response()->json(['success'=>'Status change successfully.']);
    }

    function category(){
        $category=Category::get();
        return view('admin.category.index',compact('category'));
    }

    function addCategory(){
        $category=Category::where('id', 'id')->get();
        return view('admin.category.add',compact('category'));
    }


    function saveCategory(Request $request){
        //dd($request->all());
        $validator = Validator::make($request->all(),[
            'name'=>'required|max:255',
            'status'=>'required',
        ]);

        if($validator->passes()){
            //Insert record in db
            $category = new Category;
            $category->name = $request->name;
            $category->status = $request->status;
            $category->save();

            $request->session()->flash('msg', 'Category saved successfuly');
            return redirect('category');
        }
        else{
            return redirect('category')->withErrors($validator)->withInput();
            //return with error
        }

    }     


    function editCategory(Request $request){

        $categories = Category::where('id', $request->id)->first();
        $category=Category::get();
        if(!$category){
            $request->session()->flash('errorMsg','Record not found.');
            return redirect('category');
        }
        return view('admin.category.cat-edit',compact('categories','category','request'));
    }

    function updateCategory(Request $request){


        $validator = Validator::make($request->all(),[
            'category_id'=>'required',
            'name'=>'required',
            'status'=>'required'
        ]);

       // if($validator->passes()){
           // dd('dddd');
            //Insert record in db
            $category = Category::find($request->category_id);

            $category->name = $request->name;
            $category->status = $request->status;
            $category->save();

            $request->session()->flash('msg', 'Category updated successfuly');
            return redirect('category');
      //  }
       // else{
      //      return redirect('category');
            //return with error
        }


        function deleteCategory($id, Request $request){

            //Fetch a record from database
            $category = category::where('id', $id)->first();
            if(!$category){
                $request->session()->flash('errorMsg','Record not found.');
                return redirect('category');
            }
            category::where('id', $id)->delete();
            $request->session()->flash('msg','Category has been deleted successfully.');
                  return redirect('category');
        }





       /*  controller for products  */


    function product(){

       $product=Product::select('products.name as product_name',
       'categories.name as category_name',
       'products.id as product_id','products.price',
       'products.status','products.image')->
       leftjoin('categories', 'products.category_id', '=', 'categories.id')
       
       ->get();


     return view('admin.product.index',compact('product'));

    }


    function addProduct(){
        $category=Category::where('status','1')->get();
      return view('admin.product.add',compact('category'));

      
     }


    function saveProduct(Request $request){
       // dd($request->all());
      // dd($request);
        $validator = Validator::make($request->all(),[
            'category_id'=>'required',
            'name'=>'required|max:255',
            'price'=>'required',
            'status'=>'required',
        ]);

        if($validator->passes()){
            //Insert record in db
            $file = $request->file('image') ;

            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/image/' ;
            $file->move($destinationPath,$fileName);

            $product = new Product;
            $product->category_id=$request->category_id;
            $product->name=$request->name;
            $product->price=$request->price;
            $product->image=$fileName;
            $product->status = $request->status;
            $product->save();

            $request->session()->flash('msg', 'Product saved successfully');
            return redirect('products');
        }
        else{
            return redirect('product/add')->withErrors($validator)->withInput();
            //return with error
        }

    }

    function editProduct(Request $request){
        $category=Category::where('status','1')->get();
        $products = product::where('id',  $request->id)->first();

        return view('admin.product.edit')->with(compact('products','category', 'request'));
    }

    function updateProduct(Request $request){
       //dd($request);

        $validator = Validator::make($request->all(),[
            'category_id'=>'required',
            'name'=>'required',
           'price'=>'required',
            'status'=>'required'
        ]);
            if($validator->passes()){


            $products = Product::find($request->product_id);
            $products->category_id = $request->get('category_id');
            $products->name = $request->get('name');
            $products->price = $request->get('price');
            $products->status = $request->get('status');
            $products->save();

            $request->session()->flash('msg', 'Product updated successfuly');
            return redirect('products');
        }
    }


    function deleteProduct($id, Request $request){

        //Fetch a record from database
        $product = product::where('id', $id)->first();
        if(!$product){
            $request->session()->flash('errorMsg','Record not found.');
            return redirect('products');
        }
        $product->delete();
        $request->session()->flash('msg','Product has been deleted successfully.');
              return redirect('products');
    }
    
}








