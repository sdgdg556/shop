<?php 
require_once '../include.php';
checkLogined();
$sql="select id,username,email from user";
$rows=fetchAll($sql);
if(!$rows){
	alertMes("没有用户,请添加!","addUser.php");
	exit;
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<link rel="stylesheet" href="styles/backstage.css">
</head>

<body>
<div class="details">
    <div class="details_operation clearfix">
        <div class="bui_select">
            <input type="button" value="添&nbsp;&nbsp;加" class="add"  onclick="addAdmin()">
        </div>
            
    </div>
    <table class="table" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th width="15%">编号</th>
                <th width="20%">用户名称</th>
                <th width="20%">用户邮箱</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
        <?php  foreach($rows as $row):?>
            <tr>
                <td><input type="checkbox" id="c1" class="check"><label for="c1" class="label"><?php echo $row['id'];?></label></td>
                <td><?php echo $row['username'];?></td>
                <td><?php echo $row['email'];?></td>
                <td align="center"><input type="button" value="修改" class="btn" onclick="editUser(<?php echo $row['id'];?>)"><input type="button" value="删除" class="btn"  onclick="delUser(<?php echo $row['id'];?>)"></td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>
</body>
<script type="text/javascript">
	function addUser(){
		window.location="addUser.php";	
	}
	function editUser(id){
			window.location="editUser.php?id="+id;
	}
	function delUser(id){
			if(window.confirm("您确定要删除吗？")){
				window.location="doAdminAction.php?act=delUser&id="+id;
			}
	}
</script>
</html>