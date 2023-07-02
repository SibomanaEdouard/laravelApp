<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserSignUpController extends Controller
{
  
   // This method is used to store the users and their items
    public function store(Request $request)
    {
        $validateData = $request->validate([
            "firstname" => "required",
            "lastname" => "required",
            "email" => "required|email",
            "password" => "required",
            "phone" => "required",
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('images', 'public');
            $imageUrl = asset('storage/' . $imagePath);
        }
//this is to check if the use already exist in the database 
$emailExist=User::where('email',$validateData['email'])->exists();
$phoneExist=User::where("phone",$validateData['phone'])->exists();
if($emailExist){
    return redirect()->back()->withInput()->with('error',"Email is already used in our system, Please Login or use new email to sign up  ");
}
if($phoneExist){
    return redirect()->back()->withInput()->with('error',"Phone number is already used in our system, Please Login or use new phone number to sign up  ");  
}

        $user = new User();
        $user->firstname = $validateData['firstname'];
        $user->lastname = $validateData['lastname'];
        $user->email = $validateData['email'];
        $user->password = $validateData['password'];
        $user->phone = $validateData['phone'];
        $user->image_url = $imageUrl ?? null;

        $savedNewUser = $user->save();
        if ($savedNewUser) {
            @$request->session()->flash("success", "The account was created successfully! Login To continue!!");
            return redirect('/');
        } else {
            return redirect()->back()->with("error", "Something went wrong. Please check the email and phone then try again");
        }
    }

    //this is to make authantication and authorization
    public function loginUser(Request $request){
        $validateLogin=$request->validate([
           "email"=>"required|email",
           "password"=>"required"
        ]);

        //let me check if in the database there is any person with credentials
   $credentials=$request->only('email' , 'password');   
        if(Auth::attempt($credentials)){
        $request->session()->flash("success", "Logged successfully!");
        return redirect('/information');

        }
   else{
   
       return  redirect()->back()->withInput()->with("error","Invalid email or password");
       
   }
       }

  //this to retrieve data from  database 
    public function show(Request $request)
    {
if (Auth::check()) {
    $user = Auth::user();
    return view('information',compact('user'));
} else {

    return redirect()->back()->with('error','Sorry , something went wrong! Please Try again latter');
}
    }

    public function updateForm(Request $request)
{
    if (Auth::check()) {
        $user = Auth::user();
        return view('update', compact('user'));
    } else {
$request->session()->flash('error','Sorry, something went wrong ! Please try again later');
        return redirect()->back();
    }
}

//this is the function to update the user
    public function update(Request $request)
{
    $validateData = $request->validate([
        "firstname" => "required",
        "lastname" => "required",
        "email" => "required|email",
        "password" => "required",
        "phone" => "required",
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $user = Auth::user();
    $user->firstname = $validateData['firstname'];
    $user->lastname = $validateData['lastname'];
    $user->email = $validateData['email'];
    $user->password = $validateData['password'];
    $user->phone = $validateData['phone'];

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imagePath = $image->store('images', 'public');
        $imageUrl = asset('storage/' . $imagePath);
        $user->image_url = $imageUrl;
    }

    $savedUser = $user->save();

    if ($savedUser) {
        $request->session()->flash("success", "The account was updated successfully");
        return redirect('/information');
    } else {
        $request->session()->flash('error', "Something went wrong. Please try again.");
        return redirect()->back();
       
    }
}


// this is to delete the user from the system
    public function destroy(Request $request)
    {
        if(Auth::check()){
$user=Auth::user();
$user->delete();
$request->session()->flash('success','you have been deleted successfully');
return response()->json(['success' => true]);
        }
       else{
        $request->session()->flash('error','Failed to delete the user , please Try again later');
        return redirect()->back();
       }
    }
}
