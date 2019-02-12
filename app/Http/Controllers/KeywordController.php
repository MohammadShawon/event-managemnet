<?php

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

class KeywordController extends Controller
{
    private $moduleId = 20;

    public function __construct() {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        OwnLibrary::validateAccess($this->moduleId,1);

        $name = Input::get('name');

        $targetArr = \App\keywords::with(array('Category' => function ($media) {
            $media->select(array('name', 'id'));
        }))->orderBy('id');

        if (!empty($name)) {
            $targetArr = $targetArr->where('name', 'LIKE', '%' . $name . '%');
        }
        if(auth()->user()->role_id==9 || auth()->user()->role_id==8){

        $data['targetArr'] = $targetArr->get();

        }else{

        $data['targetArr'] = $targetArr->paginate(trans('english.PAGINATION_COUNT'));

        }

        return View::make('keywords.index', $data);
    }

    public function filter() {
        $name = Input::get('name');
        return Redirect::to('keywords?name=' . $name);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        OwnLibrary::validateAccess($this->moduleId, 2);
        $data['category_id']=\App\User::where('id',Auth::user()->id)->first();
        $data['categories']= \App\Category::where('status_id',1)->where('parent_id',0)->get();
        $data['categoryList']= \App\Category::where('status_id',1)->where('parent_id',0)->pluck('name','id');
        return view('keywords.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        OwnLibrary::validateAccess($this->moduleId, 2);

        $this->validate($request, [
            'category_id' => 'required',
            'name' => 'required',
            'status_id' => 'required',

        ]);
        $target = New \App\keywords();
        $target->name = $request->name;
        $target->category_id = $request->category_id;
        $target->status_id =$request->status_id;

        if ($target->save()) {
            Session::flash('success', trans('english.DATA_UPDATED_SUCESSFULLY'));
            return Redirect::to('keywords');
        } else {
            Session::flash('error', trans('english.DATA_COULD_NOT_BE_UPDATED'));
            return Redirect::to('keywords/create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        OwnLibrary::validateAccess($this->moduleId, 3);
        $data['category_id']=\App\User::where('id',Auth::user()->id)->first();
        $data['categories']= \App\Category::where('status_id',1)->where('parent_id',0)->get();
        $data['categoryList']= \App\Category::where('status_id',1)->where('parent_id',0)->pluck('name','id');
        $target = \App\keywords::find($id);
        return View::make('keywords.edit',$data)->with(compact('target'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        OwnLibrary::validateAccess($this->moduleId, 3);

        $this->validate($request, [
            'category_id' => 'required',
            'name' => 'required',
            'status_id' => 'required',

        ]);
        $target = \App\keywords::find($id);
        $target->name = $request->name;
        $target->category_id = $request->category_id;
        $target->status_id =$request->status_id;

        if ($target->save()) {
            Session::flash('success', trans('english.DATA_UPDATED_SUCESSFULLY'));
            return Redirect::to('keywords');
        } else {
            Session::flash('error', trans('english.DATA_COULD_NOT_BE_UPDATED'));
            return Redirect::to('keywords/'.$id.'/edit');
        }
    }

    public function active($id, $param = null) {

        if ($param !== null) {
            $url = 'keywords?' . $param;
        } else {
            $url = 'keywords';
        }
        $target = \App\keywords::find($id);

        if (empty($target)) {
            return View::make('404');
        }

        if ($target->status_id == '1') {
            $target->status_id = 0;
            $msg_text = $target->name . trans('english.SUCCESSFULLY_INACTIVATE');
        } else {
            $target->status_id = 1;
            $msg_text = $target->name . trans('english.SUCCESSFULLY_ACTIVATE');
        }
        $target->save();
        // redirect
        Session::flash('success', $msg_text);
        return Redirect::to($url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function destroy($id)
    {
        OwnLibrary::validateAccess($this->moduleId, 4);
        //check depedency here....

        $target =\App\keywords::find($id);

        if ($target->delete()) {
            Session::flash('error', trans('english.DATA_DELETED_SUCCESSFULLY'));
        } else {
            Session::flash('error', trans('english.DATA_COULD_NOT_BE_DELETED'));
        }
        return Redirect::to('keywords');
    }

}
