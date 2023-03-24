<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $contacts= Contact::paginate(10);
        // $contacts= Contact::All();
        return view('admin.contact.list',compact('contacts'));
        
    }
    public function create(){
        return view('admin.contact.create');
    }
    // -------------------------------------------------------------------------------------------------------------------
    public function store(Request $request){
        // <!-- neu khong dien ten se bao loi -->
            $this->validate($request,
                [
                    'name'=>'required',
                    'address'=>'required',
                    'phone'=>'required',
                    'subject'=>'required',
                    'message'=>'required',
                ]
            );
            Contact::create([
                'name'=> $request->name,
                'address'=> $request->address,
                'phone'=> $request->phone,
                'subject'=> $request->subject,
                'message'=> $request->message,
            ]);
            return redirect()->route('admin.contact.index')->with('success','create successfully');
        }
// -------------------------------------------------------------------------------------------------------------------
    public function edit($id){
        $contact=Contact::find($id);
        return view('admin.contact.edit',compact('contact'));

    }
// -------------------------------------------------------------------------------------------------------------------
    public function update(Request $request,$id){
        $this->validate($request,
            [
                'name'=>'required',
                'address'=>'required',
                'phone'=>'required',
                'subject'=>'required',
                'message'=>'required',
            ]
        );

        $contact=Contact::find($id);
        $contact->update([
            'name'=>$request->name,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'subject'=>$request->subject,
            'message'=>$request->message,
            
        ]);

        return redirect()->route('admin.contact.index',$id)->with('success','Update contact successfully');
    }
// -------------------------------------------------------------------------------------------------------------------
    public function delete($id){
        Contact::where('id',$id)->delete();
        return redirect()->route('admin.contact.index')->with('success','Delete contact successfully');
    }
}
