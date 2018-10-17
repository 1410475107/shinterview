<?php 
require './top.php';
$cid = 0;
if(isset($_GET['cid']) && (int)$_GET['cid']){
    $cid = (int)$_GET['cid'];
    $sql = 'SELECT cid, cname FROM cate WHERE status = 1 AND cid = ' . $cid;
    $r = $mysql->query($sql);
    $cate = $r->fetch_array(MYSQLI_ASSOC);
}
?>
        <div class="layui-body">
            <!-- 内容主体区域 -->
            <div style="padding: 15px;">
                <span class="layui-breadcrumb">
                    <a href="">首页</a>
                    <a href="">面试题平台</a>
                    <a href="">分类管理</a>
                    <a><cite><?=$cid?'修改':'添加'?>分类</cite></a>
                </span>
                <hr>
                <form class="layui-form">
                <input type="hidden" name="cid" value="<?=$cid?>">
                    <div class="layui-form-item">
                        <label class="layui-form-label">分类名</label>
                        <div class="layui-input-inline">
                            <input type="text" name="cname" value="<?=$cate['cname']?>" placeholder="请输入分类名" autocomplete="off" class="layui-input">
                        </div><div class="layui-form-mid layui-word-aux">*必填</div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn addcate" type="button"><?=$cid?'修改':'添加'?></button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

        <?php require './bottom.php';?>