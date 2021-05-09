<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Member;
use Validator;
use PDF;
use Excel;
use Maatwebsite\Excel\Concerns\FromCollection;

class CRUDController extends Controller
{
    //
    function index()
    {
    	$data = Member::paginate(3);

    	return view('index',['members'=>$data]);
    }
    function add()
    {
    	return view('add');
    }
    function insertData(Request $request)
    {
    	$member = new Member;
    	$validator = Validator::make($request->all(),[
              'name'=>'required',
              'email'=>'required|email|unique:members',
              'address'=>'required',
              'mobile'=>'required',
              'myfile'=>'required',
              'country'=>'required',
          ]);

	    if(!$validator->passes())
	    {
	        return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
	    }
	    else
	    {

	    	$member->name = $request->name;
	    	$member->email = $request->email;
	    	$member->address = $request->address;
	    	$member->mobile = $request->mobile;
	    	$member->profile = $request->file('myfile')->store('');
	    	$member->country = $request->country;
	    	if($member->save())
	    	{
	    		return  json_encode(array('status'=>'success'));
	    	}
	    	else
	    	{
	    		 return json_encode(array('status'=>'error'));
	    	}
	    }
    }

    function delete($member_id)
    {
    	$member_id = Member::find($member_id);
    	if($member_id->delete())
    	{
    		echo json_encode(array('status'=>'success'));
    	}
    	else
    	{
    		echo json_encode(array('status'=>'error'));
    	}
    }

   	function edit($member_id)
   	{
   		return  Member::find($member_id);
   		
   	}

    function updateData(Request $request)
    {
    	$member = new Member;
    	$validator = Validator::make($request->all(),[
              'name'=>'required',
              'address'=>'required',
              'mobile'=>'required',
              'country'=>'required',
          ]);

	    if(!$validator->passes())
	    {
	        return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
	    }
	    else
	    {
	    	$result = DB::table('members')->
	    	where('id',$request->id)->
	    	update([
	    		"name"=>$request->name,
	    		"address"=>$request->address,
	    		"mobile"=>$request->mobile,
	    		"country"=>$request->country,
		   	]);
	    	if($result == 1)
	    	{
	    		echo json_encode(array('status'=>'success'));
	    		return redirect('index');
	    	}
	    	else
	    	{
	    		 echo json_encode(array('status'=>'error'));
	    		 return redirect('index');
	    	}
    	}
	}

  function downloadPDF(Request $request)
  {
      $data =  Member::all();
      if($request->input('download_pdf'))
      {
        $pdf = PDF::loadView('myPDF',['members'=>$data]);
        return $pdf->download('Member.pdf');  
      }
      else
      {
        return Excel::download(new excelDownload,'Member.xlsx');
      }
      
      
  }    
  	
}

class excelDownload implements FromCollection
{
  public function collection()
  {
    return $users = DB::table('members')
            ->select('name','email','mobile','address')
            ->get();
  }

}