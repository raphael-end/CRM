$('#select_cliente_1').on('change', function(){

    const bodyProducts = document.querySelector('#body_products_1');
    $('#body_products_1').html("");

    $.ajax({
        url: "../refreshProduto",
        type: "POST",
        datatype: "json",
        data: {
            id: this.value
        },
        success: function (res) {
            res.forEach(({id,nome_produto, quantidade, preco, custo}) => {
                bodyProducts.innerHTML += `
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
            });
        }, error: function (res) {
            console.log(res);
        },
    });

})