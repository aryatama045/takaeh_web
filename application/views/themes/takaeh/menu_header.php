

<!-- main header start -->
<header class="main-header sticky-header" id="main-header-2">
    <div class="container">
        <div class="row">
            <div class="col-12">


                <?php 
                    $menu = get_main_menu($group_id); ?>
                <nav class="navbar navbar-expand-lg navbar-light rounded">
                    <a class="navbar-brand logo" href="<?= base_url() ?>">
                        <img src="<?= base_url()?>assets/logo/logo-white.png" alt="logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="fa fa-bars"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbar">
                        <ul class="navbar-nav justify-content-end ml-auto">
                        <?php for ($i = 0; $i < count($menu->main_menu, true); $i++) { ?>
                            <?php if (count($menu->main_menu[$i]->parent_menu, true) == 0): ?>
                                <li class="nav-item dropdown active">
                                    <a class="nav-link " href="<?php echo base_url() . $menu->main_menu[$i]->url ?>" >
                                        <?php echo $menu->main_menu[$i]->title ?>
                                    </a>
                                </li>
                            <?php else: ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" 
                                    href="<?php echo base_url() . $menu->main_menu[$i]->url ?>" 
                                    id="navbarDropdownMenuLink2" 
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php echo $menu->main_menu[$i]->title ?>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                                    <?php for ($b = 0; $b < count($menu->main_menu[$i]->parent_menu, true); $b++):
                                        if (!isset($menu->main_menu[$i]->parent_menu[$b]->parent_submenu)): ?>
                                            <li class="dropdown-submenu">
                                                <a class="dropdown-item " href="<?php echo $menu->main_menu[$i]->parent_menu[$b]->url ?>">
                                                    <?php echo $menu->main_menu[$i]->parent_menu[$b]->title ?>
                                                </a>
                                            </li>
                                        <?php else: ?>
                                            <li class="dropdown-submenu">
                                                <a class="dropdown-item dropdown-toggle" href="#"><?php echo $menu->main_menu[$i]->parent_menu[$b]->title ?></a>
                                                
                                                <?php echo $menu->main_menu[$i]->parent_menu[$b]->title ?></a>
                                                <?php if (isset($menu->main_menu[$i]->parent_menu[$b]->parent_submenu)): ?>
                                                <ul class="dropdown-menu">
                                                    <?php foreach ($menu->main_menu[$i]->parent_menu[$b]->parent_submenu as $par_sub) : ?>
                                                    <li>
                                                        <a class="dropdown-item" href="<?php echo $par_sub->url ?>">
                                                        <?php echo $par_sub->title ?>
                                                        </a>
                                                    </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                                <?php endif; ?>

                                            </li>
                                        <?php endif; ?>
                                    <?php endfor; ?>

                                </ul>
                            </li>
                            <?php endif; ?>
                        <?php } ?>

                        <li class="nav-item dropdown">
                            <a href="#full-page-search" class="nav-link">
                                <i class="fa fa-search"></i>
                            </a>
                        </li>



                            <!-- <li class="nav-item sb2">
                                <a  href="submit-property.html" class="submit-btn">
                                    Submit Property
                                </a>
                            </li> -->
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- main header end -->