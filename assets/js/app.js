$(document).ready(function(){

    var app = new Vue({
        el: '#app',
        data: {
            professores: [],
            professor:{
                id: '',
                nome: '',
                telefone: '',
                endereco: ''
            },
            mostraBtnLimpar:true,
            mostraBtnSalvar:true,
            mostraBtnAlterar:false,
            
        },
        methods:{
            getAll:function (){
                axios.get("/api/professor/")
                .then(response => {
                    this.professores = response.data
                    console.log(this.professores);
                })
                .catch(e => {
                    console.log(e)
                });
            },
            deleteProf:function(prof){
                if(!confirm("Deseja excluir este item?")) return;
                axios.delete("/api/professor/"+prof.id)
                .then(response => {
                    console.log(response.data);
                    alert(response.data);
                    this.getAll();
                })
                .catch(e => {
                    console.log(e)
                });
            },
            novoProf:function(){
                axios.post("/api/professor/",this.professor)
                .then(response => {
                    console.log(response.data);
                    alert(response.data);
                    this.limpar();
                    $('#novoModal').modal('hide');
                    this.getAll();
                })
                .catch(e => {
                    console.log(e);
                });
            },
            limpar:function(){
                this.professor.id = '';
                this.professor.nome = '';
                this.professor.telefone = '';
                this.professor.endereco = '';                
            },
            editarProf:function(prof){
                this.mostraBtnLimpar = false; 
                this.mostraBtnSalvar = false;
                this.mostraBtnAlterar = true;
                axios.get("/api/professor/"+prof.id)
                .then(response => {
                    this.professor = response.data
                    console.log(this.professor);
                    $('#novoModal').modal('show');
                })
                .catch(e => {
                    console.log(e)
                });     
            },
            storeProf:function(){
                axios.put("/api/professor/",this.professor)
                .then(response => {
                    console.log(response.data);
                    alert(response.data);
                    this.limpar();
                    $('#novoModal').modal('hide');
                    this.getAll();
                })
                .catch(e => {
                    console.log(e);
                });
            },
            cancelar:function(prof){
                this.mostraBtnLimpar = true; 
                this.mostraBtnSalvar = true;
                this.mostraBtnAlterar = false;     
            }
      },
      created:function(){
          this.getAll()
      }

    })

});
