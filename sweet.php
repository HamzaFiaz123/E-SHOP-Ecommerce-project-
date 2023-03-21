<!Doctype html>
<html>
    <head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.js"></script>
    </head>
    <body>
        <form method="post">
            <input name="nm" type="text" placeholder="Name">
            <input name="em" type="text" placeholder="Email">
            <input name="sub" type="submit" value="Submit">
        </form>
        <?php
    if(isset($_POST['sub'])){
        $n=$_POST['nm'];
        $e=$_POST['em'];
        if(empty($n) || empty($e)){
        ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Invalid',
                text: 'Input Fields Cant Be Empty'
            })
        </script>
        <?php
        }
}
?>
    </body>
</html>
