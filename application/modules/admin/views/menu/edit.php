    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/menu/css/style.css">
    
    <!-- Latest compiled and minified CSS -->


    <script>
        const _BASE_URL = '<?php echo base_url(); ?>';
        let current_group_id = <?php if (!empty($group_id)) {
            echo $group_id;
        } ?>;
    </script>
    <script src="<?php echo base_url(); ?>assets/menu/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/menu/js/jquery-ui-1.10.3.custom.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/menu/js/jquery.mjs.nestedSortable.js"></script>
    <script src="<?php echo base_url(); ?>assets/menu/js/menu.js"></script>


<div class="container-fluid mb-5">
    <div class="card shadow mb-4">
    <div class="card-body mb-5">  
        <div class="row">
            <div class="col-md-12">
                <header>
                    <h1 class="top-header-text">Menu Manager</h1>
                    <div id="link">
                        <a class="btn btn-primary" href="<?php echo base_url() ?>menu/vertical_sample" 
                        target="_blank">Preview Menu</a>
                    </div>
                </header>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md-4">
                <section class="box">
                    <h2>Info</h2>
                    <div>
                        <p>Drag the menu list to re-order, </p>
                        <p>Click <b>Update Menu</b> to save the position. </p>
                        <p>To add item on menu, use form below.</p>
                    </div>
                </section>
                <section class="box">
                    <h2>Add To Menu</h2>
                    <div>
                        <form id="form-add-menu" method="post" action="<?php echo site_url('admin/menu/add'); ?>">
                            <div class="form-group">
                                <label for="menu-title">Title</label>
                                <input style="width: 100% !important;" type="text" name="title" required id="menu-title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="menu-url">URL</label>
                                <input type="text" name="url" id="menu-url" class="form-control" required style="width: 100% !important;">
                            </div>
                            <div class="form-group">
                                <label for="menu-icon">ICON</label>
                                <input type="text" name="icon" id="menu-icon" class="form-control" required style="width: 100% !important;">
                            </div>
                            <p class="buttons">
                                <input type="hidden" name="group_id" value="<?php echo $group_id; ?>">
                                <button id="add-menu" type="submit" class="btn btn-success ">Add Menu Item </button>
                            </p>
                        </form>
                    </div>
                </section>
            </div>

            <div class="col-md-8">
                <div id="main">
                    <ul id="menu-group">
                        <?php foreach ($menu_groups as $menu) : ?>
                            <li id="group-<?php echo $menu->id; ?>">
                                <a href="<?php echo site_url('admin/menu/menu'); ?>/<?php echo $menu->id; ?>">
                                    <?php echo $menu->title; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                        <li id="add-group">
                            <a href="<?php echo site_url('admin/menugroup/add'); ?>"
                            title="Add New Menu" class="btn  btn-default">+</a>
                        </li>
                    </ul>
                    <div class="clear"></div>

                    <form method="post" id="form-menu" action="<?php echo site_url('admin/menu/save_position'); ?>">
                        <div class="ns-row" id="ns-header">
                            <div class="actions">Actions</div>
                            <div class="ns-url">URL</div>
                            <div class="ns-title">Title</div>
                        </div>
                        <?php echo $menu_ul; ?>
                        <div id="ns-footer">
                            <button type="submit" class="btn btn-default btn-success" id="btn-save-menu">
                                Update Menu
                            </button>
                        </div>
                        <br>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <div id="loading">
        <img src="<?php echo base_url(); ?>assets/menu/images/ajax-loader.gif" alt="Loading">
        Processing...
    </div>
    </div>


</div>

    

</div>
