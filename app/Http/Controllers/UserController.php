<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\UrlGenerator;
use App\User;
use Validator;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller {

    protected $url;

    public function __construct(UrlGenerator $url) {
        $this->url = $url;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $candidate = [
            'name' => $_POST['name'],
            'login' => $_POST['login'],
            'password' => Crypt::encrypt($_POST['password']),
            'email' => $_POST['email'],
        ];

        //dd($_POST);

        $answer = User::create($candidate);

        dd($answer);

    }

    /**
     * Upload Files
     * Método responsável por carregar os documentos.
     */

     public function documents(Request $request) {
        
        $validation = Validator::make($request->all(),
         [
                'select_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
         ]   
        );

        //dd($validation);

        /*if($validation->passes()) {
            die('@@@');
            $image = $request->file('select_file');
            dd($image);

        } else {
            die('####');
            return response()->json([
                'message' => $validation->errors()->all(),
                'uploaded_image' => '',
                'class_name' => 'alert-danger'
            ]);
        }*/
        
        
        dd($request->file('select_file'));
        
        //$dir = 'uploads/';
        //$filename = uniqid() . '_' . time() . '.' . $extension;
        //$request->file('file')->move($dir, $filename);


        if ($request->hasFile('image')) {
         
            $file = $request->file('image');
            //$name = $request['phone_number'] . $request['phone_number'] . '.' . $file->getClientOriginalExtension();
            //$image['filePath'] = $name;
            
            //$file->move('uploads', $name);

        } else {

            die('Error');
        }
        
        //$file = $request->file('image');

        echo "<pre>";

        print_r($file);

        dd($file);

        $result ='';
        
        $upload = $this->url->to('/upload');
        
        if($_FILES['file']['name'][0]) {

            foreach ($_FILES['file']['name'] as $key => $file) {
                
                $file_name = "{$upload}/{$_FILES['file']['name'][$key]}";
                
                if(move_uploaded_file($_FILES['file']['name'][$key],$file_name)) {
                    $result .= "<div class= 'image'><img src='{$file_name}'></div>";
                
                } else {

                    //echo $_FILES['file']['name'][$key];
                    echo $file_name;
                }
            }
        }

        echo json_encode($result);
        
        //dd($_FILES);

     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

    /**
     * Método restponsável pelo acesso ao perfil do candidato cadastro.
     */

    public function login(Request $request) {

        $login = User::where([
            ['login', '=', $_POST['login']],
            ['password', '=', Crypt::encrypt($_POST['password'])],
        ])->get();
        
        if($login && isset($login[0]->name)) {

            $request->session()->put('candidate', $login);

            return redirect('/process');

        } else {

            return redirect('/login');
        }

    }
}
