<?php
namespace App\Http\Controllers\Admin;
use Mail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Newsletter;

class Newsletters extends Controller
{

    public function index(Request $request)
    {
		$subscribers = Newsletter::where('nl_status',1)->orderBy('nl_email', 'asc')->get();
		return view('admin.newsletters.index',compact('subscribers'));
    }
	
	public function send(Request $request)
    {
		$customAttributes = array(
						'subscribers' => 'Subscribers',
						'mail_subject' => 'Subject',
						'mail_content' => 'Email Content'
						);
						
		$this->validate($request,[
				'subscribers' => 'required',
				'mail_subject' => 'required|max:255',
				'mail_content' => 'required|max:255',
			],[],$customAttributes);
		
		$data 			= $request->all();
		$subscribers 	= Newsletter::whereIn('id',$data['subscribers'])->get(['nl_email']);
		$to_emails		= array();
		foreach($subscribers as $subscriber){
			$to_emails[] = $subscriber->nl_email;
		}
		
		$file 			= $request->file('attachment');
		if(!empty($file)){
			$file_path 	= $file->getPathName();
		} else {
			$file_path 	= '';
		}
		

		Mail::raw($data['mail_content'], function($message) use ($to_emails,$data,$file_path)
		{    
			$message->from('admin@schoolnet.com', 'School Network');
			$message->to($to_emails);
			$message->subject($data['mail_subject']);
			if(!empty($file_path)){
				$message->attach($file_path);
			}
		});
		
    }

}