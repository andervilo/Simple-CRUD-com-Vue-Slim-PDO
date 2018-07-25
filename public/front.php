<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div id="app" class="container">
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#novoModal"><b>+ Novo</b></button>
            </div>            
        </div><br>
        <table class="table table-striped table-sm">
            <thead class="thead-light">
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Endereço</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="prof in professores">
                    <td>{{prof.id}}</td>
                    <td>{{prof.nome}}</td>
                    <td>{{prof.telefone}}</td>
                    <td>{{prof.endereco}}</td>
                    <td>
                        <button type="button" class="btn btn-warning  btn-sm" @click="editarProf(prof)">Editar</button>
                        <button class="btn btn-danger btn-sm" @click="deleteProf(prof)" >Excluir</button>
                    </td>
                </tr>
            </tbody>
        </table>
        
        <!-- Modal -->
        <div class="modal fade" id="novoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-if="mostraBtnSalvar" id="exampleModalLabel">Adicionar Professor</h5>
                        <h5 class="modal-title" v-else id="exampleModalLabel">Editar Professor</h5>
                        <button type="button" class="close" @click="cancelar()" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      
                        <form>
                            <input type="hidden" v-model="professor.id" name="id">
                            <div class="form-group">
                                <label for="nome"><b>Nome</b></label>
                                <input type="text" v-model="professor.nome" class="form-control" id="nome"  placeholder="Nome">
                            </div>
                            <div class="form-group">
                                <label for="endereco"><b>Endereço</b></label>
                                <input type="text" v-model="professor.endereco" class="form-control" id="endereco"  placeholder="Endereço">
                            </div>
                            <div class="form-group">
                                <label for="telefone"><b>Telefone</b></label>
                                <input type="text" v-model="professor.telefone" class="form-control" id="telefone"  placeholder="Telefone">
                            </div>
                        </form>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" v-show="mostraBtnLimpar" class="btn btn-warning" @click="limpar()">Limpar</button>
                        <button type="button" class="btn btn-secondary" @click="cancelar()" data-dismiss="modal">Cancelar</button>
                        <button type="button" v-show="mostraBtnSalvar" class="btn btn-primary" @click="novoProf()">Salvar</button>
                        <button type="button" v-show="mostraBtnAlterar" class="btn btn-primary" @click="storeProf()">Salvar</button>
                    </div>
                </div>
            </div>
        </div>

     </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="assets/js/vue.js" ></script>
    <script src="assets/js/axios.js" ></script>
    <script src="assets/js/app.js" ></script>

  </body>
</html>