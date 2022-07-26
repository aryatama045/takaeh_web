
<div class="menu">
    <div class="main-menu">
        <div class="scroll">
            <ul class="list-unstyled">

            <!-- LOOPING MENU -->
            <?php foreach ($menuAdmin as $m) : ?>

                <li <?php if($this->uri->segment(1) == strtolower($m['title'])){ ?>
                    class="active"
                    <?php }?>>

                <?php if(is_null($m['url']) || empty($m['url']) ){ ?>

                    <a href="#<?= $m['id'] ?>">
                        <?php if(!empty($m['icon'])){?><i class="<?= $m['icon'] ?>"></i> <?php } ?>
                        <span><?= $m['title']; ?></span>
                    </a>

                <?php } else { ?>

                    <a href="<?= base_url($m['url']); ?>">
                        <?php if(!empty($m['icon'])){?><i class="<?= $m['icon'] ?>"></i> <?php } ?>
                        <span><?= $m['title']; ?></span>
                    </a>

                <?php } ?>

                </li>

            <?php endforeach; ?>


            </ul>
        </div>
    </div>

    <div class="sub-menu">
        <div class="scroll">

            <!-- LOOPING MENU -->
            <?php foreach ($menuAdmin as $m) : ?>
                <!-- SIAPKAN SUB-MENU SESUAI MENU -->
                <?php
                    $role_id = $this->session->userdata('role_id');
                    $menuId = $m['id'];
                    $querySubMenu = "SELECT a.id, a.parent_id, a.position,title,url,a.icon
                        FROM menus a
                        JOIN user_access_menu b ON a.id = b.menu_id
                        WHERE b.role_id = $role_id
                        AND a.parent_id = $menuId
                        ORDER BY a.position ASC";
                    // tesx($querySubMenu);
                    $subMenu = $this->db->query($querySubMenu)->result_array();
                ?>
                <ul class="list-unstyled" data-link="<?= $m['id'] ?>">
                    <?php if(!isset($subMenu) || !empty($subMenu)){ ?>
                        <?php foreach ($subMenu as $sm) : ?>
                            <li <?php if(current_url() == base_url(strtolower($sm['url']))){ ?>
                    class="active"
                    <?php }?>>
                                <a href="<?= base_url($sm['url']); ?>">
                                    <?php if(!empty($sm['icon'])){?>
                                    <i class="<?= $sm['icon'] ?>"></i>
                                    <?php } ?>
                                    <?= $sm['title']; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    <?php } ?>


                </ul>
            <?php endforeach; ?>

        </div>
    </div>
</div>
