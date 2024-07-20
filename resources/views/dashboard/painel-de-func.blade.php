@staff
                <div class="tab-pane fade" id="staffs-panel" role="tabpanel" aria-labelledby="staffs-panel-tab">
                    <h1 class="titulos-tabelas">Gerenciar Usuários:</h1>

                    <div class="gerenciar-users">
                        <div class="flex-container"> <!-- Separar pra cara tópico de gerenciamento? -->
                            <div class="criar-users-func">
                                <h2 class="fields-tabelas">Cadastrar</h2>

                                @if (session()->has('flag-criar-usr'))
                                    <p class="msg-aviso">{{ session('flag-criar-usr') }}</p>
                                @else
                                    @if ($errors->any())
                                        <div class="aviso_erro">
                                            @foreach($errors->all() as $error)
                                                <p class="msg-aviso">{{ $error }}</p>
                                            @endforeach
                                        </div>
                                    @endif
                                @endif

                                <form action="/dashboard/registrar" method="POST">
                                    @csrf

                                    <div class="user-back-info">
                                        <input type="radio" id="class1" name="classe" value="1" checked>
                                        <label for="class1">Aluno</label>

                                        @admin
                                            <input type="radio" id="class2" name="classe" value="2">
                                            <label for="class2">Professor</label>
                                            <input type="radio" id="class3" name="classe" value="3">
                                            <label for="class3">Administrador</label>
                                        @endadmin
                                    </div>

                                    <div class="personal-info">
                                        <input placeholder="Nome de Usuário" type="text" name="nome"><br>
                                        <input placeholder="E-mail" type="email" name="email"><br>
                                        <input placeholder="Senha" type="password" name="senha"><br>
                                    </div>

                                    <button type="submit">Cadastrar</button>
                                </form>
                            </div>

                            <div class="deletar-users-func">
                                <h2 class="fields-tabelas">Deletar Usuário</h2>

                                @if (session()->has('flag-del-usr'))
                                    <p class="msg-aviso">{{ session('flag-del-usr') }}</p>
                                @endif
                                <form action="/dashboard/deletar-user" method="POST">
                                    @csrf
                                    <input placeholder="Nome do Usuário" type="text" name="deletar-nome">
                                    <button type="submit">Deletar User</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endstaff

