$('#select_cliente_2').on('change', function () {

    const bodyProducts = document.querySelector('#body-products2');
    $('#body-products2').html("");

    $.ajax({
        url: "../refreshServico",
        type: "POST",
        datatype: "json",
        data: {
            id: this.value
        },
        success: function (res) {
            res.forEach(({ id, id_produto, valor, custo, lucro }) => {
                bodyProducts.innerHTML += `
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
                console.log(res);
            });
        }, error: function (res) {
            console.log(res);
        },
    });

})