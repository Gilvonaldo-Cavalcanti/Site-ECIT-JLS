<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Autenticacao extends Controller
{
    public function MostrarFormReg(){ // Colocar como controller de perms root/prof
        session_start();

        if(isset($_SESSION['user_is_staff']) && isset($_SESSION['user_logged_in'])){
            return view('authentication.registro');
        }else{
            // Acredito que pode-se utilizar tambem das paginas padroes do apache em um outro momento.
            // Usando view provavelmente temporaria!
            http_response_code(401);
            return view('unauthorized');
            exit;
        }
    }

    public function MostrarFormLogin(){
        session_start();

        if(!isset($_SESSION['user_logged_in']))
            return view('authentication.login');
        else
            return redirect()->route("dashboard");
    }
    
    public function Registro(Request $request){
        try{
            $dados_user = $request->validate([
                'nome' => "required|string|min:6|max:255",
                'email' => "required|email|max:255",
                'senha' => "required|string|min:6|max:128",
            ]);
        }catch (\Illuminate\Validation\ValidationException $excep){
            return redirect('registro')->withErrors($excep->errors());
        }
        $userclass = $request['classe'];
        
        $sessao = mysqli_connect("localhost", "root", "", "site_jls");
        if(!$sessao){
            die("Erro tentando se conectar ao bando de dados!: ".mysqli_connect_error());
        }
        mysqli_report(MYSQLI_REPORT_OFF);

        // Realiza uma busca pelo email repassado (único) no banco de dados.
        $req = $sessao->prepare("SELECT * FROM users WHERE email = ?");
        $req->bind_param("s", $dados_user['email']);
        $req->execute();
        $resultado = $req->get_result();
 
        if($resultado->num_rows > 0){
            return view('authentication.registro')->with('flag_indv', "Endereço e-mail já anteriormente utilizado. Tente novamente com um novo!");
        }

        $senha_hash = password_hash($dados_user['senha'], PASSWORD_DEFAULT);

        // Realiza a insercao dos dados repassados para dentro do bando de dados.
        $req = $sessao->prepare("INSERT INTO users (nome, email, senha, classe_id)  VALUES (?, ?, ?, ?)");
        $req->bind_param("sssi", $dados_user['nome'], $dados_user['email'], $senha_hash, $userclass);
        $resultado = $req->execute();

        if($resultado){
            session_start();
            $_SESSION['user_logged_in'] = true;

            if($userclass == 3){ // Indentifica como administrador.
                $_SESSION['user_is_staff'] = true;
                $_SESSION['user_is_administrator'] = true;   
            }
            else if($userclass == 2){ // Indentifica como funcionario (professor).
                $_SESSION['user_is_staff'] = true;
            }

            return view('authentication.registro')->with('flag_indv', "Usuário criado com sucesso!");     
        }else{
            return view('authentication.registro')->with('flag_indv', "Erro inesperado, tente novamente!");
        }

        $request->close();
        mysqli_close($sessao);
    }

    public function Login(Request $request){
        try{
            $dados_user = $request->validate([
                'email' => "required|email|min:6|max:255",
                 'senha' => "required|string|min:6|max:128",
            ]);
        }catch(\Illuminate\Validation\ValidationException $excep){
              return redirect('login')->withErrors($excep->errors());
        }
        
        $sessao = mysqli_connect("localhost", "root", "", "site_jls");
        if(!$sessao){
            die("Erro tentando se conectar ao bando de dados!: ".mysqli_connect_error());
        }
        mysqli_report(MYSQLI_REPORT_OFF);

        $dadosfetch = $sessao->prepare("SELECT * FROM users WHERE email = ?");
        $dadosfetch->bind_param("s", $dados_user['email']);
        $dadosfetch->execute();
        $resultado = $dadosfetch->get_result();

        if($resultado->num_rows > 0){
            $user = $resultado->fetch_assoc();
            
            if(password_verify($dados_user['senha'], $user['senha'])){
                session_start();
                $_SESSION['user_logged_in'] = true;
                
                if($user['classe_id'] == 3){ // Indentifica como administrador.
                    $_SESSION['user_is_staff'] = true;
                    $_SESSION['user_is_administrator'] = true;
                }
                else if($user['classe_id'] == 2){ // Indentifica como funcionario (professor).
                    $_SESSION['user_is_staff'] = true;
                }

                return redirect()->route('dashboard');
            }else{
                return view('authentication.login')->with('flag_indv', "Senha incorreta, tente novamente!");
            }
        }else{
            return view('authentication.login')->with('flag_indv', "Endereço e-mail não encontrado, certifique-se de que o campo foi preenchido corretamente!");
        }

        $datafetch->close();
        mysqli_close($sessao);
    }

    public function Logout(){
        session_start();

        if(isset($_SESSION["user_logged_in"])){
            session_unset();

            return redirect()->route('home');
        }
    }
}
