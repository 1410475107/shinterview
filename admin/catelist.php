<?php
require './top.php';
//每页显示多少天
$pagenum = 10;
//查询条件设置
$where = ' WHERE status = 1';
//链接地址要传的值
$urlext = '';
//如果用户输入关键词 去除空格   trim
$cname = '';
if (isset($_GET['cname']) && trim($_GET['cname'])) {
    $cname = trim($_GET['cname']);
    $where .= ' AND cname LIKE "%' . $cname . '%"';
    //地址传值  urlencode：对地址进行编码
    $urlext .= '&cname=' . urlencode($cname);
}

$sql = 'SELECT * FROM cate ' . $where;
$r = $mysql->query($sql);
$cate = $r->fetch_all(MYSQLI_ASSOC);

?>

<div class="layui-body">
  <!-- 内容主体区域 -->
  <div style="padding: 15px;">
    <span class="layui-breadcrumb">
      <a href="">首页</a>
      <a href="">面试题平台</a>
      <a href="">分类管理</a>
      <a><cite>分类列表</cite></a>
    </span>
    <hr>
    <form action="./catelist.php" class="layui-form" method="get">
    
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label my-label"> 类名：</label>
            <div class="layui-input-inline" style="width: 100px;">
                <input type="text" name="cname"  class="layui-input" value="<?= $cname ?>">
            </div>
        </div>
         <button class="layui-btn">查询</button>
        </div>
    </form>
  
    <table class="layui-table  catelist">
      <colgroup>
        <col width="50">
        <col width="100">
        <col>
      </colgroup>
      <thead>
        <tr>
          <th>ID</th>
          <th>类名</th>
          <th>操作人</th>
          <th>添加时间</th>
          <th>操作</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($cate as $key => $c) {
            echo '<tr>
              <th>' . $c['cid'] . '</th>
              <th>' . str_replace($cname, '<span class="H">' . $cname . '</span>', $c['cname']) . '</th>
              <th>' . $c['username'] . '</th>
              <th>' . $c['addtimes'] . '</th>
              <th><A href="###" class="delstu" data-cid="' . $c['cid'] . '">删除</A> | 
              <a href="./addcate.php?cid=' . $c['cid'] . '">修改</a>
              </th>
            </tr>';
        }
        ?>
      
      </tbody>
    </table>

  </div>
</div>

<?php require './bottom.php'; ?>