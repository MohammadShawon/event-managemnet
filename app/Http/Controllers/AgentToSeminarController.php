<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AgentToSeminar;
use App\User;
use App\SeminarManagement;
use Illuminate\Support\Facades\Auth;
use Session;
use View;
use Input;
use Illuminate\Support\Facades\Redirect;
use OwnLibrary;
use Illuminate\Support\Facades\Validator;
use DB;

class AgentToSeminarController extends Controller {

    private $moduleId = 38;

    public function __construct() {

    }

   public function index(Request $request) {
       OwnLibrary::validateAccess($this->moduleId,1);

        $agentUser = User::select('first_name','last_name','id')
					       ->where('role_id','=',9)
					       ->where('status_id','=',1)
					       ->get();

		$events = \App\EventManagement::select('title','id','status')
					       ->where('status','=',1)
					       ->get();

	    $activeEventId = \App\EventManagement::where('status','=',1)->value('id');

		$seminars = SeminarManagement::select('title','id')
					       ->where('event_id','=',$activeEventId)
					       ->get();


       return View::make('users.agent-to-seminar')->with(compact('agentUser','events','seminars'));
    }

    public function postAgentToSeminer(Request $request) {
    \OwnLibrary::validateAccess($this->moduleId,2);

    $this->middleware('csrf', array('on' => 'post'));

    $v = Validator::make($request->all(), [
           'agent_id' => 'required',
            'event_id' => 'required',
            'seminar_id' => 'required'
            //'first_name' => 'required|array',
   
        ],
        $messages = [
                    'agent_id.required' => 'The Agent field is required',
                    'event_id.required' => 'The Event field is required',
                    'seminar_id.required' => 'The Seminar field is required'
                    ]
    );

        if ($v->fails()) {
            return redirect('agent-to-seminer')->withErrors($v->errors())->withInput();
        }else {

        	$ifexist = AgentToSeminar::where('agent_id','=',$request->agent_id)->get();

        	if(count($ifexist)>0 && $ifexist[0]->agent_id==$request->agent_id){

        		$update = AgentToSeminar::find($ifexist[0]->id);

                $update->agent_id   = $request->agent_id;
                $update->event_id   = $request->event_id;
                $update->seminar_id = $request->seminar_id;

                if($update->save()){
                	Session::flash('success', Input::get('name') . trans('english.HAS_BEEN_CREATED_SUCESSFULLY'));
                    return Redirect::to('agent-to-seminer');
                }else{
                	Session::flash('error', 'Seminar to assing to agent');
                    return Redirect::to('agent-to-seminer');
                }
        	}else{
        		$agnToSeminar = new AgentToSeminar;

                $agnToSeminar->agent_id   = $request->agent_id;
                $agnToSeminar->event_id   = $request->event_id;
                $agnToSeminar->seminar_id = $request->seminar_id;

                if($agnToSeminar->save()){
                	Session::flash('success', Input::get('name') . trans('english.HAS_BEEN_CREATED_SUCESSFULLY'));
                    return Redirect::to('agent-to-seminer');
                }else{
                	Session::flash('error', 'Seminar to assing to agent');
                    return Redirect::to('agent-to-seminer');
                }
        	}
                	
        }

    }

    public function agentPresentSeminer(Request $request){
    	
    	$AgentToSeminar = AgentToSeminar::where('agent_id','=',$request->agentId)->get();
    	// $AgentToSeminar = AgentToSeminar::find($request->agentId);
    	// return json_encode($AgentToSeminar);
    	return $AgentToSeminar;
    }

}

?>