//scripts executados ao carregar a pagina

$(document).ready(function () {
    $('#cpf').inputmask('999.999.999-99')
    $('#telefone').inputmask('(99)99999-9999')
    $('#cep').inputmask('99999-999')

    //executa a funçao listaTipo ()
    listaTipo();
});




const consultaCEP = () => {
    //captura o valor do cep via jquery
    let cep = $('#cep').val()

    //replace para tirar o _ e o - da mascara
    cep = cep.replaceAll("_","").replaceAll("-","")

    //verifica se o CEP foi preenchido com todos os numeros
    if(cep.length < 8 ){
            Swal.fire({
                icon: 'error',
                title: 'Atenção...',
                text: 'CEP inválido!!'
            })
            $('#cep').focus()
            return
    }

    //realiza requisiçao para API VIA CEP
    const result = fetch(`http://viacep.com.br/ws/${cep}/json/`)
        .then((response) => response.json())
        .then((result) => {

            if (result.erro) {
                Swal.fire({
                    icon: 'error',
                    title: 'Atenção...',
                    text: 'CEP nao encontrado!!'
                })
            } else {
                //retorno da aquisição
                $('#rua').val(result.logradouro)
                $('#bairro').val(result.bairro)
                $('#cidade').val(result.localidade)
                $('#estado').val(result.uf)

                //coloca o focus do usuario no campo numero
                $('#numero').focus()
            };

        })

}



const listaTipo = () =>{
    //funçao que lista os tipos para o cadastro
    //dados da tabela tb_tipos

    const result = fetch('../backend/listaTipo.php')
        .then((response) => response.json())
        .then((result) => {
            //aqui sera o retorno dos dados do backend
            //monta no select os options com os tipos da tabela

            result.map((tipo)=>{
                $('#tipo').append(` 
                    <option value="${tipo.id}">${tipo.tipo}</option>
                    `)
            })

        })
}


const addUsuarios = () =>{

    let dados = new FormData($('#form-professores')[0])

    const result = fetch('../backend/addUsuarios.php',{
    method:'POST',
    body:dados})
    .then((response) => response.json())
    .then((result) => {
        //aqui sera o retorno dos dados do backend
        
        if (result.retorno == 'ok') {
            Swal.fire({
                icon: 'success',
                title: 'Sucesso!',
                text: result.mensagem,
    });

            $('#form-professores')[0].reset()
    }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Atenção...',
                    text: result.mensagem,
        });

    }

});

};


// funçao que exibe a aba cadastro e oculta a aba listagem
const abaCadastro = () => {
    // oculta a div de listagem
    $('#div-listagem').hide()

    // exibe a div de cadastro
    $('#form-professores').show()
}

// funçao que exibe a aba cadastro e oculta a aba cadastro
const abaListagem = () => {
    $('#form-professores').hide()

    // exibe a div de listagem
    $('#div-listagem').show()
}

const pesquisarUsuario = () => {
    // validação campo pesquisar vazio

    let pesquisar = $('#pesquisar').val()

    if (pesquisar == '') {
        Swal.fire({
            icon: 'error',
            title: 'Atenção!',
            text: 'Digite um nome ou CPF para pesquisar!'
        });
        return
    }

    dados = new FormData($('#form-listagem')[0])

    result = fetch('../backend/pesquisarUsuario.php',{
        method: 'POST',
        body: dados
    })
    .then((response)=>response.json())
    .then((result)=>{
        // aqui iremos exibir os dados encontrados na pesquisa na tela
        $('#resultado-listagem').html(`
        
        <div id="tabela-listagem">


        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>CPF</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody id="dados-tabela-listagem">
                
            </tbody>
        </table>
    </div>
        `)

        if(result.length == 0){
            $('#dados-tabela-listagem').append(`
            <tr>
            <td colspan="5">Nenhum dado foi encontrado!</td>
            </tr>
            `)
        }else{
            result.map((usuario)=>{
            $('#dados-tabela-listagem').append(`
            <tr>
                <td>${usuario.nome}</td>
                <td>${usuario.email}</td>
                <td>${usuario.telefone}</td>
                <td>${usuario.cpf}</td>
            </tr>
            `)
        })//fecha o map

        }//fecha o else

    })//fecha o result

}//fecha a funçao






