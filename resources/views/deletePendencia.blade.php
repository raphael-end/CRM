<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        $('document').ready(function() {
            swal({
                    title: "Cliente contatado com sucesso",
                    text: "Você já ligou para este cliente!!",
                    icon: "success",

                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.close();
                    } else {
                        swal("Your imaginary file is safe!");
                    }
                });
        })
    </script>
</body>

</html>