<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('userinfo');
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
        //
        $user =User::create($request->all());
        $user->save();

        return redirect('search');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function info(Request $request){ 

        //dd($request->ajax());
            if ($request->ajax()) {
                $output = '';
                $query = $request->get('query');
                //dd($query);
                if ($query != '') {
                    $data = DB::table('users')
                    ->where('status', 'like', '%' . $query . '%')
                    ->orWhere('firstName', 'like', '%' . $query . '%')
                        
                        ->orderBy('id', 'asc')
                        ->get();
                } else {
                    $data = DB::table('users')
                    ->orderBy('id', 'asc')
                        ->get();
                }
                $total_row = $data->count();
                if ($total_row > 0) {
                    foreach ($data as $row) {
                        $output .= '
        <tr>
         <td>' . $row->id . '</td>
         <td>' . $row->firstName . '</td>
         <td>' . $row->lastName . '</td>
         <td>' . $row->status . '</td>
         
        </tr>
        ';
                    }
                } else {
                    $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
                }
                $data = array(
                    'table_data'  => $output,
                    'total_data'  => $total_row
                );

                echo json_encode($data);
            }
        
    }

}
