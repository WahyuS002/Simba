<!--**********************************
            Sidebar start
        ***********************************-->
<div class="nk-sidebar">
    <div class="nk-nav-scroll">

        <!-- QUERY MENU -->
        <?php
        $role_id = $this->session->userdata('role_id');
        $queryMenu = "SELECT `tb_menu`.`menu_id`,`tb_menu`.`menu`
                        FROM `tb_menu` JOIN `tb_user_access_menu`
                          ON `tb_menu`.`menu_id` = `tb_user_access_menu`.`menu_id`
                       WHERE `tb_user_access_menu`.`role_id` =  $role_id
                    ORDER BY `tb_user_access_menu`.`role_id` ASC
            ";
        $menu = $this->db->query($queryMenu)->result_array();
        ?>

        <?php foreach ($menu as $m) : ?>
            <ul class="metismenu" id="menu">

                <!-- LOOPING MENU -->

                <li class="nav-label" aria-expanded="false"><?= $m['menu'] ?></li>

                <!-- Query Sub Menu -->
                <!-- QUERY SUB-MENU -->
                <?php
                    $menuId = $m['menu_id'];
                    $querySubMenu = "SELECT *
                               FROM `tb_sub_menu` JOIN `tb_menu`
                                 ON `tb_sub_menu`.`menu_id` = `tb_menu`.`menu_id`
                              WHERE `tb_sub_menu`.`menu_id` = $menuId
                    ";
                    $subMenu = $this->db->query($querySubMenu)->result_array();
                    ?>

                <!-- Loopin Sub Menu -->
                <?php foreach ($subMenu as $sm) : ?>
                    <li class="nav-item">
                        <a href="<?= base_url() ?><?= $sm['url'] ?>" class="nav-link pb-3" aria-expanded="false">
                            <i class="<?= $sm['icon'] ?> nav-link pb-1"></i>
                            <span><?= $sm['title'] ?></span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endforeach; ?>
        <ul class="metismenu" id="menu">
            <hr>
            <li>
                <a href="<?= base_url('auth/logout') ?>" aria-expanded="false">
                    <i class="fas fa-sign-out-alt nav-link pb-1"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!--**********************************
            Sidebar end
        ***********************************-->