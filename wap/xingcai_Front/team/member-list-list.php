
<?php
	$sql="select * from {$this->prename}links where enable=1 and uid={$this->user['uid']}";
	if($_GET['uid']=$this->user['uid']) unset($_GET['uid']);
	$data=$this->getPage($sql, $this->page, $this->pageSize);
	?>

<div>
<div class="row">
                 <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="tab-first clearfix">
<ul class="list_menus-li">
	<li><a href="/index.php/team/addlink">推廣設定</a></li>
	<li class="on"><a href="/index.php/team/linkList">連結管理</a></li>
</ul>
</div>
                    <div class="ibox-content">

                        <table width="100%" border="0" cellspacing="1" cellpadding="0" class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
									<th>編號</th>
                                    <th>類型</th>
                                    <th>返點</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody class="table_b_tr">
						<?php if($data['data']) foreach($data['data'] as $var){ ?>
                                <tr class="gradeX">
								 <td><?=$var['lid']?></td>
                                    <td><?php if($var['type']){echo'代理';}else{echo '會員';}?></td>
									<td><?=$var['fanDian']?>%</td>
                                    <td><a href="/index.php/team/linkUpdate/<?=$var['lid']?>" style="color:#333;" target="modal"  width="95%" title="修改註冊連結" modal="true" button="確定:dataAddCode|取消:defaultCloseModal">修改</a> 
									
									| <a href="/index.php/team/getLinkCode/<?=$var['lid']?>" style="color:#333;" target="modal" width="95%"  title="獲取連結" modal="true" button="取消:defaultCloseModal">獲取連結</a> 
									
									| <a  href="/index.php/team/linkDelete/<?=$var['lid']?>" button="確定刪除:dataAddCode" modal="true" title="刪除註冊連結" width="95%" target="modal"  style="color:#333;">刪除</a></td>

								</tr>
    <?php } ?>
                                
                            </tbody>
                        
                        </table>
</div>
</div>
</div>
</div>
</div>


   <script>
    $(document).ready(function() {
              $('.dataTables-example').dataTable( {
              //跟陣列下標一樣，第一列從0開始，這裡表格初始化時，第四列默認降冪
                "order": [[ 3, "desc" ]]
              } );
            } );
        function fnClickAddRow() {
            $('#editable').dataTable().fnAddData([
                "Custom row",
                "New row",
                "New row",
                "New row",
                "New row"]);
        }
    </script>
</body>
</html>
