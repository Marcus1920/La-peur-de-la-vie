<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\AddressBookRequest;
use App\Http\Controllers\Controller;
use App\addressbook;
use Redirect;
use Session;

class AddressBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function AddressbookList()
    {
        return view('addressbook.index');
    }

    public function index($id)
    {
        $addresses = addressbook::select(
                                            array(
                                                    'id',
                                                    'first_name',
                                                    'surname',
                                                    'cellphone',
                                                    'email',
                                                    'created_at'
                                                ))->where('user','=',$id);
        return \Datatables::of($addresses)
                            ->addColumn('actions',''
                                       )
                            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('addressbook.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */

    public function store(Request $request)
    {
        $addressbook                 = new addressbook();
        $addressbook->user           = $request['user'];
        $addressbook->first_name     = $request['first_name'];
        $addressbook->Surname        = $request['Surname'];
        $addressbook->email          = $request['email'];
        $addressbook->cellphone      = $request['cellphone'];
        $addressbook->created_by     = \Auth::user()->id;
        $addressbook->relationship   = '';
        $addressbook->active         = 1;
        $addressbook->save();

        \Session::flash('success', $addressbook->first_name.' '.$addressbook->surname.' has been  added to your Private Book Address');
        return Redirect::to('/addressbookList/'.Auth::user()->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show()
    {

        $searchString = \Input::get('q');
        $addressbookContacts     = \DB::table('addressbook')
                        ->where('user','=',\Auth::user()->id)
                        ->whereRaw("CONCAT(`first_name`, ' ', `surname`, ' ', `email`) LIKE '%{$searchString}%'")
                        ->select(\DB::raw('*'))
                        ->get();

        $data = array();

        if(count($addressbookContacts) > 0)
        {

           foreach ($addressbookContacts as $addressbookContact) {
           $data[]= array("name"=>"{$addressbookContact->first_name} {$addressbookContact->surname} <{$addressbookContact->email}","id" =>"{$addressbookContact->email}","first_name" =>"{$addressbookContact->first_name}","surname" =>"{$addressbookContact->surname}","cellphone" =>"{$addressbookContact->cellphone}","email" => "{$addressbookContact->email}","userId" => "{$addressbookContact->id}","addressbook" => "1");
           }


        }

         $usersContacts   = \DB::table('users')
                            ->join('positions','users.position','=','positions.id')
                            ->whereRaw("CONCAT(`users`.`name`, ' ', `users`.`surname`, ' ', `users`.`email`,`positions`.`name`) LIKE '%{$searchString}%'")
                            ->select(array('users.id','users.name as name','users.surname as surname','users.email as username','users.cellphone as cellphone','positions.name as position'))
                            ->get();



        if(count($usersContacts) > 0)

        {

           foreach ($usersContacts as $usersContact) {
           $data[] = array("name"=>"{$usersContact->name} {$usersContact->surname} << {$usersContact->position}","id" =>"{$usersContact->username}","first_name" => "{$usersContact->name}","surname" => "{$usersContact->surname}","cellphone" => "{$usersContact->cellphone}","email" => "{$usersContact->username}","userId" => "{$usersContact->id}","addressbook" => "0");
           }

        }

        return $data;

    }

    public function getAddressBookUsers()
    {
        $searchString   = \Input::get('q');
        $users          = \DB::table('addressbook')

            ->where('addressbook.user', '=', \Auth::user()->id)
            ->whereRaw(
                "CONCAT(`addressbook`.`first_name`, ' ', `addressbook`.`surname`) LIKE '%{$searchString}%'")
            ->select(
                array

                (
                    'addressbook.id as id',
                    'addressbook.first_name as first_name',
                    'addressbook.surname as surname',
                    'addressbook.email as email',
                )
            )

            ->get();

        $data = array();

        foreach ($users as $user) {

            $data[] = array(

                "name"              => "{$user->first_name} > {$user->surname}",
                "id"                => "{$user->id}",
            );
        }

        return $data;
    }

    public function getProfilePerUser($id)
    {

        $users = User::all();
        $contactBook  = addressbook::where('created_by',$id)->get();
        return view('addressbook.test')
            ->with(compact('contactBook'))
            ->with(compact('users'));

    }


    public function userprofileGlobal($id)
    {
        $user  = User::select('name','surname','email','cellphone','id')->where('id',$id)->first();
        return response()->json($user);


    }

    public function userprofilePrivate($id)
    {

        $contactBook  = addressbook::select('first_name','surname','email','cellphone','user')->where('user',$id)->first();
        return response()->json($contactBook);

    }


    public function deleteuser($id)
    {
        $created_by= Auth::user()->id;
        $contactBook  = addressbook::where('created_by',$created_by)
            ->where('user',$id);

        $contactBook->delete();
        return Redirect::to('/addressbookList/'.Auth::user()->id);

    }

    public  function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
