<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/css/style.css">
    <title><?php echo $this->getTitle(); ?></title>
    <script src="skin/admin/jquery-3.6.0.min.js"></script>
    <script src="skin/admin/admin.js"></script>


   <title>AdminLTE 3 | Starter</title>
  <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="skin/assets/plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="skin/assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="skin/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="skin/assets/dist/css/adminlte.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="skin/assets/plugins/sweetalert2/sweetalert2.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="skin/assets/plugins/toastr/toastr.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="skin/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="skin/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="skin/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="skin/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<script type="text/javascript">

    function ppr() 
    {
        const pprValue = document.getElementById('ppr').selectedOptions[0].value;
        let language = window.location.href;
        if(!language.includes('ppr'))
        {
            language+='&ppr=20';
        }
        const myArray = language.split("&");
        for (i = 0; i < myArray.length; i++)
        {
            if(myArray[i].includes('p='))
            {
                myArray[i]='p=1';
            }
            if(myArray[i].includes('ppr='))
            {
                myArray[i]='ppr='+pprValue;
            }
        }
        const str = myArray.join("&");  
        location.replace(str);
    }

</script>
    