<!-- Sidebar -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<div id="sidebar-wrapper" class="admin-menu-lateral">
    <ul class="sidebar-nav">
        <li class="sidebar-brand">
            <a href="#">
               <?php
               echo "Olá, " . $_SESSION['usuarioNome'];
               ?>
            </a>
        </li>
        <li class="li-externa-sidebar">
           <a href="#">
               <i class="fa fa-desktop fa-lg" style="font-size: 24px"></i>Painel

           </a>

        </li>
        <li class="li-externa-sidebar">
            <a href="tabelaPessoa.php">
                <i class="fa fa-user fa-lg" style="font-size: 24px"></i>Pessoas
            </a>
        </li>
        <li class="li-externa-sidebar">
            <a href="#">
            <i class="fa fa-group fa-lg" style="font-size: 24px"></i>Turmas
            </a>
        </li>
        <li class="li-externa-sidebar">
            <a href="funcoes-local-treino.php">
                <i class="fa fa-institution fa-lg" style="font-size: 24px"></i>Local de Treino
            </a>
        </li>
        <li class="li-externa-sidebar">
            <a href="#">
            <i class="fa fa-graduation-cap fa-lg" style="font-size: 24px"></i>Artes Marciais
            </a>
        </li>
        <li class="li-externa-sidebar">
            <a href="contact.html">
            <i class="fa fa-envelope fa-lg" style="font-size: 24px"></i>Contato
            </a>
        </li>
        <li class="li-externa-sidebar">
            <a href="CadastrosAdmin.php">
                <i class="fa fa-building-o" style="font-size: 24px"></i>Administrativo
            </a>
        </li>
        <li class="li-externa-sidebar">
            <a href="deslogar.php">
                <i class="fa fa-sign-out" style="font-size: 24px"></i>Sair
            </a>
        </li>
    </ul>
</div>
