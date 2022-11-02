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

    let dados = new FormData($('form-professores'))

    const result = fetch('../backend/addUsuarios.php',{
    method:'POST',
    body:dados})
    .then((response) => response.json())
    .then((result) => {
        //aqui sera o retorno dos dados do backend
        
})

}






