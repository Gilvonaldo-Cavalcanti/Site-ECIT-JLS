<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Autenticacao extends Controller
{
    public function MostrarFormReg(){
        return view('authentication.registro');
    }

    public function MostrarFormLogin(){
        return view('authentication.login');
    }
    
    public function Registro(Request $request){
        $dados_user = $request->validate([
            'nome' => "required|string|min:6|max:255",
            'email' => "required|email|max:255",
            'senha' => "required|string|min:6|max:128",
        ]);

        $sessao = mysqli_connect("localhost", "root", "", "site_jls"); // Todo: Adicionar função externa para ocultar 
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
            return view('authentication.registro')->with('flag', "Endereço e-mail já anteriormente utilizado. Tente novamente com um novo!");
        }

        $senha_hash = password_hash($dados_user['senha'], PASSWORD_DEFAULT);
        
        // Insere os dados repassados pelo user para dentro do banco de dados.
        $req = $sessao->prepare("INSERT INTO users (nome, email, senha) VALUES (?, ?, ?)");
        $req->bind_param("sss", $dados_user['nome'], $dados_user['email'], $senha_hash);
        $resultado = $req->execute();

        if($resultado){
            session_start();
            $_SESSION['user_logged_in'] = true;
            
            return redirect()->route('home');
        }else{
            return view('authentication.registro')->with('flag', "Erro inesperado, tente novamente!");
        }

        $request->close();
        mysqli_close($sessao);
    }

    public function Login(Request $request){
        $dados_user = $request->validate([
             'email' => "required|email|min:6|max:255",
             'senha' => "required|string|min:6|max:128",
        ]);
       
        $sessao = mysqli_connect("localhost", "root", "", "site_jls"); // Todo: Adicionar função externa para ocultar.
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

                return redirect()->route('home');
            }else{
                return view('authentication.login')->with('flag', "Senha incorreta, tente novamente!");
            }
        }else{
            return view('authentication.login')->with('flag', "Endereço e-mail não encontrado, certifique-se de que o campo foi preenchido corretamente!");
        }

        $datafetch->close();
        mysqli_close($sessao);
    }

    public function Logout(){
        session_start();

        if(isset($_SESSION["user_logged_in"])){
            unset($_SESSION["user_logged_in"]);

            return redirect()->route('home');
        }
    }
}
