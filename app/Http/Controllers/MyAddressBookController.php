<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MyAddressBook;
use App\User;
use App\UserRole;
use App\Position;
use App\UserStatus;
use Illuminate\Support\Facades\Input;
use Redirect;
use Session;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MyAddressBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $user;
    public function __construct(User $user)
    {

        $this->user = $user;

    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (MyAddressBook::where('user_id', '=', Input::get('user'))->count()>0)
        {

            $addressbook_owner          = Auth::user()->id;
            $contactBook                = MyAddressBook::where('user_id', Input::get('user'))->where('addressbook_owner',$addressbook_owner);
            $contactBook                                ->update(['isfavourite'=>1]);
            \Session::flash('success', $this->user->name.' '.$this->user->surname.' has been  added to your Private Book Address');
            return Redirect::to('/addressbookList/'.Auth::user()->id);
        }
        else
            {

                $addressbook = new MyAddressBook();
                $addressbook->addressbook_owner = \Auth::user()->id;
                $addressbook->user_id = $request['user'];
                $addressbook->isfavourite = 1;
                $addressbook->save();
                \Session::flash('success', $this->user->name.' '.$this->user->surname.' has been  added to your Private Book Address');
                return Redirect::to('/addressbookList/'.Auth::user()->id);
            }

    }
    public function getProfilePerUser($id)
    {

        $users = User::orderBy('name')->get();
        $contactBook  = MyAddressBook::with('user')->select('user_id')->where('addressbook_owner',$id)->where('isfavourite',1)->orderBy('user_id')->get();
//
        $userOrder = User::orderBy('name')->first();
        return view('addressbook.test')
            ->with(compact('contactBook'))
            ->with(compact('users'))
            ->with(compact('userOrder'));
//            ->with(compact('contactBookOrder'));

    }

    public function userprofileGlobal($id)
    {
        $user  = User::select('name','surname','email','cellphone','id','profile_picture')->where('id',$id)->first();
        return response()->json($user);

    }

    public function userprofilePrivate($id)
    {

        $contactBook  = MyAddressBook::with('user')->select('user_id')->where('user_id',$id)->first();
        return response()->json($contactBook);

    }


    public function deleteuser($id)
    {

        $addressbook_owner          = Auth::user()->id;
        $contactBook                = MyAddressBook::where('user_id',$id)->where('addressbook_owner',$addressbook_owner);
        $contactBook                                ->update(['isfavourite'=>0]);

        \Session::flash('success', $this->user->name.' '.$this->user->surname.' has been  removed from your Private Book Address');
        return Auth::user()->id;



    }
   }
