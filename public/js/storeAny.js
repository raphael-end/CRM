$('#criar_venda').click( function() {

    const body = document.querySelector('#body_products_1');
    $('#body_products_1').html("");

    const nome = $('#select_cliente_1').val();
    const data_venda_1 = $('#data_venda_1').val();
    const produtos_1 = $('#produtos_1').val();
    const quant_1 = $('#quant_1').val();
    const tipo_1 = 'venda';

    $.ajax({
        url: "../storeVenda",
        type: "POST",
        datatype: "json",
        data: {
            tipo: tipo_1,
            id_cliente: nome,
            data_venda: data_venda_1,
            id_produto: produtos_1,
            quantidade: quant_1
        },
        success: function(res) {
            res.forEach(({custo, id, id_produto, nome_produto, preco, quantidade}) => {
                body.innerHTML += `
                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3">
                    <div class="flex items-center text-sm">
                        <!-- Avatar with inset shadow -->

                        <div>
                        <p class="font-semibold">${nome_produto}</p>

                        </div>
                    </div>
                    </td>
                    <td class="px-4 py-3 text-sm">
                    ${quantidade}
                    </td>
                    <td class="px-4 py-3 text-xs">
                    <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                    ${preco}
                    </span>
                    </td>
                    <td class="px-4 py-3 text-xs">
                    <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                    ${custo}
                    </span>
                    </td>

                    

                    <td class="px-4 py-3 text-sm">

                    <a href="agendamentos2?id=${id}" type="button" value="" style="background-color: #002859;" class=" border   text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-yellow-600 focus:outline-none focus:shadow-outline">
                        i
                    </a>

                    </td>
                </tr>
                `;
            })
        },
        error: function(res) {
            console.log(res);
        },
    });

});

$('#criar_venda_2').click( function() {

    const body = document.querySelector('#body-products2');
    $('#body-products2').html("");

    const nome_2 = $('#select_cliente_2').val();
    const data_venda_2 = $('#data_venda_2').val();
    const descricao = $('#descricao').val();
    const pecas = $('#pecas').val();
    const valor_total = $('#valor_total').val();
    const custo = $('#custo').val();
    const fornecedor = $('#fornecedor').val();
    const tipo = 'serviço';

    $.ajax({
        url: "../storeServico",
        type: "POST",
        datatype: "json",
        data: {
            tipo: tipo,
            id_cliente: nome_2,
            date: data_venda_2,
            descricao: descricao,
            pecas: pecas,
            valor: valor_total,
            custo: custo,
            fornecedor: fornecedor
        },
        success: function(res) {
            res.forEach(({custo, id, valor, nome_produto, id_produto, lucro}) => {
                body.innerHTML += `
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                                <!-- Avatar with inset shadow -->

                                <div>
                                <p class="font-semibold">${id_produto}</p>

                                </div>
                            </div>
                            </td>
                        
                            <td class="px-4 py-3 text-xs">
                            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                            ${valor}
                            </span>
                            </td>
                            <td class="px-4 py-3 text-xs">
                            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                            ${custo}
                            </span>
                            </td>
                            <td class="px-4 py-3 text-sm">

                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    ${lucro}
                                </span>

                            </td>
                            <td class="px-4 py-3 text-sm">

                                <a href="agendamentos3?id=${id}" type="button" value="" style="background-color: #002859;" class=" border   text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-yellow-600 focus:outline-none focus:shadow-outline">
                                    i
                                </a>

                            </td>
                        </tr>
                `;
            })
        },
        error: function(res) {
            console.log(res);
        },
    });

});