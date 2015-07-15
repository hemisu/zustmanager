<?php
/**
 * Created by PhpStorm.
 * User: Misu
 * Date: 2015/7/4
 * Time: 15:29
 */
?>
<div class="row">
    <div id="nav-col">
        <section id="col-left" class="col-left-nano">
            <div id="col-left-inner" class="col-left-nano-content">
                <div id="user-left-box" class="clearfix hidden-sm hidden-xs">
                    <img alt="" src="<?$head_img = "public/images/".$this->session->userdata('head_img');echo base_url("$head_img");?>"/>

                    <div class="user-box">
                                <span class="name">
                                Welcome <br/><?echo $this->session->userdata('username');//登陆者名字?>
                                </span>
                                <span class="status">
                                <?
                                    if($userinfo['status']){
                                        echo "<i class='fa fa-circle'></i> Online";
                                    }else{
                                        echo "<div style='color:#95A5A6;'><i class='fa fa-circle'></i> Offline</div>";
                                    }

                                    ?>
                                </span>
                    </div>
                </div>
                <div class="collapse navbar-collapse navbar-ex1-collapse" id="sidebar-nav">
                    <ul class="nav nav-pills nav-stacked">
                        <li>
                            <a href="<?echo base_url('login')?>">
                                <i class="fa fa-dashboard"></i>
                                <span>个人中心</span>
<!--                                <span class="label label-info label-circle pull-right">2</span>-->

                            </a>
                        </li>
                        <li>
                            <a href="<?echo base_url('user/all')?>" class="dropdown-toggle">
                                <i class="fa fa-table"></i>
                                <span>用户</span>
                                <i class="fa fa-chevron-circle-right drop-icon"></i>
                            </a>
                            <ul class="submenu">
                                <li>
                                    <a href="<?echo base_url('user/all')?>">
                                        所有用户
                                    </a>
                                </li>
                                <li>
                                    <a href="<?echo base_url('user/condensed')?>">
                                        详细信息
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
        </section>
    </div>