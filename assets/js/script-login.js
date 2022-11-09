// const e função quase a mesma coisa 
//ES6+ , async await , callback
const validaLogin = () =>{
     //JS Vanilla outra forma de fazer
    //document.getElementById('email').val()

    //Cria variavel email
    //$ significa JQuery 
    // let email = $('#email').val()
    // let senha = $('#senha').val()

    //cria um novo formulario de dados, capturando chave e valor do form(todos os inputs de dentro do form-login)
    let dados = new FormData($('#form-login')[0]) 

    //exibe msg no console do navegador , usado para debug da aplicação,verificação de erro.
    //console.log(email)
    //console.log(senha)

    //requestPHP

    const result = fetch('backend/validaLogin.php',{
        method : 'POST',
        body : dados
    })

    .then((response) => response.json())
    .then((result)=> {
        //aqui é tratado o retorno ao front

        if(result.retorno == 'erro'){
            Swal.fire({
                icon: 'error',
                title: 'Atenção...',
                text: result.mensagem
              })
        }else{
            window.location = "admin/"

        }

        // result.retorno == 'ok' ? window.location.replace("http://localhost/sistema-escola/paginaInicial.php") : ''

    })
    

}
//final da funçao de add usuario



