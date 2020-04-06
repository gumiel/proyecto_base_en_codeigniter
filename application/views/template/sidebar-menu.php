<!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">NAVEGACIÓN PRINCIPAL</li>

        <?php foreach ($this->templateci->menuPrincipal() as $menu): ?>          
          <li <?php echo (isset($menu['subMenu']))? "class='treeview'": '' ?> >
            <?php if ( isset($menu['subMenu'])): ?>

              <a href="#">
                <i class="<?php echo $menu['icon'] ?>"></i> <span><?php echo $menu['name']; ?></span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a> 
              <ul class="treeview-menu">
                <?php foreach ($menu['subMenu'] as $subMenu): ?>
                    <li><a href="<?php echo site_url($subMenu['url']); ?>"><i class="fa fa-circle-o"></i> <?php echo $subMenu['name'] ?></a></li>
                <?php endforeach ?>
              </ul>   
            
            <?php else: ?>
              <a href="<?php echo site_url($menu['url']); ?>">
                <i class="<?php echo $menu['icon'] ?>"></i> 
                <span><?php echo $menu['name']; ?></span>
              </a>            
            <?php endif ?>
          </li>
        <?php endforeach ?>
            

            
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Multilevel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
            <li class="treeview menu-open">
              <a href="#"><i class="fa fa-circle-o"></i> Level One
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                <li class="treeview menu-open">
                  <a href="#"><i class="fa fa-circle-o"></i> Level Two
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          </ul>
        </li>



        <li><a href="<?php echo site_url('nucleo/NucUsuario/desconectar') ?>"><i class="fa fa-circle-o text-red"></i> <span>Desconectar</span></a></li>

        <?php //echo $this->templateci->menuPrincipal2(); ?>

      </ul>