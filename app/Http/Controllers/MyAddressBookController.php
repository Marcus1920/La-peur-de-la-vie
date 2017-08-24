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
use App\Message;

class MyAddressBookController extends Controller
{
    private $user;
    public function __construct(User $user)
    {

        $this->user = $user;

    }

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
        $contactBook  = MyAddressBook::with('user')->where('addressbook_owner',$id)
            ->where('isfavourite',1)->orderBy('user_id')->get();

        $userOrder = User::orderBy('name')->first();
        return view('addressbook.view')
            ->with(compact('contactBook'))
            ->with(compact('users'))
            ->with(compact('userOrder'));
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

    public function addToPrivate(Request $request)
    {
        $contacts = $request->all();
        foreach ($contacts as $contact) {
            for ($i = 0; $i < count($contact); $i++)
            {
                $addressbook                        = new MyAddressBook();
                $addressbook->user_id               =$contact[$i];
                $addressbook->addressbook_owner     =Auth::user()->id;
                $addressbook->isfavourite           = 1;
                $addressbook->save();
            }
        }
        \Session::flash('success',' contacts has been  added to your Private Book Address');
        return Redirect::to('/addressbookList/'.Auth::user()->id);
    }

    public function getEmail($id)
    {
        $data = User::select('email')->where('id',$id)->first();
        return $data;

    }


    public function emails($email)
    {
        return view('addressbook.emails',compact('email'));
    }

    public function multipleEmailsFromPrivate($email)
    {
        return view('addressbook.multipleEmailRecipients',compact('email'));
    }

    public function sendAddressBookMessage(Request $request)
    {

        $user = User::where('email',$request->email)->first();

        $caseMessage = new Message();
        $caseMessage->from = $request['uid'];

        if ($user != NULL) {
            $caseMessage->to = $user->id;
        } else {
            $caseMessage->to = $request['Recepient'];
        }
        $caseMessage->online = 0;
        $caseMessage->case_id = '';
        $caseMessage->message = $request['msg'];
        $caseMessage->subject = $request['msgSubject'];
        $caseMessage->active = 1;
        $caseMessage->save();

        $data = array(
            'name' => $user->first_name,
            //     'caseID' => $request['caseID'],
            'sender' => \Auth::user()->name . ' ' . \Auth::user()->surname,
            'msg' => $request['msg'],
        );

        \Mail::send('emails.addressbook.privateEmail', $data, function ($message) use ($user) {
            $message->from('info@siyaleader.net', 'Siyaleader');
            $message->to($user->email)->subject("Siyaleader Notification - New Private Message: ");

        });

        \Session::flash('success',' message has been sent');
        return Redirect::to('/addressbookList/'.Auth::user()->id);
    }

    public function sendMultipleMessages(Request $request)
    {
        if($request['email']!=NULL)
        {
            $emails=explode(",",$request->email);

            $users = array();

            for($i=0 ; $i < count($emails) ; $i++)
            {

                $user = User::where('email',($emails[$i]),'=')->get();
                array_push($users, $user);
            };
//
            for($i = 0; $i < count($users); $i++)
            {
                $user = $users[$i][0];
                $data = array(
                    'name'        =>$user->name,
                    'caseID'      =>'',
                    'sender'      =>\Auth::user()->name.' '.\Auth::user()->surname,
                    'msg'         =>$request['msg'],
                );


                $caseMessage           = new Message();
                $caseMessage->from     = $request['uid'];
                $caseMessage->to       = $user->name;
                $caseMessage->online   = 0;
                $caseMessage->case_id  = '';
                $caseMessage->message  = $request['msg'];
                $caseMessage->subject  = $request['msgSubject'];
                $caseMessage->active   = 1;
                $caseMessage->save();


                \Mail::send('emails.addressbook.privateEmail',$data, function($message) use ($user)
                {
                    $message->from('info@siyaleader.net', 'Siyaleader');
                    $message->to($user->email)->subject("Siyaleader Notification - New Private Message: ");

                });

            }

            \Session::flash('success',' your messages has been sent');
            return Redirect::to('/addressbookList/'.Auth::user()->id);
        }
    }

    public function removeFromPrivate(Request $request)
    {

        $removeContacts = $request->all();
        foreach ($removeContacts as $removeContact)
        {

            $addressbook_owner          = Auth::user()->id;
            $contactBook                = MyAddressBook::whereIn('user_id',$removeContact)->where('addressbook_owner',$addressbook_owner);
            $contactBook                                ->update(['isfavourite'=>0]);
            return Auth::user()->id;
        }

        \Session::flash('success',' contacts has been  added to your Private Book Address');
        return Redirect::to('/addressbookList/'.Auth::user()->id);


    }



    public function getEmailsFromPrivate(Request $request)
    {

        $contactIDs = $request->all();
        foreach ($contactIDs as $contactID)
        {
            $data = User::select('email')->whereIn('id',$contactID)->get();
            return $data;
        }


    }





}
